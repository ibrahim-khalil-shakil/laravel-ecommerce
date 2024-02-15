<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Http\Requests\Roles\StoreRequest;
use App\Http\Requests\Roles\UpdateRequest;
use Exception;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::get();
        return view('Backend.Roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.Roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $role = new Role();
            $role->type = $request->roleType;
            $role->identity = $request->roleIdentity;
            if ($role->save()) {
                return redirect()->route('role.index')->with('success', 'Data Saved');
            } else {
                redirect()->back()->withInput()->with('error', 'Please Try Again');
            }
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Please Try Again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::findOrFail(encryptor('decrypt', $id));
        return view('Backend.Roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $role = Role::findOrFail(encryptor('decrypt', $id));
            $role->type = $request->roleType;
            $role->identity = $request->roleIdentity;
            if ($role->save()) {
                return redirect()->route('role.index')->with('info', 'Data Saved');
            } else {
                redirect()->back()->withInput()->with('error', 'Please Try Again');
            }
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
        $role = Role::findOrFail(encryptor('decrypt', $id));
        if ($role->delete()) {
            return redirect()->back()->with('error', 'Data Deleted');
        }
    }
}
