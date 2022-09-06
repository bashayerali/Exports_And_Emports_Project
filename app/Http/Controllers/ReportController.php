<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Export;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;
use App\Models\Import;
use PDF; 

class ReportController extends Controller
{
    //



    public function AllReport(Request $request){
        $departments=Department::all();
        $type='AllReport';

        if(isset($_GET['searchStatus']))
        {
            $Import=Export::where('status', $request->status)->get();
            return view('import-report',compact('Import','departments','type'));
        }
        else if(isset($_GET['searchDate'])){
            $Import=Export::where([['date','>=',$request->dateFrom],['date','<=',$request->dateTo]])->get();
            return view('import-report',compact('Import','departments','type'));}
        else{
         $Import=Export::all();
           
               return view('import-report',compact('Import','departments','type'));
                
        }



    }

    public function showImport(Request $request){
        $departments=Department::all();
        $type='ImportReport';

if(isset($_GET['searchStatus']))
{   
    $Import=Export::where([['receiver_department', Auth::user()->department_id],['status',$request->status]])->get();
    return view('import-report',compact('Import','departments','type'));
}
else if(isset($_GET['searchDate'])){
    $Import=Export::where([['receiver_department', Auth::user()->department_id],['date','>=',$request->dateFrom],['date','<=',$request->dateTo]])->get();
    return view('import-report',compact('Import','departments','type'));}
else{
 $Import=Export::where('receiver_department', Auth::user()->department_id)->get();
   
       return view('import-report',compact('Import','departments','type'));
        
}
        }

        public function printReport(Request $request){


 for( $i=0; $i<Count($request->result); $i++)
{$data[]=Export::find($request->result[$i]);}
$pdf= PDF::loadView('pdf.imPDF', ['data' => $data]);
return $pdf->stream('imPDF.pdf');
 }

 public function printReport1(Request $request){


    for( $i=0; $i<Count($request->result); $i++)
   {$data[]=Export::find($request->result[$i]);}
   $pdf= PDF::loadView('pdf.exPDF', ['data' => $data]);
   return $pdf->stream('exPDF.pdf');
    }
   
        
        public function showExport(Request $request){
            $departments=Department::all();

            if(isset($_GET['searchStatus']))
            {
                $Export=Export::where([['sender_department', Auth::user()->department_id],['status',$request->status]])->get();
                return view('export-report',compact('Export','departments'));
            }
            else if(isset($_GET['searchDate'])){
                $Export=Export::where([['sender_department', Auth::user()->department_id],['date','>=',$request->dateFrom],['date','<=',$request->dateTo]])->get();
                  return view('export-report',compact('Export','departments'));}
            else{
             $Export=Export::where('sender_department', Auth::user()->department_id)->get();
               
             return view('export-report',compact('Export','departments'));
                    
            }

}

public function importDetails($id){
    $departments=Department::all();

   $im= Export::find($id);
   return view('importDetails',compact('im','departments'));
}


public function exportDetails($id){
    $departments=Department::all();

   $ex= Export::find($id);
   return view('exportDetails',compact('ex','departments'));
}

}
