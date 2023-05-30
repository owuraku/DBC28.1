@extends('layout.master')

@section('title', 'List of Departments')

@section('content')
    <h1>THE LIST OF DEPARTMENT</h1>
    <a href="{{ route('departments.create') }}" class="btn btn-info btn-lg">Add Department</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Department Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
                <tr>
                    <td>{{ $department->name }}</td>
                    <td>
                        <a type="button" href="{{ route('departments.show', ['department' => $department->id]) }}"
                            class="btn btn-outline-primary btn-sm">View</a>
                        <a type="button" href="{{ route('departments.edit', ['department' => $department->id]) }}"
                            class="btn btn-outline-success btn-sm">Edit</a>
                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="deleteDepartment(this)">
                            Delete
                            <form action="{{ route('departments.destroy', [$department->id]) }}" method="POST">
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
