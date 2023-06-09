<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FirstController;
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

// Route::get('/employees', function(){
//     return "Get all employees";
// })->name('employees.index');


// Route::get('/employees/{id}', function($id){
//     return "Get employee with id of $id";
// })->whereNumber('id')->name('employees.show');

Route::get('/employees', [FirstController::class, 'myFirstControllerFunction']);



//Route prefix
// Route::prefix('/employees')
// ->name('employees.')
// ->controller(FirstController::class)
// ->group(function(){
    // Route::get('', 'myFirstControllerFunction' )->name('index');

//     Route::post('', function(){
//         return "Save employee details";
//     })->name('store');

//     Route::get('/create', function(){
//         return "Get employee create form";
//     })->name('create');

//     Route::get('/{id}', 'mySecondControllerFunction')->name('show');

//      Route::get('/edit/{id}', function($id){
//         return "Get edit form for employee with id of $id";
//     })->name('edit');

//     Route::patch('/{id}', function($id){
//         return "Edit employee id of $id";
//     })->name('update');

//      Route::delete('/{id}', function($id){
//         return "Delete employee id of $id";
//     })->name('destroy');
// });

// auth middleware ensures that only authenticated users can visit route
Route::resource('/employees', EmployeeController::class)->middleware('auth');
// Route::get('/employees', [EmployeeController::class, 'index']);
Route::resource('/departments', DepartmentController::class)->middleware('auth');
