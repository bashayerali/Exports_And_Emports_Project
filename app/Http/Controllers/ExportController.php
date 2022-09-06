<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Export;
use App\Models\Import;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class ExportController extends Controller
{
    //
    public function show(){
        $departments=Department::all();

//$e=outgoing::find(1);

//return $e->d;
    return view('ExportForm',compact('departments'));
    
    
    }
    public function store(Request $request){
        
        $request->validate([

         'title' => 'required',
         'notes'=> 'required',
         'num' => 'required|unique:Exports|numeric|min:1',
         'date'=> 'required|date'

        ]);

      
        $user=User::where('department_id', $request->receiver_department)->first();
if($user){
        Export::create([
          'title' => $request->title,
          'notes' => $request->notes,
          'num' => $request->num,
          'date' => $request->date,
          'sender_name' => Auth::user()->name,
          'sender_department' => Auth::user()->department_id,
          'receiver_department' => $request->receiver_department,
        ]);
        Import::create([
          'Export_num' => $request->num,
          
        ]);

        session()->flash('success', 'تم اضافة المعاملة');
        return redirect()->back();

      }
else{
  session()->flash('Failure', 'فشل إظافة صادرة لعدم توفر موظفين في القسم المُرسَل إليه');

}
          return redirect()->back();
          
          
          }
}
