@extends('layout.master')

@section('title', 'List of Employees')

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
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->fullname() }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>
                        {{-- /employees/{employee} --}}
                        <a type="button" href="{{ route('employees.show', ['employee' => $employee->id]) }}"
                            class="btn btn-outline-primary btn-sm">View</a>
                        <a type="button" href="{{ route('employees.edit', ['employee' => $employee->id]) }}"
                            class="btn btn-outline-success btn-sm">Edit</a>
                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="deleteEmployee(this)">
                            Delete
                            <form action="{{ route('employees.destroy', [$employee->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </button>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function deleteEmployee(buttonElement) {
            const confirmed = confirm('Are you sure you want to delete this?');
            if (confirmed) {
                const form = buttonElement.querySelector('form');
                form.submit();
            }
        }
    </script>
@endsection
