@extends('layout.master')

@section('title', 'Add New Employee')

@php
    $marital_statuses = ['married', 'single', 'divorced', 'seperated'];
    $positions = ['CEO', 'CTO', 'manager', 'other'];
@endphp

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf
        @isset($method)
            @method($method)
        @endisset
        <div class="row mb-3">
            {{-- firstname --}}
            <div class="col">
                <label for="firstname" class="form-label">Firstname</label>
                <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                    placeholder="Type your firstname" value="{{ request()->old('firstname', $employee->firstname) }}">
                @error('firstname')
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
                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                <label class="form-check-label" for="male">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female" checked>
                <label class="form-check-label" for="female">
                    Female
                </label>
            </div>
            @error('gender')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- image --}}
        <div class="mt-3">
            <label for="image" class="form-label">Choose Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>
@endsection
