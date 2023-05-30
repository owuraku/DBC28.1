@extends('layout.master')

@section('content')

<form action="{{ route('departments.store') }}" method="POST" enctype="multipart/form-data">
@csrf
@isset($edit)
    @method('PATCH')
@endisset

    <div class="col">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Type your department"
            >
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="mt-3">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
    </div>
</form>


@endsection
