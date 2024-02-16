<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use Exception;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Subcategory::get();
        return view('Backend.Products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brand = Brand::get();
        $category = Category::get();
        $subcategory = Subcategory::get();
        return view('Backend.Products.create', compact('brand', 'category', 'subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $product = new Subcategory;
            $product->name = $request->productName;
            $product->description = $request->productdescription;
            $product->price = $request->productprice;
            $product->old_price = $request->oldPrice;
            $product->quantity_in_stock = $request->quantityInStock;
            $product->brand_id = $request->brandId;
            $product->category_id = $request->categoryId;
            $product->subcategory_id = $request->subcategoryId;
            $product->status = $request->status;
            if ($request->hasFile('image')) {
                $imageName = rand(999, 111) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/products/'), $imageName);
                $product->image = $imageName;
            }
            if ($product->save())
                return redirect()->route('product.index')->with('success', 'Successfully Saved');
            else
                return redirect()->back()->withInput()->with('error', 'Failed to save data');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->withInput()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = Brand::get();
        $category = Category::get();
        $subcategory = Subcategory::get();
        $product = Product::findOrFail(encryptor('decrypt', $id));
        return view('Backend.Products.edit', compact('brand', 'category', 'subcategory', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $product = Product::findOrFail(encryptor('decrypt', $id));
            $product->name = $request->productName;
            $product->description = $request->productdescription;
            $product->price = $request->productprice;
            $product->old_price = $request->oldPrice;
            $product->quantity_in_stock = $request->quantityInStock;
            $product->brand_id = $request->brandId;
            $product->category_id = $request->categoryId;
            $product->subcategory_id = $request->subcategoryId;
            $product->status = $request->status;
            if ($request->hasFile('image')) {
                $imageName = rand(999, 111) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/products/'), $imageName);
                $product->image = $imageName;
            }
            if ($product->save())
                return redirect()->route('product.index')->with('info', 'Successfully Updated');
            else
                return redirect()->back()->withInput()->with('error', 'Failed to update data');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->withInput()->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail(encryptor('decrypt', $id));
        $image_path = public_path('uploads/products') . $product->image;

        if ($product->delete()) {
            if (File::exists($image_path))
                File::delete($image_path);
            return redirect()->back()->with('error', 'Data Deleted');
        }
    }
}
