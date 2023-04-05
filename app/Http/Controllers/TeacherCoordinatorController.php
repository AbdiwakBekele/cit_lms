<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Role;

class TeacherCoordinatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $role_coordinator = Role::where('role_name', 'Teacher Coordinator')->first();
        $coordinators = User::where('role_id', $role_coordinator->id)->get();
        return view('admin.teacher_coordinator.adminTeacherCoordinator', compact('coordinators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('admin.teacher_coordinator.adminAddTeacherCoo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $this->validate($request, [
            'fullname'=>'required',
            'email'=>'required|unique:users',
            'age'=>'required',
            'phone'=>'required',
            'address'=>'required'
        ]);

        $fullname = $request->fullname;
        $email = $request->email;
        $age = $request->age;
        $phone = $request->phone;
        $address = $request->address;

        $role_coordinator = Role::where('role_name', 'Teacher Coordinator')->first();
        if($role_coordinator != null){
            $coordinator = new User(['fullname'=>$fullname, 'age'=>$age, 'email'=>$email, 'phone'=>$phone, 'address'=>$address, 'password'=>'1234' ]);
        
            $roles = Role::find($role_coordinator->id);
            $roles->role()->save($coordinator);

            if($coordinator->id){
                return back()
                 ->with('success','You have successfully created a teacher coordinator information');
            }else{
                return back()
                ->with('error','Error creating teacher coordinator information');
            }

        }else{
            
            return back()
                ->with('error','Unable to create teacher information: There is no teacher coordinator role in the system');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $coordinator = User::find($id);
        $role = Role::find($coordinator->role_id);
        return view('admin.teacher_coordinator.adminViewTeacherCoo', compact('coordinator', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $coordinator = User::find($id);
        return view('admin.teacher_coordinator.adminEditTeacherCoo', compact('coordinator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $this->validate($request, [
            'fullname'=>'required',
            'email'=>'required',
            'age'=>'required',
            'phone'=>'required',
            'address'=>'required'
        ]);

        $fullname = $request->fullname;
        $email = $request->email;
        $age = $request->age;
        $phone = $request->phone;
        $address = $request->address;

    
        $coordinator = User::find($id);
        $coordinator->fullname = $fullname;
        $coordinator->email = $email;
        $coordinator->age = $age;
        $coordinator->phone = $phone;
        $coordinator->address = $address;
        $result = $coordinator->save();

        if($result){
            return back()
                ->with('success','You have successfully updated a teacher coordinator\'s information');
        }else{
            return back()
            ->with('error','Error updating teacher coordinator\'s information');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $coordinator = User::find($id)->delete();
        if($coordinator){
            return back()
                ->with('success','You have successfully deleted a teacher coordinator\'s information');
        }else{
            return back()
            ->with('error','Error deleting teacher coordinator\'s information');
        }
    }
}