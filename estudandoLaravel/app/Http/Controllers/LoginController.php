<?php

namespace App\Http\Controllers;

use Request;
use Auth;
use App\Categoria;

class LoginController extends Controller
{
    public function login() {
    	return view('login.login');
    }

    public function logar() {
    	$credenciais = Request::only('email', 'password');

    	if (Auth::attempt($credenciais)) {
    		return redirect('/');
    	}

    	return '';
    }

    public function logout() {
    	Auth::logout();

    	return redirect('/');
    }
}
