<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    // Show register form
    public function home()
    {
        Redirect::setIntendedUrl(url()->previous());
        return view('users.home');
    }

    // Show register form
    public function create()
    {
        Redirect::setIntendedUrl(url()->previous());
        return view('users.create');
    }

    // Create new user
    public function store(Request $request)
    {
        // Validate the user
        $formData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        // Hash the password
        $formData['password'] = bcrypt($formData['password']);

        // Create and save the user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;

        $formData['created_at'] = now();
        $formData['updated_at'] = now();

        $user = User::create($formData);

        // Sign the user in
        auth()->login($user);

        // Redirect to home page
        return redirect()->intended();
    }

    //Logout user
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Show login form
    public function login()
    {
        Redirect::setIntendedUrl(url()->previous());
        return view('users.login');
    }

    // Authenticate user
    public function authenticate(Request $request)
    {
        $formData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($formData)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }
}
