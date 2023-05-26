@extends('layout.master')

@section('title', 'Add New Employee')

@php
    
    $marital_statuses = ['married', 'single', 'divorced', 'seperated'];
    $positions = ['CEO', 'CTO', 'manager', 'other'];
@endphp

@section('content')
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        {{-- the csrf token is needed to avoid the 419 error when making a POST,PATCH/PUT,DELETE --}}
        {{-- @csrf generates <input name="_token" value="{{csrf()}}" />  --}}
        @csrf
        @isset($edit)
            {{-- the @method() directive is needed to spoof DELETE/PATCH/PUT since HTML forms cannot send such requests  --}}
            @method('PATCH')
            {{-- ^^ this generates <input name="_method" value="PATCH" /> --}}
        @endisset
        <div class="row mb-3">
            {{-- firstname --}}
            <div class="col">
                <label for="firstname" class="form-label">Firstname</label>
                <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                    placeholder="Type your firstname" value="{{ request()->old('firstname', $employee->firstname) }}">

                {{-- request()->old('firstname', $employee->firstname) ==> this code means when there is old data
                       ( which is only present after a request fails validation and is returned to the previous request),
                       that information will be used, if not the employee data will be used
                    --}}
                @error('firstname')
                    {{-- there is a $message variable made available inside @error @enderror directive which is the  error message --}}
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- middlename --}}
            <div class="col">
                <label for="middlename" class="form-label">Middlename</label>
                <input type="text" class="form-control" name="middlename" placeholder="Type your middlename"
                    value="{{ request()->old('middlename', $employee->middlename) }}">
                @error('middlename')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- lastname --}}
            <div class="col">
                <label for="lastname" class="form-label">lastname</label>
                <input type="text" class="form-control" name="lastname" placeholder="Type your lastname"
                    value="{{ request()->old('lastname', $employee->lastname) }}">
                @error('lastname')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        {{-- email --}}
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid  @enderror " id="email" name="email"
                placeholder="Type employee email" value="{{ request()->old('email', $employee->email) }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="row mt-3">
            {{-- dob --}}
            <div class="col">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="dob" placeholder="Date of Birth"
                    value="{{ request()->old('dob', $employee->dob) }}">
                @error('dob')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- position --}}
            <div class="col">
                <label for="position" class="form-label">Position</label>
                <select class="form-select" name="position" aria-label="Default select example">
                    <option selected>Select Employee Position</option>
                    @foreach ($positions as $position)
                        <option @selected(request()->old('position', $employee->position) == $position) value="{{ $position }}">{{ $position }}</option>
                    @endforeach

                </select>
                @error('positon')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- marital status --}}
            <div class="col">
                <label for="marital_status" class="form-label">Marital Status</label>
                <select class="form-select" name="marital_status" aria-label="Default select example">
                    <option selected>Select Marital Status</option>
                    @foreach ($marital_statuses as $status)
                        <option class="text-uppercase" @selected(request()->old('marital_status', $employee->marital_status) == $status) value="{{ $status }}">
                            {{ $status }}</option>
                    @endforeach
                </select>
                @error('marital_status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        {{-- gender --}}
        <div class="mt-3">
            <label class="form-label">Select Gender</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                    @checked(request()->old('marital_status', $employee->gender) == 'male')>
                <label class="form-check-label" for="male">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                    @checked(request()->old('marital_status', $employee->gender) == 'female')>
                <label class="form-check-label" for="female">
                    Female
                </label>
            </div>
            @error('gender')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- image --}}



        <div class="mt-3 row">
            <div class="col">
                <label for="image" class="form-label">Choose Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            @isset($edit)
                <div class="col-4">
                    <label for="">Current Image</label><br>
                    <img src="{{ asset($employee->image) }}" width="200" height="200" alt="Current Avatar">
                </div>
            @endisset
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>
@endsection
