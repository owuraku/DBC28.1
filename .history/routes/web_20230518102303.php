<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employees', function(){
    $complexRoute = route('employees.complex');
    return "Get all employees  <a href='{$complexRoute}'> Click Here to go to employee</a> ";
})->name('employees.index');


Route::get('/gajskhgdjahfevkjhadvgjahsvdhgefach', function(){
    return "this is a complex url";
})->name('employees.complex');

Route::get('/employees/{id}', function($id){
    return "Get employee with id of $id";
})->whereNumber('id')->name('employees.show');


