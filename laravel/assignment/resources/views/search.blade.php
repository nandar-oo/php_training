@extends('layout.app')
@section('content')
<a href="{{ route('studentList') }}" class="btn btn-sm btn-primary mb-3"><i class="fas fa-arrow-left"></i> Back</a>
@if (Session::has('nullMessage'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ Session::get('nullMessage') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card">
    <div class="card-header">
        <h5>Student Search Form</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('search.post') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter student name">
            </div>
            <div class="mb-3">
                <label class="form-label">Start Date</label>
                <input type="date" name="start" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">End Date</label>
                <input type="date" name="end" class="form-control">
            </div>
            <button type="submit" class="btn btn-outline-secondary"><i class="fas fa-search"></i> Search</button>
        </form>
    </div>
</div>

@endsection
