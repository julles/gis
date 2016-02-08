<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\GisController;
use App\User;
use App\Models\Role;
use DB;

class UserController extends GisController
{

	public function __construct(User $model , Role $role)

	{
		parent::__construct();

		$this->model = $model;

		$this->roles = $role->lists('name' , 'id');
	}

	public function getIndex()

    {
    	return view('users.index');
    }

    public function getData()

    {
    	$model = $this->model->select('users.id' , 'email' , 'fullname' ,'phone' , 'roles.name as role_name')
    	
    	->where('users.id' , '!=' ,1)

    	->join('roles' , 'roles.id' , '=' ,'users.role_id');

    	$data = \Datatables::of($model)
    	->addColumn('action' , function($model){
    		
    		return \Helper::buttons($model->id);
    	})
    	->make(true);	

    	return $data;
    }

    public function getCreate()

    {
    	$model = $this->model;

    	$roles = $this->roles;

    	return view('users._form' , compact('model' , 'roles'));
    }

    public function postCreate(Request $request)

    {
    	$inputs = $request->all();

    	$validation = \Validator::make($inputs , $this->model->rules());

    	if($validation->fails())
    	{
    		return redirect()->back()->withErrors($validation)->withInput();
    	}

    	$inputs['password'] = \Hash::make($inputs['password']);

    	$this->model->create($inputs);

    	return redirect(\Helper::url('index'))->withMessage('Data has been saved');
    }

    public function getUpdate($id)

    {
    	$model = $this->model->find($id);

    	$roles = $this->roles;

    	return view('users._form' , compact('model' , 'roles'));
    }

    public function postUpdate(Request $request , $id)

    {
    	$inputs = $request->all();

    	$validation = \Validator::make($inputs , $this->model->rules($id));

    	if($validation->fails())
    	{
    		return redirect()->back()->withErrors($validation)->withInput();
    	}

    	$inputs['password'] = \Hash::make($inputs['password']);

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
