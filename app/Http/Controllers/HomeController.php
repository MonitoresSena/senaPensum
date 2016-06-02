<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Auth;
use Session;

class HomeController extends Controller
{
    public function login(){
    	return view('home.login');	
    }

    public function entrar(Request $r){
    	$usr = User::where("email", "=", $r->email)->first();    	

    	$rules = array(
		    'email'    => 'required|email', // make sure the email is an actual email
		    'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

    	$validator = Validator::make(Input::all(), $rules);

    	if($validator->fails()){
    		return redirect('login');
    	} else {
    		$userdata = [
    			'email' 	=> Input::get('email'),
    			'password' 	=> Input::get('password'),
    		];

    		if(Auth::attempt($userdata)){

                Session::put('rol_id', $usr->rol_id);
                Session::put('usr_id', $usr->id);

    			return redirect('admin');
    		} else{
    			return redirect('login');
    		}

    	}

    }

    public function salir(){
    	if(!Auth::guard(null)->guest()){
    		Auth::logout();
    	}
    	return redirect('login');
    }

    public function index(){
        return view('home.index');
    }
}
