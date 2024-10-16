<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

   
    public function create()
    {
      // dd("hello");
        return view('products.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        $product = new Product($request->except('image'));
    
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $product->image = $path;
        }
    
        $product->save();
        return redirect('/products')->with('success', 'Product created successfully!');
    }
    public function index()
    {
        
        $products = Product::all();

     
        return view('products.index', compact('products'));
    
    }
    
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
    
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        $product->update($request->except('image'));
    
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $product->image = $path;
        }
    
        $product->save();
        return redirect('/products')->with('success', 'Product updated successfully!');
    }
    
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
    public function destroy(Request $request, $id)
    {
      
        $product = Product::find($id);
        
        if ($product) {
            $product->delete();
            
            
            return redirect()->route('products')->with('success', 'Product deleted successfully.');
        }
    
        return redirect()->route('products')->with('error', 'Product not found.');
    }
}
