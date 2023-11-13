<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;

class UserController extends Controller
{
    public function store_staff(Request $request)
    {
        // Validate the input data
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
            'user_type' => 'required',
            'profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('profiles', 'public');
        } else {
            $profilePath = null;
        }

        // Create a new user in the database
        Users::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'confirm_password' => bcrypt($request->input('confirm_password')),
            'user_type' => $request->input('user_type'),
            'profile' => $profilePath,
        ]);

        return redirect('users')->with('success', 'User created successfully');
    }

    public function get_users()
    {
        // Get all users excluding those with the user type 'admin'
        $users = Users::where('user_type', '<>', 'admin')->get();

        return view('admin_side.users', compact('users'));
    }


    public function destroy($user_id)
    {
        // Find the category by its ID
        $user = Users::find($user_id);

        // Check if the category exists
        if ($user) {
            // Delete the category
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully');
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }

    public function edit($user_id)
    {
        $user = Users::find($user_id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $user_id)
    {
        $user = Users::find($user_id);

        if ($user) {
            $user->firstname = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->username = $request->input('username');

            $user->save();

            return redirect('/users')->with('success', 'User updated successfully');
        } else {
            return redirect('/users')->with('error', 'User not found');
        }
    }
}

