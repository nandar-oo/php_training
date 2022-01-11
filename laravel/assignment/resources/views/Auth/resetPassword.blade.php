@extends('layouts.app')
@section('content')
<div class="card col-6 mx-auto">
  <div class="card-header">Reset Password</div>
  <div class="card-body">

    <form action="{{ route('reset.post') }}" method="POST">
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">

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
          <input type="password" id="password" class="form-control" name="password">
          @if ($errors->has('password'))
          <small class="text-danger">*{{ $errors->first('password') }}</small>
          @endif
        </div>
      </div>

      <div class="form-group row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
        <div class="col-md-6">
          <input type="password" id="password" class="form-control" name="confirmation">
          @if ($errors->has('confirmation'))
          <small class="text-danger">*{{ $errors->first('confirmation') }}</small>
          @endif
        </div>
      </div>

      <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
          Reset Password
        </button>
      </div>
    </form>

  </div>
</div>
@endsection