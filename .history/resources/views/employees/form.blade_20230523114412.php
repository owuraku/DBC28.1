@extends('layout.master')

@section('title', 'Add New Employee')

@section('content')
    {{-- firstname --}}
    <div class="row mb-3">
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
    {{-- dob --}}
    {{-- gender --}}
    {{-- position --}}
    {{-- marital status --}}
    {{-- image --}}
@endsection
