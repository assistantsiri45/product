<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalProducts = Product::count();
        $salesThisMonth = 1000; 
        $newUsers = 50; 

        $products = Product::latest()->take(5)->get();

        return view('dashboard', compact('totalProducts', 'salesThisMonth', 'newUsers', 'products'));
    }
}
