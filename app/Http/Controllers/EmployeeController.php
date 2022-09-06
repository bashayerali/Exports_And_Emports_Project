<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;

use App\Mail\UserPassMail;
class EmployeeController extends Controller
{
    //
    public function show($id){
      $user = User::where('department_id', $id)->get();
      $departmentId = $id;

        return view('employee',compact('user','departmentId'));
        
        
        }


    public function add($id){
      $departmentId = $id;
      
    return view('employeeForm',compact('departmentId'));
  }
  
  public function store(Request $request){
     
      $request->validate([

          'name' => ['required', 'string', 'max:255'],
          'email' => [
              'required',
              'string',
              'email',
              'max:255',
              Rule::unique(User::class),
          ],

         ]);
          $emailU=$request->email;
          $char="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%*()";
          $userPassword="";
          for($i=0;$i<8;$i++ ){
            $n=rand(0,69);
            $userPassword .= $char[$n];
    
          }
          
          
          Mail::to($request->email)->send(new UserPassMail($userPassword, $emailU));



          User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($userPassword),
          'department_id' => $request->departmentId,
      ]);

         session()->flash('success', ' تم اضافة موظف');


           return redirect()->route('Employee', $request->departmentId);
  }
  public function delete(Request $request, $id){
   $D_id = User::find($id)->department_id;

    User::destroy($id);
      session()->flash('success', 'تم حذف الموظف');

      return redirect()->route('Employee', $D_id);

      }


      public function edit($id){
        $user = User::find($id);
        $departments=Department::all();

      return view('editForm', compact('user','departments'));
    }

    public function update(Request $request, $id){
      $user = User::find($id);

      $request->validate([

        'name' => ['required', 'string', 'max:255'],
        'email' => [
            'required',
            'string',
            'email',
            'max:255',
            Rule::unique('users')->ignore($id),
          ],

       ]);

      
      if($user['email'] != $request->email )
      {
        $user->forceFill([
          'name' => $request->name,
          'email' => $request->email,
          'department_id' => $request->NewDepartmentId,
          'email_verified_at' => null,
      ])->save();      }
      else{
        $user->forceFill([
          'name' => $request->name,
          'email' => $request->email,
          'department_id' => $request->NewDepartmentId,
      ])->save(); 
      }
      session()->flash('success', 'تم تحديث بيانات الموظف');

      return redirect()->route('Employee', $request->departmentId);
    }
    
}
