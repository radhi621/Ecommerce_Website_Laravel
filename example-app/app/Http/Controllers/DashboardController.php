<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Fetch all products
        $users = User::where('usertype', 'user')->get();   // Fetch all users

        // Make sure you are passing 'users' to the view correctly
        return view('dashboard', compact('products', 'users'));
    }
}




