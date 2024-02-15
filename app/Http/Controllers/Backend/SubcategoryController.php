<?php

namespace App\Http\Controllers\Backend;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use Exception;
use File;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::get();
        return view('Backend.Subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.Subcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         try {
            $subcategory = new Subcategory;
            $subcategory->name = $request->subcategoryName;
            $subcategory->category_id = $request->categoryId;
            $subcategory->status = $request->status;
            if ($request->hasFile('image')) {
                $imageName = rand(999, 111) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/subcategories/'), $imageName);
                $subcategory->image = $imageName;
            }
            if ($subcategory->save())
                return redirect()->route('subcategory.index')->with('success', 'Successfully Saved');
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
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail(encryptor('decrypt', $id));
        return view('Backend.Subcategories.edit', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $subcategory = Subcategory::findOrFail(encryptor('decrypt', $id));
            $subcategory->name = $request->subcategoryName;
            $subcategory->category_id = $request->categoryId;
            $subcategory->status = $request->status;
            if ($request->hasFile('image')) {
                $imageName = rand(999, 111) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/subcategories/'), $imageName);
                $subcategory->image = $imageName;
            }
            if ($subcategory->save())
                return redirect()->route('subcategory.index')->with('success', 'Successfully Saved');
            else
                return redirect()->back()->withInput()->with('error', 'Failed to save data');
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
        $subcategory = Subcategory::findOrFail(encryptor('decrypt', $id));
        $image_path = public_path('uploads/subcategories') . $subcategory->image;

        if ($subcategory->delete()) {
            if (File::exists($image_path))
                File::delete($image_path);
            return redirect()->back()->with('error', 'Data Deleted');
        }
    }
}
