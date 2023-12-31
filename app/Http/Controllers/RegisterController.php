<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request){
        //dd($request);
        //dd($request->geet('username'))

        // Modificar request
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'name' =>'required|max:30',
            'username' =>'required|unique:users|min:3|max:20',
            'email' =>'required|unique:users|email|max:50',
            'password' =>'required|confirmed|min:6'
        ]);

       
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);

        // Autenticar el usuario
        //auth()->attempt([
        //    'email'=> $request->email,
        //    'password' => $request->password
        //]);

        // Otra forma de autenticar
        auth()->attempt($request->only('email', 'password'));

        // Redireccionar
        return redirect()->route('posts.index', ['user' => $user]);
    }

   
}
