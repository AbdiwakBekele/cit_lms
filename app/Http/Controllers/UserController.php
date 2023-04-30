<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $users = User::all();
        return view('admin.user_management.adminUserManagement', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $roles = Role::all();
        return view('admin.user_management.adminAddUser', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        $this->validate($request, [
            'fullname'=> 'required',
            'email'=>'required|unique:users',
            'age'=>'required',
            'phone'=>'required',
            'address'=> 'required',
            'assigned_role'=> 'required'
        ]);

        $fullname = $request->fullname;
        $email = $request->email;
        $age = $request->age;
        $phone = $request->phone;
        $address = $request->address;
        $role_id = $request->assigned_role;

        $user = new User([ 'fullname'=>$fullname, 'email'=>$email, 'age'=>$age, 'phone'=>$phone, 'address'=>$address, 'password'=>'1234' ]);
        $roles = Role::find($role_id);
        $roles->role()->save($user);

        if(!empty($roles->id)){
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
        $user = User::find($id);
        $roles = Role::all();
        $permissions = Permission::all();
        $user_roles = $user->roles; 
        $user_permissions = $user->getAllPermissions();
        
        return view('admin.user_management.adminViewUser', compact('user', 'roles', 'permissions', 'user_roles', 'user_permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.user_management.adminEditUser', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $this->validate($request, [
            'fullname'=> 'required',
            'email'=>'required',
            'age'=>'required',
            'phone'=>'required',
            'address'=> 'required',
            'assigned_role'=> 'required'
        ]);

        $fullname = $request->fullname;
        $email = $request->email;
        $age = $request->age;
        $phone = $request->phone;
        $address = $request->address;
        $role_id = $request->assigned_role;

        $user = User::find($id);
        $user->fullname = $fullname;
        $user->email = $email;
        $user->age = $age;
        $user->phone = $phone;
        $user->address = $address;
        $user->role_id = $role_id;
        $user->save();

        if(!empty($user->id)){
            return back()
             ->with('success',"You have successfully updated user's information.");
        }else{
            return back()
             ->with('error',"Error creating a updating user's information");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $user = User::find($id)->delete();

        if($user){
            return back()
             ->with('success',"You have successfully deleted a user");
        }else{
            return back()
             ->with('error',"Error deleting a user");
        }

    }

    public function assignPermission(Request $request){

        $this->validate($request, [
            'assign_permission'=> 'required',
            'user_id'=>'required'
        ]);

        $user = User::find($request->user_id);
        $assign_permission = Permission::findByName($request->assign_permission);

        if($user->hasPermissionTo($assign_permission)){
            return back()
             ->with('error',"Permission Already Exists");
        }else{
            $user->givePermissionTo($assign_permission);
            return back()
             ->with('success',"Permission Assigned");
        }
    }

    public function revokePermission(string $user_id, string $permission_id){

        $user = User::find($user_id);
        $permission = Permission::find($permission_id);

        $user->revokePermissionTo($permission);

        if($user->hasPermissionTo($permission)){
            return back()
             ->with('error',"Error Revoking Permission");
        }else{
            return back()
             ->with('success',"Permission Revoked");
        }
    }

    public function assignRole(Request $request){
        $this->validate($request, [
            'assigned_role'=> 'required',
            'user_id'=>'required'
        ]);

        $user = User::find($request->user_id);
        $role = Role::findByName($request->assigned_role);
        

        if($user->hasRole($role)){
            return back()
             ->with('error',"Role Already Exists");
        }else{
            $user->assignRole($role);
            return back()
             ->with('success',"Role Assigned");
        }
    }

    public function revokeRole(string $user_id, string $role_id){

        $user = User::find($user_id);
        $role = Role::find($role_id);

        $user->removeRole($role);

        if($user->hasRole($role)){
            return back()
             ->with('error',"Error Revoking Role");
        }else{
            return back()
             ->with('success',"Role Revoked");
        }
    }
}