<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

class AuthenticateController extends Controller
{
    public function show()
    {
        return view('client_side.registration');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|max:20',
            'lastname' => 'required|max:20',
            'username' => 'required|min:8',
            'password' => 'required|min:6|max:12',
            'confirm_password' => 'required|same:password',
            'user_type' => 'nullable|string',
        ], [
            // Validation error messages...
        ]);

        $user = new Users();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->confirm_password = bcrypt($request->confirm_password);
        $user->profile = 'default_profile_value';
        $user->user_type = $request->user_type ?: 'user'; // If user_type is not provided, default to 'user'

        $user->save();

        return redirect('/login_page')->with('success', 'Registration successful. Please login.');
    }

    public function show_login()
    {
        return view('client_side.login_page');
    }

    public function check_login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username is required',
            'password.required' => 'Password is required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->user_type == 'admin') {
                // Redirect to the admin page
                return redirect('/admin');
            } elseif ($user->user_type == 'user') {
                // Redirect to the user's home page
                return redirect('/home');
            }
        }

        return redirect()->back()->withErrors(['error' => 'Invalid username or password']);
    }

    public function index()
    {
        return view('admin_side.list_appointments');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login_page');
    }

}


