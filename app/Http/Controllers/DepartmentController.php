<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;
use App\Models\Export;

class DepartmentController extends Controller
{
    //
    public function show(Request $request){
$departments=Department::all();

        return view('department',compact('departments'));
        
        
        }

        public function create(Request $request){

            return view('departmentForm');
            
            
            }

        public function store(Request $request){

          $request->validate([

           'name' => 'required|unique:departments'

          ]);

        

          Department::create([
            'name' => $request->name,
          ]);
          session()->flash('success', 'تم اضافة القسم');


            return redirect()->route('Department');
            
            
            }
            public function delete(Request $request, $id){

              $user=User::where('department_id', $id)->first();
              $ex=Export::where('sender_department', $id)->first();
              $Im=Export::where('receiver_department', $id)->first();
              if($user || $ex || $Im)
            {  
              session()->flash('Failure', 'فشل حذف القسم');

              return redirect()->route('Department');

            }
            else{
              Department::destroy($id);
              session()->flash('success', 'تم حذف القسم');

            }

                return redirect()->route('Department');

                }
}
