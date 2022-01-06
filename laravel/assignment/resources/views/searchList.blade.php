@extends('layout.app')
@section('content')
<a href="{{ route('search.get') }}" class="btn btn-sm btn-primary mb-3"><i class="fas fa-arrow-left"></i> Back</a>
<a href="{{ route('studentList') }}" class="btn btn-sm btn-info mb-3"><i class="fas fa-list-alt"></i> Show All Students</a>
<div class="card">
    <div class="card-header">
        <h5>Search Results</h5>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Major</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody>
                @if (count($students)>0)
                @foreach ($students as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->major_name }}</td>
                    <td>{{ $item->city }}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">
                        <p class="d-flex justify-content-center text-danger">No such students!</p>
                    </td>
                </tr>
                @endif


            </tbody>
        </table>
    </div>
</div>

@endsection
