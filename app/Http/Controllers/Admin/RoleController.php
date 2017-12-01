<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::all();

        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions=Permission::all();
        return view('admin.roles.create',compact('permissions'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'role'=>'required|max:50|unique:roles',
        ]);
        $role=new Role;
        $role->role=$request->role;
        $role->save();
        $role->permissions()->sync($request->permission);
        return redirect(route('roles.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit( Role $role)
    {
        $role=Role::where('id',$role->id)->first();
        $permissions=Permission::all();
        return view('admin.roles.edit',compact('role','permissions'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {

        $this->validate($request,[
            'role'=>'required|max:50',
        ]);
        $role=Role::find($role->id);
        $role->role=$request->role;
        $role->save();
        $role->permissions()->sync($request->permission);
        return redirect(route('roles.index'))->with('message','role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::where('id',$id)->delete();
        return redirect()->back()->with('message','role deleted successfully');
    }
}
