<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Role;
use App\Models\User;

class RegistrarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $role_registrar = Role::where('role_name', 'Registrar')->first();

        if($role_registrar != null){
            $registrars = User::where('role_id', $role_registrar->id)->get();
            return view('admin.registrar_managment.adminRegistrarManagment', compact('registrars'));
        }else{
            $registrars = [];
            return view('admin.registrar_managment.adminRegistrarManagment', compact('registrars'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('admin.registrar_managment.adminAddRegistrar');
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

        $role_registrar= Role::where('role_name', 'Registrar')->first();
        if($role_registrar != null){
            $registrar = new User(['fullname'=>$fullname, 'age'=>$age, 'email'=>$email, 'phone'=>$phone, 'address'=>$address, 'password'=>'1234' ]);
        
            $roles = Role::find($role_registrar->id);
            $roles->role()->save($registrar);

            if($registrar->id){
                return back()
                 ->with('success','You have successfully created a registrar information');
            }else{
                return back()
                ->with('error','Error creating registrar information');
            }

        }else{
            
            return back()
                ->with('error','Unable to create Registrar: There is no Registrar role in the system');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $registrar = User::find($id);
        $role = Role::find($registrar->role_id);
        return view('admin.registrar_managment.adminViewRegistrar', compact('registrar', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $registrar = User::find($id);
        return view('admin.registrar_managment.adminEditRegistrar', compact('registrar'));
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

    
        $registrar = User::find($id);
        $registrar->fullname = $fullname;
        $registrar->email = $email;
        $registrar->age = $age;
        $registrar->phone = $phone;
        $registrar->address = $address;
        $result = $registrar->save();

        if($result){
            return back()
                ->with('success','You have successfully updated a registrar\'s information');
        }else{
            return back()
            ->with('error','Error updating registrar\'s information');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $registrar = User::find($id)->delete();
        if($registrar){
            return back()
                ->with('success','You have successfully deleted registrar\'s information');
        }else{
            return back()
            ->with('error','Error deleting registrar\'s information');
        }
    }
}