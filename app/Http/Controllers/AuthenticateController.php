<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    public function show()
    {
        return view('client_side.registration') ;   
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|max:20',
            'lastname' => 'required|max:20',
            'username' => 'required|min:8',
            'password' => 'required|min:6|max:12',
            'confirmpass' => 'required|same:password',
        ],
        [
            'firstname.max'=> 'Do not exceed to 20 characters',
            'lastname.max' => 'Do not exceed to 20 characters',
            'username.min' => 'Atleast 8 characters',
            'password.min' => 'Atleast 6 characters',
            'password.max' => 'You exceeded to 12 characters',
            'required' => 'Please enter an input',
            'confirmpass' => 'Does not match to password',
        ]
    );
    return redirect()->back()->withErrors($request->all())->withInput();
    }

    public function show_login()
    {
        return view('client_side.login_page') ;   
    }
    
    public function check_login(Request $request)
    {
        $request->validate([

            'username' => 'required',
            'password' => 'required',
        ],
        [
            'required' => 'Please enter correct credentials'
        ]
        );
        return redirect()->back()->withErrors($request->all())->withInput();
    }

}


