<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\GisController;
use App\User;
use App\Models\Role;

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
}
