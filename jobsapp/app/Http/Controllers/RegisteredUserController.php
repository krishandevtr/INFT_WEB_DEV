<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register'); // Return the register view located in auth namespace
    }
    public function store(Request $request)
    {
        // Step 1: Validate form data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Ensure passwords match
        ]);

        // Step 2: Create the user
        $user = \App\Models\User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), // Hash the password
        ]);

        // Step 3: Log in the user
        auth()->login($user);

        // Step 4: Redirect the user
        return redirect('/jobs')->with('success', 'You have successfully registered and logged in!');
    }



}
