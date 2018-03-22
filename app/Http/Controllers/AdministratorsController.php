<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class AdministratorsController extends Controller
{
	// Option 1
    /*public function showLoginForm() 
    {		
    	return view('administrators.login');
    }*/

    //Option 2
    use AuthenticatesUsers;

    protected $loginView = 'administrators.login';


    protected $guard = 'admins';

    function __construct()
    {
    	$this->middleware('auth:admins', ['only' => ['secret']]);
    }



    public function authenticated()
    {
    	return redirect('admins/area');
    }

    public function secret()
    {
    	return 'Hola ' . auth('admins')->user()->name;
    }
}
