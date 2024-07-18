<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;

class AdminController extends Controller
{
    public function showProfile()
    {
        try {
            $admin = Auth::user();
            $users = User::paginate(3);
            return view('admin.profile', compact('admin', 'users'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to load profile details.');
        }
    }

    public function updateProfile(Request $request)
    {
        try {
            $admin = Auth::user();
            $admin->update($request->only(['name', 'email']));
            return redirect()->back()->with('success', 'Profile updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to update profile.');
        }
    }

    public function updateRole(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->role = $request->role;
            $user->save();
            return redirect()->back()->with('success', 'User role updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to update user role.');
        }
    }
}
