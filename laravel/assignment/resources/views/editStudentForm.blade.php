@extends('layout.app')
@section('content')
<a href="{{ route('studentList') }}" class="btn btn-sm btn-primary mb-3"><i class="fas fa-arrow-left"></i> Back</a>
<div class="card">
    <div class="card-header bg-secondary text-white">
        <h5>Student Information</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('edit.student.post',$student->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="name" name="name" class="form-control" value="{{ $student->name }}" placeholder="Enter student name">
                @if ($errors->has('name'))
                <small class="text-danger">*{{ $errors->first('name') }}</small>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" value="{{ $student->email }}" placeholder="Enter student email">
                @if ($errors->has('email'))
                <small class="text-danger">*{{ $errors->first('email') }}</small>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Choose major</label>
                <select class="form-select" name="major">
                    <option value="">Choose major</option>
                    @foreach ($majors as $item)
                    @if($student->major_id == $item->id)
                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                    @else
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif

                    @endforeach
                </select>
                @if ($errors->has('major'))
                <small class="text-danger">*{{ $errors->first('major') }}</small>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">City</label>
                <input type="city" name="city" class="form-control" value="{{ $student->city }}" placeholder="Enter your home town">
                @if ($errors->has('city'))
                <small class="text-danger">*{{ $errors->first('city') }}</small>
                @endif
            </div>
            <input type="submit" value="Save" class="btn btn-primary float-end">
        </form>
    </div>
</div>

@endsection
