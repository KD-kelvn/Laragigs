<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    //
    public function store(Request $request){
        $formFields = $request->validate([
            'name'=> ['required', 'min:3'],
            'email'=> ['required', 'email', Rule::unique('users', 'email')],
            'password'=> ['required', 'confirmed', 'min:6'],
           ]);
       $username = $formFields['name'];
       $formFields['password'] =  bcrypt($formFields['password']);
       $user = User::create($formFields);
       
       auth()->login($user);
       $msg =$username ." "."registered and logged in";
       return redirect('/')->with('message', $msg);
    }

    public function login(){
     return view('Users.login');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email'=> ['required', 'email'],
            'password'=> ['required'],
           ]);

           if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Logged in successfully, welcome back');
           }
           return back()->withErrors(['email' => "Invalid credentials"])->onlyInput('email');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message',"You have logged out successfully");
    }
}
