<?php

namespace App\Http\Controllers;

use App\Models\Admin\Product;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products= Product::all();
        $products= Product::where('user_id',Auth::id())->paginate(2); // Pagination 2 products per page
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|string|max:10',
            'description' =>'required|string|max:255',
            'price' =>'required|numeric',
            'quantity' =>'required|integer|min:0',
            'category_id' =>'required'

        ]);
        $product = Product::create([
                'user_id' =>Auth::id(),
                'name'=> $request->name,
                'price'=> $request->price,
                'quantity'=> $request->quantity,
                'description'=> $request->description,
                'category_id'=> $request->category_id
            ]);
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories= Category::all();
        return view('admin.products.edit', compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' =>'required|string|max:10',
            'description' =>'required|string|max:255',
            'price' =>'required|numeric|min:0',
            'quantity' =>'required|integer|min:0',
            'category_id' =>'required'
        ]);
        $product->update($request->all());
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }
}
