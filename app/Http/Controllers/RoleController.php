<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.role_management.adminRoleManagment', compact('roles', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $permissions = Permission::all();
        return view('admin.role_management.role.adminAddRole', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $this->validate($request, [
            'role_name'=>'required|unique:roles,name', //value of role_name checked in "name" col
            'role_detail'=>'required'
        ]);
        $role_name = $request->role_name;
        $role_detail = $request->role_detail;

        $role = Role::create(['name' => $role_name, 'role_detail'=> $role_detail]);

        if(!empty($role->id)){
            return back()
             ->with('success','You have successfully created a new user.');
        }else{
            return back()
             ->with('error','Error creating a new user');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('admin.role_management.role.adminViewRole', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $role = Role::find($id);
        return view('admin.role_management.role.adminEditRole', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $this->validate($request, [
            'role_name'=>'required',
            'role_detail'=>'required'
        ]);
        
        $role_name = $request->role_name;
        $role_detail = $request->role_detail;

        $role = Role::find($id);
        $role->name = $role_name;
        $role->role_detail = $role_detail;
        $role->save();

        if(!empty($role->id)){
            return back()
             ->with('success',"You have successfully updated role's information.");
        }else{
            return back()
             ->with('error',"Error creating a updating role's information");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $role = Role::find($id)->delete();

        if($role){

            return back()
             ->with('success',"You have successfully deleted role information.");
        }else{
            return back()
             ->with('error',"Error deleting role information");
        }
    }

    public function assignPermission(Request $request, string $role_id){

        $role = Role::find($role_id);
        if($role->hasPermissionTo($request->assign_permission)){
            return back()
             ->with('error',"Permission Already Exists");
        }else{
            $role->givePermissionTo($request->assign_permission);
            return back()
             ->with('success',"Permission Assigned");
        }
    }

    public function revokePermission(string $role_id, string $permission_id){

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