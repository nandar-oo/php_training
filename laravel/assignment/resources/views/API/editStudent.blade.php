@extends('API.layouts.app')
@section('content')
<a href="{{ route('api.studentList') }}" class="btn btn-sm btn-secondary mb-3"><i class="fas fa-arrow-left"></i> Back</a>
<div class="card">
  <div class="card-header">
    <h5>Student Information</h5>
  </div>
  <div class="card-body">
    <div class="message">

    </div>
    <form action="{{ route('edit.student.post',$student->id) }}" method="POST">
      @csrf
      <input type="hidden" id="student_id" class="form-control" value="{{ $student->id }}">
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="name" id="name" class="form-control" value="{{ $student->name }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" id="email" class="form-control" value="{{ $student->email }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Choose major</label>
        <select class="form-select" id="major">
          <option value="">Choose major</option>
          @foreach ($majors as $item)
          @if($student->major_id == $item->id)
          <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
          @else
          <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endif
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">City</label>
        <input type="city" id="city" class="form-control" value="{{ $student->city }}">
      </div>
    </form>
    <button class="btn btn-primary float-end" onclick="updateStudent()">Update</button>
  </div>
</div>

@endsection
