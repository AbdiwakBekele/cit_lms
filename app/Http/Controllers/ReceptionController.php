<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Role;
use App\Models\User;

class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $role_reception= Role::where('role_name', 'Reception')->first();
        if( $role_reception == null){
            $receptions = [];
            return view('admin.reception_managment.adminReceptionManagment', compact('receptions'));
        }
        $receptions = User::where('role_id', $role_reception->id)->get();
        return view('admin.reception_managment.adminReceptionManagment', compact('receptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('admin.reception_managment.adminAddReception');
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

        $role_reception= Role::where('role_name', 'Reception')->first();
        if($role_reception != null){
            $reception = new User(['fullname'=>$fullname, 'age'=>$age, 'email'=>$email, 'phone'=>$phone, 'address'=>$address, 'password'=>'1234' ]);
        
            $roles = Role::find($role_reception->id);
            $roles->role()->save($reception);

            if($reception->id){
                return back()
                 ->with('success','You have successfully created reception information');
            }else{
                return back()
                ->with('error','Error creating reception information');
            }

        }else{
            
            return back()
                ->with('error','Unable to create Reception: There is no Reception role in the system');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $reception = User::find($id);
        $role = Role::find($reception->role_id);
        return view('admin.reception_managment.adminViewReception', compact('reception', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $reception = User::find($id);
        return view('admin.reception_managment.adminEditReception', compact('reception'));
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

    
        $reception = User::find($id);
        $reception->fullname = $fullname;
        $reception->email = $email;
        $reception->age = $age;
        $reception->phone = $phone;
        $reception->address = $address;
        $result = $reception->save();

        if($result){
            return back()
                ->with('success','You have successfully updated reception\'s information');
        }else{
            return back()
            ->with('error','Error updating reception\'s information');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $reception = User::find($id)->delete();
        if($reception){
            return back()
                ->with('success','You have successfully deleted reception\'s information');
        }else{
            return back()
            ->with('error','Error deleting reception\'s information');
        }
    }
}