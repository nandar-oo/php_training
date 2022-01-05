@extends('layout.app')
@section('content')
<form action="{{ route('student.import.post') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="formFile" class="form-label">Choose csv file to import</label>
        <input class="form-control" type="file" id="formFile" name="file">
        <button type="submit" class="btn btn-outline-info mt-3"><i class="fas fa-file-import"></i> Import</button>
    </div>
</form>
@endsection
