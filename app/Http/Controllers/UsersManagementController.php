<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersManagementController extends Controller
{
    //

     public function index()
        {
            $users = User::all();
            return view('dashboard.users', compact('users'));
        }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:8',
            'role' => 'required|integer|in:0,1,2',
        ]);

        // Create the user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Redirect back to the users page with a success message
        //return redirect()->route('users.index')->with('success', 'User registered successfully.');
        return redirect()->back()->with('success', 'User registered successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        //return redirect()->route('users.index')->with('success', 'User deleted successfully.');
        return redirect()->back()->with('success', 'User deleted successfully!');
    }

    public function resetPassword($id)
    {
        $user = User::findOrFail($id);
        $user->password = Hash::make('Ambulance123'); // Set a default password
        $user->save();

        //return redirect()->route('users.index')->with('success', 'Password reset successfully. Default password is "defaultpassword".');
        return redirect()->back()->with('success', 'Password reset successfully. Default password is "Ambulance123".');
        
    }


    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
            'phone' => 'required|string|max:15',
            'role' => 'required|integer|in:0,1,2',
        ]);

        // Find the user and update their details
        $user = User::findOrFail($request->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }



}
