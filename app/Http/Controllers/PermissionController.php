<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('admin.role_management.permission.adminAddPermission');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $this->validate($request, [
            'permission_name'=>'required|unique:permissions,name', //value of role_name checked in "name" col
            'permission_detail'=>'required'
        ]);
        $permission_name = $request->permission_name;
        $permission_detail= $request->permission_detail;

        $permission = Permission::create(['name' => $permission_name, 'permission_detail'=> $permission_detail]);

        if(!empty($permission->id)){
            return back()
             ->with('success','You have successfully created a new permission.');
        }else{
            return back()
             ->with('error','Error creating a new permission');
        }
    }

    public function show(string $id){
        $permission = Permission::find($id);
        $roles = Role::all();
        return view('admin.role_management.permission.adminViewPermission', compact('permission', 'roles'));
    }

    public function edit(string $id){
        $permission = Permission::find($id);
        return view('admin.role_management.permission.adminEditPermission', compact('permission'));
    }

    public function update(Request $request, string $id){
        $this->validate($request, [
            'permission_name'=>'required', 
            'permission_detail'=>'required'
        ]);
        $permission_name = $request->permission_name;
        $permission_detail= $request->permission_detail;

        $permission = Permission::find($id);
        $permission->name = $permission_name;
        $permission->permission_detail = $permission_detail;
        $permission->save();

        if(!empty($permission->id)){
            return back()
             ->with('success','You have successfully updated a new permission.');
        }else{
            return back()
             ->with('error','Error creating a updating permission');
        }
    }

    public function destroy(string $id){
        $permission = Permission::find($id)->delete();
        if($permission){
            return back()
             ->with('success',"You have successfully deleted permission information.");
        }else{
            return back()
             ->with('error',"Error deleting permission information");
        }
    }

    public function assignRole(Request $request, string $permission_id){
        $permission = Permission::find($permission_id);
        $role = Role::findByName($request->assign_role);
        if($role->hasPermissionTo($permission->name)){
            return back()
             ->with('error',"Permission Already Exists");
        }else{
            $permission->assignRole($request->assign_role);
            return back()
             ->with('success',"Permission Assigned");
        }
    }

    public function revokePermission(string $permission_id, string $role_id ){
        $role = Role::find($role_id);
        $permission = Permission::find($permission_id);

        $role->revokePermissionTo($permission);

        if($role->hasPermissionTo($permission->name)){
            return back()
             ->with('error',"Error Revoking Permission");
        }else{
            return back()
             ->with('success',"Permission Revoked");
        }
    }
}