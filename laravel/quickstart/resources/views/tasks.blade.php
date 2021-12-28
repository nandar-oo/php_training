@extends('layouts.app')


@section('content')
<!-- Bootstrap Boilerplate... -->

<div class="col-6 col-offset-3">

  <!-- New Task Form -->
  <form action="/task" method="POST" class="form-horizontal">
    @csrf

    <!-- Task Name -->
    <div class="form-group">
      <label>Task</label>

      <div class="col">
        <input type="text" name="name" id="task-name" class="form-control">
        @if ($errors->has('name'))
        <small class="text-danger">{{ $errors->first('name')}}</small>
        @endif
      </div>
    </div>
    <br>  
    <!-- Add Task Button -->
    <div class="form-group">
      <div class="col">
        <button type="submit" class="btn btn-outline-success">
          <i class="fa fa-plus"></i> Add Task
        </button>
      </div>
    </div>
  </form>
</div>

@if (count($tasks) > 0)
<div class="panel panel-default mt-5">
  <h5 class="panel-heading">
    Current Tasks
  </h5>

  <div class="panel-body">
    <table class="table table-striped task-table">

      <!-- Table Headings -->
      <thead>
        <th>Task</th>
        <th>&nbsp;</th>
      </thead>

      <!-- Table Body -->
      <tbody>
        @foreach ($tasks as $task)
        <tr>
          <!-- Task Name -->
          <td class="table-text">
            <div>{{ $task->name }}</div>
          </td>

          <td>
            <form action="/task/delete/{{ $task->id }}" method="get">
              @csrf
              <button class="btn btn-danger d-flex float-end" type="submit"> Delete Task</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endif

<!-- TODO: Current Tasks -->
@endsection
