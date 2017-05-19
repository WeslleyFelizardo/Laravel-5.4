<?php

namespace App\Http\Controllers;


use Request;
use Auth;
use App\Categoria;
use App\User;

class UserController extends Controller
{
    // public function login() {
    // 	return view('login.login');
    // }

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

    public function cadastro() {

        return view('login.cadastro');
    }

    public function inserirUser(Request $request){
        $user = new User;
        
        $user->name = $request->input("nome");
        $user->email = $request->input("email");
        $user->password = bcrypt($request->input("password"));
        $user->endereco = $request->input("endereco");

        $user->save();

        return redirect("/");
    }
}
