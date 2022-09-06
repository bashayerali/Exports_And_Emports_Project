<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Export;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;
use App\Models\Import;

class ImportController extends Controller
{
    //

    public function show(){


 $Import=Export::where([['receiver_department', Auth::user()->department_id],['status', 'معلقه']])->get();
$departments=Department::all();
   
       return view('import',compact('Import','departments'));
        
        
        }

   
        public function update($id){

           $e= Export::find($id);
            
           return view('importForm',compact('e'));
            
        }


        public function Save(Request $request, $id){
            $ex=Export::find($id);
            $num=$ex->num;

            $im=Import::where('Export_num', $num)->first();

            $request->validate([
    
             'notes'=> 'required',
             'date'=> 'required|date'
    
            ]);
    
          
           
            $ex->forceFill([
                'status' => 'تم التسليم',
                
            ])->save();

            $ex->im->forceFill([
                'received_date' => $request->date,
        'im_status' => 'تم الإستلام',
        'receiver_name' => Auth::user()->name,
        'comment' => $request->notes,
                
            ])->save();
    
            session()->flash('success', 'تم تحديث المعاملة');
    
    
              return redirect()->route('Import');
              
              
              }


}
