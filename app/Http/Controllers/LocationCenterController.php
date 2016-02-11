<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\GisController;
use App\Models\Location;
use App\User;
use App\Models\LocationCategory;

class LocationCenterController extends GisController
{

	public function __construct(Location $model , User $user , LocationCategory $category)

	{
		parent::__construct();

		$this->model = $model;

		$this->user = $user;

		$this->category = $category;

		$this->userLists = $this->user->where('id' , '!=' , \Auth::user()->id)->lists('fullname' ,'id')->toArray();

		$this->categoryLists = $this->category->whereStatus(0)->lists('location_category' , 'id')->toArray();
	}

    public function getIndex()

    {
    	return view('location.index');
    }

    public function getData()

    {

    }

    public function getCreate()

    {
    	return view('location._form' , [

    		'model' => $this->model, 
    		'userLists' => $this->userLists,
    		'categoryLists' => $this->categoryLists,

    	]);
    }

    public function postCreate(Request $request)

    {
    	$inputs = $request->all();

    	$validation = \Validator::make($inputs , $this->model->rules() , $this->model->messages());

    	if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput();
    	}

    	$picture = \Input::file('picture');
    	echo $picture->getPathName();
  //   	if(!empty($picture))
		// {
		// 	$ext = $picture->getClientOriginalExtension();;
		// 	$imageName = 'location-'.date("YmdHis").rand().'.'.$ext;
  //   		$picture->move('contents' , $imageName);
  //   		$thumb = \Image::make($picture->getPathName())->resize(200,200)->save('public/contents/'.$imageName);
  //   		$inputs['picture'] = $imageName;
  //   	}

  //   	$save = $this->model->create($inputs);
  //   	return redirect(\Helper::url('index'))->withMessage('Data has been saved');
    }
}
