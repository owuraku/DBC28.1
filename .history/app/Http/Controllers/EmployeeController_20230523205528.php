<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

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
       $data['image']= '/temp/image';
       $hasImage = $request->hasFile('image');
       $image = $request->file('image');
       if($hasImage){
        dd($image);
       }
       $validated = $request->validate([
       'last_name' => 'required|min:10',
       'first_name' => 'required|min:10',
       ]);

       Employee::create($validated);
        // //

        // return $validated;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
