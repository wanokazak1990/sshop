<?php
namespace App\Services;
use Image, Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

Class UploadImage 
{
	private $path;
	private $file;
	private $x = null;
	private $y = null;
	private $quality = 60;
	private $model;

	private function getPath()
    {
        if(!empty($this->model->img))
            return storage_path('app/public/'.$this->model->getTable().'/'.$this->model->img);
    }

    private function getUrl()
    {
        if(!empty($this->model->img))
            return ('storage/'.$this->model->getTable().'/'.$this->model->img);
    }

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

	public function setModel(Model $model)
	{
		$this->model = $model;

		$this->path = storage_path('app/public').'/'.$model->getTable().'/';

		return $this;
	}

	public function setPathWithId()
	{
		if(isset($this->model->id))
		{
			File::exists(
				storage_path('app/public').'/'.$this->model->getTable().'/'.$this->model->id.'/'
			) or File::makeDirectory(
				storage_path('app/public').'/'.$this->model->getTable().'/'.$this->model->id.''
			);

			$this->path = storage_path('app/public').'/'.$this->model->getTable().'/'.$this->model->id.'/';
		}
		return $this;
	}

	public function setFile($file)
	{
				
		$this->file = $file;

        return $this;
	}

	public function prepare(Model $model, $file)
	{
		$this->setModel($model);
		$this->setFile($file);
		return $this;
	}

	public function resolution($x = null,$y = null)
	{
		$this->x = $x;

		$this->y = $y;

		return $this;
	}

	public function deleteFile()
	{
		if(file_exists($this->path.$this->model->img) && $this->model->img){
			unlink($this->path.$this->model->img);
		}
		return $this;
	}

	public function saveSingle()
	{
		if(!$this->file)
			return;
		$this->deleteFile();
		$filename = date('Ymd').Str::random(20) .'.' . $this->file->getClientOriginalExtension() ?: 'png';
		$img = Image::make($this->file);
		$img->fit($this->x,$this->y, function ($constraint) {
		    $constraint->upsize();
		})->save($this->path.$filename, $this->quality);
		$this->reset();
		return $img->basename;
	}
}