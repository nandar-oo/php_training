<!DOCTYPE html>
<html lang="en">

<head>
  <title>Laravel Quickstart - Basic</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <!-- CSS And JavaScript -->
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light navbar-laravel shadow">
    <div class="container">
      <a class="navbar-brand" href="#">STUDENT</a>
    </div>
  </nav>
  <div class="container mt-5">
    @yield('content')
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
