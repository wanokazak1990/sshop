<?php

namespace App\Http\Controllers\Parser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parsers\Wiper\Brand;
use App\Models\Parsers\Wiper\Car;
use App\Models\Parsers\Wiper\Complectation;

class WiperController extends Controller
{

	private $mas = [
		"AC",
		"Aixam",
		"Aston Martin",
		"Audi",
		"Avia",
		"Barkas",
		"BAW",
		"Bentley",
		"Acura",
		"BMW",
		"Bogdan",
		"ARO",
		"Brilliance",
		"BYD",
		"Buick",
		"Caterham",
		"Chana",
		"Alfa Romeo",
		"Changan",
		"Changne",
		"Chery",
		"Cadillac",
		"Chevrolet",
		"Citroen",
		"Dadi",
		"Chrysler",
		"Daewoo",
		"Datsun",
		"Dacia",
		"DeLorean",
		"Dodge",
		"DS",
		"Daihatsu",
		"Ferrari",
		"FAW",
		"Fiat",
		"Fisker",
		"Foton",
		"FSO",
		"Ford",
		"Genesis",
		"Geely",
		"GMC",
		"Great Wall",
		"Hafei",
		"Hummer",
		"Honda",
		"Infiniti",
		"Isuzu",
		"Iveco",
		"JAC",
		"Jeep",
		"Hyundai",
		"Jaguar",
		"Kia",
		"Lamborghini",
		"Land Rover",
		"Lancia",
		"Landwind",
		"LDV",
		"Ligier",
		"Lexus",
		"Lincoln",
		"Lifan",
		"Lotus",
		"Maserati",
		"Maybach",
		"Mercury",
		"Mini",
		"Mercedes-Benz",
		"Mazda",
		"Mitsubishi",
		"MG",
		"Nissan",
		"Opel",
		"Piaggio",
		"Porsche",
		"Proton",
		"Qoros",
		"Peugeot",
		"Pontiac",
		"Qvale",
		"RAF",
		"Range Rover",
		"Ravon",
		"Rover",
		"SAAB",
		"Saipa",
		"Samand / Iran Khodro / IKCO",
		"Samsung",
		"Scion",
		"Renault",
		"SEAT",
		"Skoda",
		"Rolls-Royce",
		"SMA",
		"Smart",
		"Soueast",
		"SsangYong",
		"Tata",
		"Tesla",
		"Subaru",
		"Suzuki",
		"Toyota",
		"Volvo",
		"Volkswagen [VW]",
		"Wanfeng",
		"Wartburg",
		"Wiesmann",
		"Zotye",
		"ZX Auto",
		"ГАЗ",
		"ВАЗ (Lada)",
		"ЗИЛ",
		"ЗАЗ (ЗАЗ-Daewoo)",
		"ЛуАЗ",
		"УАЗ",
		"Москвич [ИЖ, АЗЛК]",
		"ТагАЗ"
	];	

	public function parsing()
    {
    	$this->parseparam();
    	//$this->parsecomplect();
	   //  	foreach ($this->mas as $key => $brand) 
	   //  	{
	    		
	   //  		$url = 'https://vizor.pp.ua/index.php?route=product/dvorniki/getData&type=brand&query=';
	    		
	   //  		$data = $this->getHtml($url,$brand);

				// $cars = $this->explodeByQuote($data);

				// $id = $this->saveBrand($brand);
				
				// $this->saveModel($id,$cars);
	   //  	}
	}

	public function explodeByQuote($str)
	{
		$out = [];
		preg_match_all('~"([^"]*)"~u' ,$str,$out);
		if(isset($out[0]))
			return $out[1];
	}

	public function saveBrand($str)
	{
		$str = str_replace('%20', ' ', $str);
		$brand = Brand::where('name',$str)->first();
		if(!$brand)
			$brand = Brand::create([
				'name'=>$str
			]);
		return $brand->id;
	}

	public function getHtml($url,$data='')
	{

		$data = explode(' ',$data);
		if(count($data)>1)
			$data = implode('%20', $data);
		else
			$data = $data[0];

		$url = $url.$data;
		$url = str_replace(' ', '%20', $url);

		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		curl_setopt($ch, CURLOPT_HEADER, false);

		$result = curl_exec($ch);

		curl_close($ch);

		return $result;
	}

	public function saveModel($brand,$data)
	{
		
		if(is_array($data))
		{
			foreach ($data as $key => $model) 
			{
				$models = Car::where('brand_id',$brand)->get();
				if(!$models->contains('model',$model))
					$model = Car::create([
						'brand_id'=>$brand,
						'name'=>$model
					]);
			}
		}

	}

	public function savecomplect($model,$data,$complects)
	{
		if(is_array($data))
		{
			foreach($data as $itemComplect)
				if(!$complects->where('model_id',$model)->contains('name',$itemComplect))
					Complectation::create([
						'model_id'=>$model,
						'name'=>$itemComplect
					]);

		}
	}

	public function parsecomplect()
	{
		$cars = Car::get();
		$complectations = Complectation::get();
		$url = 'https://vizor.pp.ua/index.php?route=product/dvorniki/getData&type=model&query=';
		foreach($cars as $itemCar)
		{
			
			$html = $this->getHtml($url,$itemCar->model);
			$complect = $this->explodeByQuote($html);
			$this->savecomplect($itemCar->id,$complect,$complectations);

		}
	}

	public function getUrlEnd($brand,$model,$complect)
	{
		$complect = explode(' ',$complect);
		if(count($complect)>1)
			$complect = implode('%20', $complect);
		else
			$complect = $complect[0];

		$url = 'https://vizor.pp.ua/index.php?route=product/dvorniki/getInfo&brand='.$brand
		.'&model='.$model
		.'&modification='.$complect;
		return $url;
	}

	public function parseparam()
	{
		$complects = Complectation::with('model.brand')->get();
		foreach ($complects as $key => $itemComplect) 
		{
			$url = $this->getUrlEnd(
				$itemComplect->model->brand->name,
				$itemComplect->model->name,
				$itemComplect->name
			);
			$html = $this->getHtml($url);
			$out = [];
			preg_match_all('~"([^"]*)"~u' ,$str,$out['driver']);
			if($itemComplect->model->brand->name == 'Audi')
				dd();
		}
	}
}																	

//https://vizor.pp.ua/index.php?route=product/dvorniki/getInfo&brand=Aston%20Martin&model=DB9&modification=Vantage%20%D0%9A%D0%B0%D0%B1%D1%80%D0%B8%D0%BE%D0%BB%D0%B5%D1%82,%20%D0%BA%D1%80%D0%B5%D0%BF%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5%20%D0%BA%D1%80%D1%8E%D1%87%D0%BE%D0%BA%202004-2011

