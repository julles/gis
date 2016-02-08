<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Menu;

class GisController extends Controller

{
    protected $menu;

    protected $menuActive;

    protected $breadCrumbs;

	public function __construct()

    {
    	$this->menu = new Menu;

    	$this->menuActive = $this->menu->whereSlug(\Request::segment(1))->first();

    	$this->breadCrumbs = [
    		$this->menuActive->title,
    		\Request::segment(2),
    	];

    	view()->share('modelMenu' ,  $this->menu);
    	view()->share('breadCrumbs' ,  $this->breadCrumbs);
    }
}
