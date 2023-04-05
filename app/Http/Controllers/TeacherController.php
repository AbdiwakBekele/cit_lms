<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Role;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $role_teacher = Role::where('role_name', 'Teacher')->first();
        $role_coordinator = Role::where('role_name', 'Teacher Coordinator')->first();
        $teachers = User::where('role_id', $role_teacher->id)->get();
        $coordinators = User::where('role_id', $role_coordinator->id)->get();
        return view('admin.teacher_managment.adminTeacherManagement', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('admin.teacher_managment.adminAddTeacher');
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

        $role_teacher = Role::where('role_name', 'Teacher')->first();
        echo $role_teacher->id;
        if($role_teacher != null){
            $teacher = new User(['fullname'=>$fullname, 'age'=>$age, 'email'=>$email, 'phone'=>$phone, 'address'=>$address, 'password'=>'1234' ]);
        
            $roles = Role::find($role_teacher->id);
            $roles->role()->save($teacher);

            if($teacher->id){
                return back()
                 ->with('success','You have successfully created a teacher information');
            }else{
                return back()
                ->with('error','Error creating teacher information');
            }

        }else{
            
            return back()
                ->with('error','Unable to create teacher information: There is no teacher role in the system');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $teacher = User::find($id);
        $role = Role::find($teacher->role_id);
        return view('admin.teacher_managment.adminViewTeacher', compact('teacher', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $teacher = User::find($id);
        return view('admin.teacher_managment.adminEditTeacher', compact('teacher'));
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

        $teacher = User::find($id);
        $teacher->fullname = $fullname;
        $teacher->email = $email;
        $teacher->age = $age;
        $teacher->phone = $phone;
        $teacher->address = $address; 
        $res = $teacher->save();

        if($res){
            return back()
             ->with('success','You have successfully updated teacher\'s information');
        }else{
            return back()
            ->with('error','Error updating teacher\' information');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $teacher = User::find($id)->delete();
        
        if($teacher){
            return back()
             ->with('success','You have successfully updated teacher\'s information');
        }else{
            return back()
            ->with('error','Error updating teacher\' information');
        }
        
    }
}