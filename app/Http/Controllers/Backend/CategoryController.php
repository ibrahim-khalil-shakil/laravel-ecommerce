<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Exception;
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return view('Backend.Categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $category = new Category;
            $category->name = $request->categoryName;
            $category->status = $request->status;
            if ($request->hasFile('image')) {
                $imageName = rand(999, 111) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/categories/'), $imageName);
                $category->image = $imageName;
            }
            if ($category->save())
                return redirect()->route('category.index')->with('success', 'Successfully Saved');
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
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail(encryptor('decrypt', $id));
        return view('Backend.Categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $category = Category::findOrFail(encryptor('decrypt', $id));
            $category->name = $request->categoryName;
            $category->status = $request->status;
            if ($request->hasFile('image')) {
                $imageName = rand(999, 111) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/categories'), $imageName);
                $category->image = $imageName;
            }
            if ($category->save())
                return redirect()->route('category.index')->with('info', 'Successfully Updated');
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
        $category = Category::findOrFail(encryptor('decrypt', $id));
        $image_path = public_path('uploads/categories') . $category->image;

        if ($category->delete()) {
            if (File::exists($image_path))
                File::delete($image_path);
            return redirect()->back()->with('error', 'Data Deleted');
        }
    }
}
