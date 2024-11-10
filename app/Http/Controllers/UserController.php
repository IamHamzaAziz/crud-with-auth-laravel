<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function register(Request $request){
        try {
            $incomingFields = $request->validate([
                'name' => 'required|min:3|max:20', Rule::unique('users', 'name'),
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if (User::where('name', $incomingFields['name'])->exists()) {
                return redirect('/register')->withErrors([
                    'name' => 'This name is already taken'
                ]);
            }
        } catch (ValidationException $e) {
            return redirect('/register')->withErrors([
                'validation' => 'Please fill in all required fields'
            ]);
        }

        $incomingFields['password'] = bcrypt($incomingFields['password']);

        $user = User::create($incomingFields);
        auth()->login($user);

        return redirect('/');
    }

    public function showLoginPage(){
        return view('login');
    }

    public function showRegisterPage(){
        return view('register');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function login(Request $request){
        try {
            $incomingFields = $request->validate([
                'name' => 'required',
                'password' => 'required'
            ]);
        } catch (ValidationException $e) {
            return redirect('/login')->withErrors([
                'validation' => 'Please fill in all required fields'
            ]);
        }

        // validation from the database
        if(auth()->attempt(['name' => $incomingFields['name'], 'password' => $incomingFields['password']])){
            $request->session()->regenerate();
            return redirect('/');
        }

        return redirect('/login')->withErrors([
            'auth' => 'Invalid login credentials'
        ]);
    }
}
