@extends('layout.master')

@section('title', 'Add New Employee')

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
    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            {{-- firstname --}}
            <div class="col">
                <label for="firstname" class="form-label">Firstname</label>
                <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                    placeholder="Type your firstname" value="{{ $employee->firstname }}">
                @error('firstname')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- middlename --}}
            <div class="col">
                <label for="middlename" class="form-label">Middlename</label>
                <input type="text" class="form-control" name="middlename" placeholder="Type your middlename">
            </div>
            {{-- lastname --}}
            <div class="col">
                <label for="lastname" class="form-label">lastname</label>
                <input type="text" class="form-control" name="lastname" placeholder="Type your lastname">
            </div>
        </div>
        {{-- email --}}
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid  @enderror " id="email" name="email"
                placeholder="Type employee email">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="row mt-3">
            {{-- dob --}}
            <div class="col">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="dob" placeholder="Date of Birth">
            </div>
            {{-- position --}}
            <div class="col">
                <label for="dob" class="form-label">Position</label>
                <select class="form-select" name="position" aria-label="Default select example">
                    <option selected>Select Employee Position</option>
                    <option value="CEO">CEO</option>
                    <option value="CTO">CTO</option>
                    <option value="Manager">Manager</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            {{-- marital status --}}
            <div class="col">
                <label for="dob" class="form-label">Marital Status</label>
                <select class="form-select" name="marital_status" aria-label="Default select example">
                    <option selected>Select Employee Status</option>
                    <option value="married">Married</option>
                    <option value="single">Single</option>
                    <option value="divorced">Divorced</option>
                    <option value="seperated">Seperated</option>
                </select>
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
                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                <label class="form-check-label" for="female">
                    Female
                </label>
            </div>
        </div>
        {{-- image --}}
        <div class="mt-3">
            <label for="image" class="form-label">Choose Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>
@endsection
