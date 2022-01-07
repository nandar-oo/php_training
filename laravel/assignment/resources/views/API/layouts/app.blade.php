<!DOCTYPE html>
<html lang="en">

<head>
  <title>Laravel Quickstart - Basic</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('js/script.js') }}"></script>

  <!-- CSS And JavaScript -->
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light navbar-laravel shadow">
    <div class="container">
      <a class="navbar-brand text-light" href="#">STUDENT API</a>
      <div class="float-end">
        <a href="{{ route('studentList') }}">Go To Blade Page</a>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    @yield('content')
  </div>

</body>

</html>
