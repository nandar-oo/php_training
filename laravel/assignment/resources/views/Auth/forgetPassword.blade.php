@extends('layouts.app')
@section('content')
<div class="card col-6 mx-auto">
  <div class="card-header">Forgot Password</div>
  <div class="card-body">
    @if (Session::has('message'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      {{ Session::get('message') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action="{{ route('forget.post') }}" method="POST">
      @csrf
      <div class="form-group row mb-3">
        <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
        <div class="col-md-6">
          <input type="text" id="email_address" class="form-control" name="email">
          @if ($errors->has('email'))
          <small class="text-danger">*{{ $errors->first('email') }}</small>
          @endif
        </div>
      </div>
      <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
          Send Reset Password Link
        </button>
      </div>
    </form>

  </div>
</div>
@endsection