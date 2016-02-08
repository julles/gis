<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\GisController;
use App\Models\LocationCategory;
use DB;
class LocationController extends GisController
{
    public function __construct(LocationCategory $model)

	{
		parent::__construct();

		$this->model = $model;
	}

	public function getIndex()

    {
    	return view('location_category.index');
    }

    public function getData()

    {
    	$model = $this->model->select('id' , 'location_category' , 'colour' , 'status');
    	
    	$data = \Datatables::of($model)
    	
    	->addColumn('status' , function($model){
    		
    		return ($model->status == 0) ? 'Active' : 'In Active';
    	})
    	
    	->addColumn('action' , function($model){
    		
    		return \Helper::buttons($model->id);
    	})
    	
    	->make(true);	

    	return $data;
    }

    public function getCreate()

    {
    	$model = $this->model;

    	return view('location_category._form' , compact('model'));
    }

    public function postCreate(Request $request)

    {
    	$inputs = $request->all();

    	$validation = \Validator::make($inputs , $this->model->rules());

    	if($validation->fails())
    	{
    		return redirect()->back()->withErrors($validation)->withInput();
    	}

    	if(empty($inputs['colour']))
    	{
    		$inputs['colour'] = '#FF0000';
    	}

    	$this->model->create($inputs);

    	return redirect(\Helper::url('index'))->withMessage('Data has been saved');
    }

    public function getUpdate($id)

    {
    	$model = $this->model->find($id);

    	return view('location_category._form' , compact('model'));
    }

    public function postUpdate(Request $request , $id)

    {
    	$inputs = $request->all();

    	$validation = \Validator::make($inputs , $this->model->rules($id));

    	if($validation->fails())
    	{
    		return redirect()->back()->withErrors($validation)->withInput();
    	}

    	if(empty($inputs['colour']))
    	{
    		$inputs['colour'] = '#FF0000';
    	}

    	$this->model->find($id)->update($inputs);

    	return redirect(\Helper::url('index'))->withMessage('Data has been updated');
    }


    public function getDelete($id)

    {
    	DB::beginTransaction();

    	try
    	{
    		$model = $this->model->find($id);

    		$model->delete();

    		DB::commit();

    		return redirect(\Helper::url('index'))->withMessage('Data has been deleted');
    	
    	}catch(\Exception $e){
    	
    		DB::rollback();
    		return redirect(\Helper::url('index'))->withMessage('Data cannot be deleted');
    	}
    }
}
