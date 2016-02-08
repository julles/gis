<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\GisController;
use App\User;
use Auth;

class AuthController extends GisController
{
	public function __construct(User $model)

	{
		parent::__construct();

		$this->model = $model;
	}

    public function getLogin()

    {
    	return view('login');
    }

    public function postLogin(Request $request)

    {
    	if(Auth::attempt(['email' => $request->email , 'password' => $request->password ,'status' =>0]))
    	{
    		return redirect('/');
    	}else{
    		return redirect()->back()->withMessage('user not found!');
    	}
    }

    public function getLogout()

    {
    	\Auth::logout();

    	return redirect('auth/login');
    }
}
