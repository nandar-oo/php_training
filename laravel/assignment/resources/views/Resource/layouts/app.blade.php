<!DOCTYPE html>
<html lang="en">

<head>
  <title>Laravel Quickstart - Basic</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- CSS And JavaScript -->
</head>

<body class="resource-body">
  <nav class="navbar navbar-expand-lg navbar-light navbar-laravel shadow resource-nav">
    <div class="container">
      <a class="navbar-brand" href="#">STUDENT RESOURCE</a>
      <div class="float-end">
        <ul class="navbar-nav ml-auto d-flex">
          <li class="nav-item">
            <a href="{{ route('api.studentList') }}" class="nav-link"> API</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('studentList') }}">Blade</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    @yield('content')
  </div>

</body>

</html>
