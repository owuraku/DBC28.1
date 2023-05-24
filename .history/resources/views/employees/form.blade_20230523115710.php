@extends('layout.master')

@section('title', 'Add New Employee')

@section('content')
    <div class="row mb-3">
        {{-- firstname --}}
        <div class="col">
            <label for="firstname" class="form-label">Firstname</label>
            <input type="text" class="form-control" name="firstname" placeholder="Type your firstname">
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
        <input type="email" class="form-control" id="email" name="email" placeholder="Type employee email">
    </div>
    <div class="row mt-3">
        {{-- dob --}}
        <div class="col">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" name="dob" placeholder="Date of Birth">
        </div>
        {{-- position --}}
        <div class="col">
            <label for="dob" class="form-label">Date of Birth</label>
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
            <select class="form-select" name="position" aria-label="Default select example">
                <option selected>Select Employee Position</option>
                <option value="married">Married</option>
                <option value="single">Single</option>
                <option value="divorced">Divorced</option>
                <option value="seperated">Seperated</option>
            </select>
        </div>
    </div>
    {{-- gender --}}
    <div class="mt-3">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Default radio
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                Default checked radio
            </label>
        </div>
    </div>
    {{-- image --}}
@endsection
