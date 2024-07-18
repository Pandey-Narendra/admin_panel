<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Exception;

class UserController extends Controller
{
    public function showProfile()
    {
        try {
            $user = Auth::user();
            return view('user.profile', compact('user'));
        } catch (Exception $e) {
            return redirect()->route('user.home')->with('error', 'Failed to load user profile.');
        }
    }

    public function home()
    {
        try {
            return view('user.home');
        } catch (Exception $e) {
            return redirect()->route('user.home')->with('error', 'Failed to load home page.');
        }
    }

    public function showProducts()
    {
        try {
            $products = Product::paginate(10);
            return view('user.products.products', compact('products'));
        } catch (Exception $e) {
            return redirect()->route('user.home')->with('error', 'Failed to load products.');
        }
    }
}
