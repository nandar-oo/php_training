@extends('Resource.layouts.app')
@section('content')
<div class="card col-6 mx-auto">
  <div class="card-header">
    <h5>Student Details</h5>
  </div>
  <div class="card-body">
    <div class="mb-1 row">
      <label class="col-3">ID</label>
      <label class="col-9">{{ $student->id }}</label>
    </div>
    <div class="mb-1 row">
      <label class="col-3">Student Name</label>
      <label class="col-9">{{ $student->name }}</label>
    </div>
    <div class="mb-1 row">
      <label class="col-3">Email</label>
      <label class="col-9">{{ $student->email }}</label>
    </div>
    <div class="mb-1 row">
      <label class="col-3">Major ID</label>
      <label class="col-9">{{ $student->major_id}}</label>
    </div>
    <div class="mb-1 row">
      <label class="col-3">Major Name</label>
      <label class="col-9">{{ $student->major->name }}</label>
    </div>
    <div class="mb-3 row">
      <label class="col-3">City</label>
      <label class="col-9">{{ $student->city }}</label>
    </div>
    <a href="{{ url('/students') }}" class="btn btn-sm btn-primary mb-3"><i class="fas fa-arrow-left"></i> Back</a>
  </div>
</div>

@endsection
