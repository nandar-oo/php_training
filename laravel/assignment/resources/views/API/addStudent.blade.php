@extends('API.layouts.app')
@section('content')
<a href="{{ route('api.studentList') }}" class="btn btn-sm btn-secondary mb-3"><i class="fas fa-arrow-left"></i> Back</a>
<div class="card">
  <div class="card-header">
    <h5>New Student Information</h5>
  </div>
  <div class="card-body">
    <div class="message">
    </div>
    <form action="#" method="post">
      @csrf
      <div class="mb-3 name">
        <label class="form-label">Name</label>
        <input type="name" name="name" class="form-control" placeholder="Enter student name" id="name">

      </div>

      <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Enter student email">
        @if ($errors->has('email'))
        <small class="text-danger">*{{ $errors->first('email') }}</small>
        @endif
      </div>
      <div class="mb-3">
        <label class="form-label">Choose major</label>
        <select class="form-select" name="major" id="major">
          <option value="">Choose major</option>
          @foreach ($majors as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
        @if ($errors->has('major'))
        <small class="text-danger">*{{ $errors->first('major') }}</small>
        @endif
      </div>
      <div class="mb-3">
        <label class="form-label">City</label>
        <input type="city" name="city" class="form-control" id="city" placeholder="Enter your home town">
        @if ($errors->has('city'))
        <small class="text-danger">*{{ $errors->first('city') }}</small>
        @endif
      </div>
    </form>
    <button class="btn btn-success float-end" onclick="addStudent()">Add Student</button>
  </div>
</div>

@endsection
