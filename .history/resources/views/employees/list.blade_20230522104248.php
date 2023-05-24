@extends('layout.master')

@section('title', 'List of Emplyees')

@section('content')
    <h1>THE LIST OF EMPLOYEES</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-info"></a>
@endsection
