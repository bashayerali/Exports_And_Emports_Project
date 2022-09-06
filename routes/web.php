<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\EmployeeDashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ReportController;

use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home',function () {
    if (Auth::user()->role=='admin')
    return redirect()->route('AdminDashboard');
        else if (Auth::user()->role=='user')
    return redirect()->route('EmployeeDashboard');
})->middleware('auth');


Route::middleware([
    'auth',
    'isAdmin',
    'verified'
])->group(function () {
Route::get('AdminDashboard',function () {
    return redirect()->route('Profile');
    
})->name('AdminDashboard');
Route::get('Department',[DepartmentController::class,'show'])->name('Department');
Route::get('create',[DepartmentController::class,'create'])->name('createDepartment');
Route::post('store',[DepartmentController::class,'store'])->name('storeDepartment');
Route::get('deleteD/{id}',[DepartmentController::class,'delete'])->name('deleteDepartment');

Route::get('Employee\{id}',[EmployeeController::class,'show'])->name('Employee');
Route::get('addEmployee\{id}',[EmployeeController::class,'add'])->name('addEmployee');
Route::post('storeEmployee',[EmployeeController::class,'store'])->name('storeEmployee');
Route::get('deleteE/{id}',[EmployeeController::class,'delete'])->name('deleteEmployee');
Route::get('edit\{id}',[EmployeeController::class,'edit'])->name('editEmployee');
Route::post('update\{id}',[EmployeeController::class,'update'])->name('updateEmployee');

Route::get('AllReport',[ReportController::class,'AllReport'])->name('AllReport');


});



Route::middleware([
    'auth',
    'verified'

])->group(function () {
Route::get('EmployeeDashboard',function () {
    return redirect()->route('Profile');
    
})->name('EmployeeDashboard');
Route::view('Profile', 'profile')->name('Profile');
Route::get('Export',[ExportController::class,'show'])->name('Export');
Route::post('ExportStore',[ExportController::class,'store'])->name('ExportStore');
Route::get('Import',[ImportController::class,'show'])->name('Import');
Route::get('ImportUpdate\{id}',[ImportController::class,'update'])->name('ImportUpdate');
Route::post('ImportSave\{id}',[ImportController::class,'Save'])->name('ImportSave');
Route::get('showImport',[ReportController::class,'showImport'])->name('ImportReport');
Route::get('showExport',[ReportController::class,'showExport'])->name('ExportReport');
Route::post('printReport',[ReportController::class,'printReport'])->name('printReport');

Route::post('printReport1',[ReportController::class,'printReport1'])->name('printReport1');
Route::get('importDetails\{id}',[ReportController::class,'importDetails'])->name('importDetails');
Route::get('exportDetails\{id}',[ReportController::class,'exportDetails'])->name('exportDetails');

});