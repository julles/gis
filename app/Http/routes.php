<?php
/**
 *  Author : Muhamad Reza Abdul Rohim <reza.wikrama3@gmail.com>
 *  
 *  GIS BACKEND 1.0.0
 *  
 */

// routes dynamic from DB
if(\Schema::hasTable('menus'))
{	
	Route::get('/' , function(){
		return redirect('home/index');
	});

	foreach(Helper::injectModel('Menu')->get() as $row)
	{
			Route::controller($row->slug , $row->controller);
	}
}
// 
