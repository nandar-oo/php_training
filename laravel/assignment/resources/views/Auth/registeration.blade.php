@extends('layouts.app')
@section('content')
<div class="card col-6 mx-auto">
  <div class="card-header">Register</div>
  <div class="card-body">

    <form action="{{ route('register.post') }}" method="POST">
      @csrf
      <div class="form-group row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
        <div class="col-md-6">
          <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" autofocus>
          @if ($errors->has('name'))
          <small class="text-danger">*{{ $errors->first('name') }}</small>
          @endif
        </div>
      </div>

      <div class="form-group row mb-3">
        <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
        <div class="col-md-6">
          <input type="text" id="email_address" class="form-control" name="email" value="{{ old('email') }}">
          @if ($errors->has('email'))
          <small class="text-danger">*{{ $errors->first('email') }}</small>
          @endif
        </div>
      </div>

      <div class="form-group row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
        <div class="col-md-6">
          <input type="password" id="password" class="form-control" name="password" >
          @if ($errors->has('password'))
          <small class="text-danger">*{{ $errors->first('password') }}</small>
          @endif
        </div>
      </div>

      <div class="form-group row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
        <div class="col-md-6">
          <input type="password" id="password" class="form-control" name="confirmation" >
          @if ($errors->has('confirmation'))
          <small class="text-danger">*{{ $errors->first('confirmation') }}</small>
          @endif
        </div>
      </div>

      <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
          Register
        </button>
      </div>
    </form>

  </div>
</div>
@endsection
