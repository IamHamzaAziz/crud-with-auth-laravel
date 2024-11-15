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
            // Validate incoming registration form data with Laravel validation rules
            $incomingFields = $request->validate([
                'name' => 'required|min:3|max:20', Rule::unique('users', 'name'),
                'email' => 'required|email',
                'password' => 'required'
            ]);

            // Check if username already exists in database and return error if it does
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

        // Hash the user's password for security before storing in database
        $incomingFields['password'] = bcrypt($incomingFields['password']);

        // Create new user record in database with validated fields
        $user = User::create($incomingFields);
        
        // Log the newly created user in automatically
        auth()->login($user);

        return redirect()->route('home');
    }

    public function showLoginPage(){
        return view('login');
    }

    public function showRegisterPage(){
        return view('register');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('home');
    }

    public function login(Request $request){
        try {
            // Validate incoming login form data with Laravel validation rules
            $incomingFields = $request->validate([
                'name' => 'required',
                'password' => 'required'
            ]);
        } catch (ValidationException $e) {
            return redirect()->name('login_page')->withErrors([
                'validation' => 'Please fill in all required fields'
            ]);
        }

        // Attempt to authenticate the user with the provided credentials
        if(auth()->attempt(['name' => $incomingFields['name'], 'password' => $incomingFields['password']])){
            // Regenerate the session to prevent session fixation attacks
            $request->session()->regenerate();
            return redirect()->name('home');
        }

        // Return error message if authentication fails
        return redirect()->name('login_page')->withErrors([
            'auth' => 'Invalid login credentials'
        ]);
    }
}
