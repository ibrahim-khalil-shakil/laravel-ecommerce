<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Http\Requests\Brands\StoreRequest;
use App\Http\Requests\Brands\UpdateRequest;
use Exception;
use File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::get();
        return view('Backend.Brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.Brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $brand = new Brand;
            $brand->name = $request->brandName;
            $brand->status = $request->status;
            if ($request->hasFile('image')) {
                $imageName = rand(999, 111) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/brands'), $imageName);
                $brand->image = $imageName;
            }
            if ($brand->save())
                return redirect()->route('brand.index')->with('success', 'Successfully Saved');
            else
                return redirect()->back()->with('error', 'Failed to save data');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail(encryptor('decrypt', $id));
        return view('Backend.Brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $brand = Brand::findOrFail(encryptor('decrypt', $id));
            $brand->name = $request->brandName;
            if ($request->hasFile('image')) {
                $imageName = rand(999, 111) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/brands'), $imageName);
                $brand->image = $imageName;
            }
            if ($brand->save())
                return redirect()->route('brand.index')->with('success', 'Successfully Saved');
            else
                return redirect()->back()->with('error', 'Failed to save data');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail(encryptor('decrypt', $id));
        $image_path = public_path('uploads/brands') . $brand->image;

        if ($brand->delete()) {
            if (File::exists($image_path))
                File::delete($image_path);

            return redirect()->back()->with('danger', 'Data Deleted');
        }
    }
}
