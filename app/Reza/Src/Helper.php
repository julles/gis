<?php namespace App\Reza\Src;
/**
 *  Author : Muhamad Reza Abdul Rohim <reza.wikrama3@gmail.com>
 *  
 *  GIS BACKEND 1.0.0
 *  
 */


class Helper
{

	public function __construct()

	{
		$this->asset = asset(null);
	}

	public function assetUrl($url = "")
	
	{
		return $this->asset.$url;
	}

	public function bootstrap($url = "")

	{
		return $this->asset.'bootstrap/'.$url;
	}

	public function config($value)
	
	{
		return config('Config.'.$value);
	}

	public function injectModel($model)

	{
		$Model = "App\Models\\$model";
		
		return new $Model;
	}

	public function url($url)
	
	{
		return url(request()->segment(1).'/'.$url);
	}

	public function buttonUpdate($id = "")
	
	{
		return '<a class = "btn btn-default" href = "'.$this->url("update/".$id).'"><span class="glyphicon glyphicon-pencil"></a>';
	}

	public function buttonDelete($id = "")
	
	{
		return '<a onclick = "return confirm(\'are you sure want to delete this item?\')" class = "btn btn-danger" href = "'.$this->url("delete/".$id).'"><span class="glyphicon glyphicon-trash"></a>';
	}

	public function buttons($id)

	{
		return $this->buttonUpdate($id).' '.$this->buttonDelete($id);
	}
}