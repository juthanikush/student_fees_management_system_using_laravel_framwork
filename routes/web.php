<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountantController;
use App\Http\Controllers\StudentController;



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
    return view('login');
});
//Route::view('login','login');
Route::view('layout','layout');
Route::get('admin',[AdminController::class,'index'])->name('admin');

//Route::post('admin/login',[AdminController::class,'auth']);
Route::post('admin/login',[AdminController::class,'auth'])->name('admin/login');
Route::post('student/login',[StudentController::class,'login'])->name('student/login');



Route::group(['middleware'=>'admin_check'],function(){
    Route::view('admin/deshboad','dashboard');
//Route::view('','addaccount');

Route::post('accountent/add',[AccountantController::class,'add'])->name('accountent/add');
Route::get('account/add_account',[AccountantController::class,'add_account'])->name('accountant/add_account');
Route::get('account/add_account/{id}',[AccountantController::class,'add_account'])->name('accountant/add_account');
Route::get('account/index',[AccountantController::class,'index'])->name('accountant/index');
Route::get('account/delete/{id}',[AccountantController::class,'delete']);

//Route::post('add/accounte',[AdminController::class,'add_account'])->name('admin/add_account');
Route::get('admin/logout', function () {
    session()->forget('ADMIN_LOGIN');
    session()->forget('ADMIN_USERNAME');
    session()->flash('error','logout sucessfully');
    return redirect('admin');
});
Route::view('add/accounte','add_accountent');
});


Route::group(['middleware'=>'account_check'],function(){
Route::view('student/studashboard','studashboard');
Route::view('student/search','search');
Route::post('student/add',[StudentController::class,'add'])->name('student/add');
Route::post('student/search',[StudentController::class,'search'])->name('student/search');
Route::get('account/logout', function () {
    session()->forget('ACCOUNT_LOGIN');
    session()->forget('ADMIN_ACCOUNT');
    session()->flash('errorr','logout sucessfully');
    return redirect('admin');
});
Route::get('student/add_account',[StudentController::class,'add_account'])->name('student/add_account');
Route::get('student/index',[StudentController::class,'index'])->name('student/index');
Route::get('student/duefees',[StudentController::class,'duefees'])->name('student/duefees');
Route::get('student/delete/{id}',[StudentController::class,'delete']);
Route::get('student/add_account/{id}',[StudentController::class,'add_account'])->name('accountant/add_account');

});