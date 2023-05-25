<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class EmployeeController extends Controller
{
    // private $allowedGender = ['female', 'male'];
    private $rules;

    public function __construct()
    {
        $year18 = Carbon::now()->sub('years', 18)->toDateString();

        $this->rules =  [
            "firstname" => 'required|min:2|max:100|alpha',
            "lastname" => 'required|min:2|max:100|alpha',
            "middlename" => 'nullable|min:2|max:100|alpha',
            "email" => 'required|email|unique:employees,email',
            'dob' => ['date',"before:$year18"],
            'gender' => ['required','in:female,male'],
            'position' => 'required',
            'marital_status' => 'required',
            "image" => ['required',  File::image()
            ->min(100)
            ->max(12 * 1024)
            // ->dimensions(Rule::dimensions()->maxWidth(1000)->maxHeight(500))
            ]
        ];
        # code...
    }


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
        $action = route('employees.store');
        return view('employees.form', [
            'employee' => new Employee,
            'action' => $action
        ]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //    $data = $request->input();
        $validated = $request->validate($this->rules);
        //  $hasImage = $request->hasFile('image');
       $image = $request->file('image');
       $path = $image->store('public');
       $validated['image'] = $path;
        Employee::create($validated);
        return redirect(route('employees.index'))->with('notification', 'Employee successfully added');
    //    $data['image']= '/temp/image';

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
        $employee = Employee::findOrFail($id);
        return view('employees.show', [
            'employee' => $employee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $method = 'PATCH';
        $employee = Employee::findOrFail($id);
        $action = route('employees.update',[$id]);

        return view('employees.form', [
            'employee' => $employee,
            'action' => $action,
            'method' => $method
        ]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //  set rules to the rules array in the class
        // $rules = $this->rules;
        // update email rule to cater for edit scenario
        $this->rules['email'] = ["required","email",
        Rule::unique('employees')->ignore($id),];
        $data = $request->validate($this->rules);
        $employee = Employee::findOrFail($id);
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
         return redirect(route('employees.index'))->with('notification', 'Employee edited added');
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
