<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show the profile of the authenticated user
    public function profile()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Return the profile view with user data
        return view('users.profile', compact('user'));
    }

    // List all users (for admin)
    public function index()
    {
        // Get all users
        $users = User::all();

        // Return the users index view with users data
        return view('users.index', compact('users'));
    }

    // Show a form for editing the authenticated user's profile
    public function edit()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Return the edit view with user data
        return view('users.edit', compact('user'));
    }

    // Update the authenticated user's profile
    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            // Add other fields as needed
        ]);

        // Update the authenticated user's information
        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        // Update other fields as needed

        $user->save();

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
    }

    // (Optional) Delete the authenticated user (account deletion)
    public function destroy()
    {
        $user = auth()->user();
        $user->delete();

        return redirect()->route('home')->with('success', 'Account deleted successfully.');
    }
}
