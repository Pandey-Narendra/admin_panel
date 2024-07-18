<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class UserController extends Controller
{
    public function showProfile()
    {
        try {
            $user = Auth::user();
            return response()->json($user);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to retrieve user profile.'], 500);
        }
    }

    public function home()
    {
        try {
            return response()->json(['message' => 'Welcome to the home page!']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to load home page.'], 500);
        }
    }

    public function showProducts()
    {
        try {
            $products = Product::paginate(10);
            return response()->json($products);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to retrieve products.'], 500);
        }
    }

    public function showAdminProfile()
    {
        try {
            $admin = Auth::user();
            return response()->json($admin);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to retrieve admin profile.'], 500);
        }
    }

    public function updateAdminProfile(Request $request)
    {
        try {
            $admin = Auth::user();
            $admin->update($request->only(['name', 'email']));
            return response()->json(['message' => 'Profile updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update profile.'], 500);
        }
    }

    public function showUsers()
    {
        $users = User::paginate(10);
        return response()->json($users);
    }

    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:user,admin'
        ]);

        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return response()->json(['message' => 'User role updated successfully.']);
    }
}