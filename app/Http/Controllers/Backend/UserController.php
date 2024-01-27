<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\Users\StoreRequest;
use App\Http\Requests\Users\UpdateRequest;
use Illuminate\Support\Facades\Hash;
use Exception;
use File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('Backend.Users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role=Role::get();
        return view('Backend.Users.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $user = new User;
            $user->name = $request->fullName;
            $user->email = $request->emailAddress;
            $user->contact_number = $request->contactNumber;
            $user->role_id = $request->roleId;
            $user->address = $request->fullAddress;
            $user->bio = $request->bio;
            $user->dob = $request->dob;
            $user->social_links = $request->socialLinks;
            $user->status = $request->status;
            $user->full_access = $request->fullAccess;
            $user->language = 'en';
            $user->password = Hash::make($request->password);
            if ($request->hasFile('image')) {
                $imageName = rand(999, 111) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/users'), $imageName);
                $user->image = $imageName;
            }
            if ($user->save())
                return redirect()->route('user.index')->with('success', 'Data Saved');
            else
                redirect()->back()->with('error', 'Please Try Again');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Please Try Again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail(encryptor('decrypt', $id));
        $role = Role::get();
        return view('Backend.Users.edit', compact('user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $user = User::findOrFail(encryptor('decrypt', $id));
            $user->name = $request->fullName;
            $user->email = $request->emailAddress;
            $user->contact_number = $request->contactNumber;
            $user->role_id = $request->roleId;
            $user->address = $request->fullAddress;
            $user->bio = $request->bio;
            $user->dob = $request->dob;
            $user->social_links = $request->socialLinks;
            $user->status = $request->status;
            $user->full_access = $request->fullAccess;
            $user->language = 'en';

            if ($request->password)
                $user->password = Hash::make($request->password);

            if ($request->hasFile('image')) {
                $imageName = rand(999, 111) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/users'), $imageName);
                $user->image = $imageName;
            }
            if ($user->save())
                return redirect()->route('user.index')->with('success', 'Data Saved');
            else
                redirect()->back()->with('error', 'Please Try Again');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Please Try Again');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail(encryptor('decrypt', $id));
        $image_path = public_path('uploads/users/') . $user->image;

        if ($user->delete()) {
            if (File::exists($image_path))
                File::delete($image_path);

            return redirect()->back()->with('danger', 'Data Deleted'); 
        }
    }
}
