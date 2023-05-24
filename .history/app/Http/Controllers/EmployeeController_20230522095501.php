<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('myFirstView')
        // ->with('fullname', 'Kofi Mensah')
        // ->with('age', 15);

         return view('layout.master', [
            "fullname" => "Kofi Mensah",
            "age" => 15,
            "isRegistered" => false
         ]);
        // return view('test');
        // return [
        //     [
        //         "id" => 1, "name"=> "Kofi Mensah"
        //     ],
        //      [
        //         "id" => 2, "name"=> "Adwoa Mansah"
        //     ]
        // ];
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'last_name' => 'required|min:10',
        'first_name' => 'required|min:10',
        ]);
        //

        return $validated;
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
