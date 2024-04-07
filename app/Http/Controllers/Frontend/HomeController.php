<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::get();
        $categories = Category::get();
        $featuredProducts = Product::where('isFeatured','1')->get();
        return view('Frontend.home', compact('subcategories', 'categories'));
    }
    public function featuredProducts()
    {
        $categories = Category::get();
        $all = Product::get();
        $fruits = Product::where('category','fruits')->get();
        $vegetables = Product::where('category', 'vegetables')->get();
        $meats = Product::where('category','meats')->get();
        $bevarages = Product::where('category', 'bevarages')->get();
        return view('Frontend.home', compact('categories','all','fruits', 'vegetables', 'meats','bevarages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
