<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
         return view('employees.list', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.form');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data = $request->input();
       $employee = new Employee;
       $employee->firstname = $data['firstname'];
       $employee->lastname = $data['lastname'];
       $employee->middlename = $data['middlename'];
       $employee->dob = $data['dob'];
       $employee->gender = $data['gender'];
       $employee->position = $data['position'];
       $employee->email = $data['email'];
       $employee->marital_status = $data['marital_status'];
       $employee->image = '/temp/image.png';
       $employee->save();




    //    $data['image']= '/temp/image';
    //    $hasImage = $request->hasFile('image');
    //    $image = $request->file('image');
    //    if($hasImage){
    //     dd($image);
    //    }
    //    $validated = $request->validate([
    //    'last_name' => 'required|min:10',
    //    'first_name' => 'required|min:10',
    //    ]);

        // create method
    //    Employee::create($data);
        // //

        // return $validated;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $employee = Employee::find(7);
        dd($employee);
        return view('employees.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}