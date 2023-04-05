<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $roles = Role::all();
        $users = User::all();
        return view('admin.user_management.adminUserManagement', compact('roles', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('admin.role_management.adminAddRole');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $this->validate($request, [
            'role_name'=>'required|unique:roles',
            'role_detail'=>'required'
        ]);
        $role_name = $request->role_name;
        $role_detail = $request->role_detail;

        $role = new Role([ 'role_name'=>$role_name, 'role_detail'=>$role_detail ]);
        $role->save();

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
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $role = Role::find($id);
        return view('admin.role_management.adminEditRole', compact('role'));

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
        $role->role_name = $role_name;
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
            $users = User::where('role_id', $id)->delete();

            return back()
             ->with('success',"You have successfully deleted role information.");
        }else{
            return back()
             ->with('error',"Error deleting role information");
        }
    }
}