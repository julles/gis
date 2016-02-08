<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\GisController;

class HomeController extends GisController
{
	
	public function getIndex()

    {
    	return view('welcome');
    }
}
