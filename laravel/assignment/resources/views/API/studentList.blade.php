@extends('API.layouts.app')
@section('content')
<div class="mb-3">
  <a href="{{ route('api.add.student') }}" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> New Student</a>
</div>
<div class="message"></div>
<table class="table table-striped ">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Major</th>
      <th>City</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
@endsection
