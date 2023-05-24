@extends('layout.master')

@section('title', 'List of Emplyees')

@section('content')
    <h1>THE LIST OF EMPLOYEES</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-info btn-lg">Add Employee</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Fullname</th>
                <th scope="col">Email</th>
                <th scope="col">Position</th>
                <th scope="col">Gender</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Kofi Mensah</td>
                <td>kofi@mensah.com</td>
                <td>CEO</td>
                <td>M</td>
                <td>
                    <a type="button" class="btn btn-outline-primary btn-sm">View</a>
                    <a type="button" class="btn btn-outline-success btn-sm">Edit</a>
                    <button type="button" class="btn btn-outline-danger btn-sm">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
