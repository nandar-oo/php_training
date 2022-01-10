@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header">
    Send Mail
  </div>
  <div class="card-body">
    <form action="{{ route('mail.post') }}" method="post">
      @csrf
      <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Enter email">
        @if ($errors->has('email'))
        <small class="text-danger">*{{ $errors->first('email') }}</small>
        @endif
      </div>
      <button type="submit" class="btn btn-outline-info"><i class="far fa-envelope"></i> Send</button>
    </form>
  </div>
</div>

@endsection