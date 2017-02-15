<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\RegisterUserFormRequest;
use App\User;
use DB;

class RegisterUserController extends Controller
{
    public function __construct()
    { 
    	
    }

    public function index(Request $request)
    {
    	return view('almacen.usuarios.registeruser');
    }

    public function store (RegisterUserFormRequest $request)
    {
        $userregister=new User;
        $userregister->first_name=$request->get('first_name');
        $userregister->last_name=$request->get('last_name');
        $userregister->email=$request->get('email');
        $userregister->password=bcrypt($request->get('password'));

        if (Input::hasFile('foto')) {
        	$file=Input::file('foto');
        	$file->move(public_path().'/imagenes/users/',$file->getClientOriginalName());
        	$userregister->foto=$file->getClientOriginalName();
        }
        $userregister->save();
        return Redirect::to('/registeruser');

    }
}
