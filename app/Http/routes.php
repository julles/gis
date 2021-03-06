<?php
/**
 *  Author : Muhamad Reza Abdul Rohim <reza.wikrama3@gmail.com>
 *  
 *  GIS BACKEND 1.0.0
 *  
 */

// routes dynamic from DB

Route::controller('auth' , 'AuthController');

Route::group(['middleware' => ['auth']  ,'prefix' => '/'] , function(){

	if(\Schema::hasTable('menus'))
	{	
		Route::get('/' , function(){
			return redirect('home/index');
		});

		foreach(Helper::injectModel('Menu')->where('controller' , '!=' , '#')->get() as $row)
		{
				Route::controller($row->slug , $row->controller);
		}
	}

});
	
// 
