<?php
namespace App\Services;
use Image, Str;
use Illuminate\Database\Eloquent\Model;

Class UploadImage 
{
	private $path;
	private $file;
	private $x = null;
	private $y = null;
	private $quality = 60;

	public function quality($q)
	{
		$this->quality = (integer)$q;
		return $this;
	}

	private function reset()
	{
		$this->model = null;
		$this->path = null;
		$this->file = null;
		$this->x = null;
		$this->y = null;
		$this->quality = 60;
	}

	public function prepare(Model $model, $file)
	{
		$this->model = $model;

		$this->path = storage_path('app/public').'/'.$model->getTable().'/';
		
		$this->file = $file;

        return $this;
	}

	public function resolution($x = null,$y = null)
	{
		$this->x = $x;

		$this->y = $y;

		return $this;
	}

	public function deleteFile($file)
	{
		if(file_exists($file))
			unlink($file);
		return $this;
	}

	public function saveSingle()
	{
		if(!$this->file)
			return;
		if(file_exists($this->model->path_image))
			$this->deleteFile($this->model->path_image);

		$filename = date('Ymd').Str::random(20) .'.' . $this->file->getClientOriginalExtension() ?: 'png';
		$img = Image::make($this->file);
		$img->resize($this->x,$this->y, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($this->path.$filename, $this->quality);
		$this->reset();
		return $img->basename;
	}
}