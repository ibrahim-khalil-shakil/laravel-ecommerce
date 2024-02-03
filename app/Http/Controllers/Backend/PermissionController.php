<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Role;
use Exception;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
       $role = Role::findOrFail(encrypt('decrypt',$id));
       $permission = Permission::where('role_id',encrypt('decrypt',$id))->get();
       return view('Backend.Permissions.index', compact('role','permission'));
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

    public function save(Request $request, $role)
    {
        try {
            //delete permission before saved
            Permission::where('role_id',encryptor('decrypt',$role))->delete();
            foreach($request->permission as $permission){
                $data = new Permission;
                $data->role_id=encryptor('decrypt',$role);
                $data->name=$permission;
                $data->save();
            }
            return redirect()->route('Backend.Roles.index')->with('success', 'Permission Saved');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->withInput()->with('error', 'Please try again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
