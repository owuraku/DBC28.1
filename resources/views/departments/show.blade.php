@extends('layout.master')
@section('content')
<h1>Department Details</h1>
<ul class="list-group">
    <li class="list-group-item">Department Name : {{$department->name}}</li>
</ul>

<hr>

<h3>Employees</h3>
<ul class="list-group">
    @forelse ($department->employees as $employee)
        <li class="list-group-item font-bold">{{$employee->firstname}} {{$employee->lastname}} </li>
    @empty
        <li class="list-group-item">No registered employees</li>
    @endforelse
</ul>
@endsection
