<?php namespace App\Reza\Src;

use Illuminate\Support\ServiceProvider;

use App\Reza\Src\Helper;

class HelperServiceProvider extends ServiceProvider

{
	public function register()

	{
		$this->mergeConfigFrom(__DIR__.'/Config.php' , 'Config');

		$this->app->bind('register-helper' , function(){
			return new Helper;
		});
	}
}