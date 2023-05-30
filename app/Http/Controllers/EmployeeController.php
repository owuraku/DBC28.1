<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
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
        // creating a date string 18 years ago (used for validation)
        $year18 = Carbon::now()->sub('years', 18)->toDateString();

        $this->rules =  [
            "firstname" => 'required|min:2|max:100|alpha', // this will validate the firstname value => "make sure it's required, min length of 2 ..." etc
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
        ],
            "department_id" => 'required'

        ];
        # code...
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(1);
         return view('employees.list', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // set action route for storing employee
        $action = route('employees.store');
        return view('employees.form', [
            'employee' => new Employee,
            'action' => $action
        ])->with('departments', Department::all());
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate data and store the correct values
        $validated = $request->validate($this->rules);
        //get the file from the request using the key from the frontend
        $image = $request->file('image');
        // make sure to link the public folder to the path
        // using php artisan storage:link
        // this configuration can be set in config/filesystem.php
        //save image file
        $path = $image->store('employee-images');
        // add the saved image path to the validated data
       $validated['image'] = $path;

       //create a new record using the validated data
        Employee::create($validated);

         //redirect to employee index page with notification in the session
        return redirect(route('employees.index'))->with('notification', 'Employee successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // get the employee from database
        $employee = Employee::findOrFail($id);
        return view('employees.show', [
            'employee' => $employee // return view with employee data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $employee = Employee::findOrFail($id);

        // create the route as a variable and pass to form view
        $action = route('employees.update',[$id]);

        return view('employees.form', [
            'employee' => $employee,
            'action' => $action,
            'edit' => true // variable to let us know if form is an edit
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
        // this will ignore the data of the user with
        // specified id when checking for uniqueness
        $this->rules['email'] = ["required","email",
        Rule::unique('employees')->ignore($id),];

        // when editing, user won't always change image
        // so we need to change the rule

        $this->rules['image'] = ['nullable',  File::image()
            ->min(100)
            ->max(12 * 1024)
            ];

        // get the validated values after validation
        // any property not validated will be omitted
        $data = $request->validate($this->rules);

        // find the employee to edit
        $employee = Employee::findOrFail($id);

        $hasImage = $request->hasFile('image');
        // if the request has an image save it in the employee-images directory
        if($hasImage){
            $image = $request->file('image');
            $path = $image->store('employee-images');
            $employee->image = $path;
        }

        // set the employee data
        $employee->firstname = $data['firstname'];
       $employee->lastname = $data['lastname'];
       $employee->middlename = $data['middlename'];
       $employee->dob = $data['dob'];
       $employee->gender = $data['gender'];
       $employee->position = $data['position'];
       $employee->email = $data['email'];
       $employee->marital_status = $data['marital_status'];

       // call the save function on the model instance
       $employee->save();
       //redirect to employee index page with notification in the session
         return redirect(route('employees.index'))->with('notification', 'Employee edited added');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // find the employee to edit
        $employee = Employee::findOrFail($id);

        $employee->delete();

         return redirect(route('employees.index'))->with('notification', 'Employee deleted successfully');


        //
    }
}
