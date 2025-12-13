<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Learnify</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
  @include('layout.navbar')

  <div class="container-custom">
      @yield('content')
  </div>

  @include('layout.footer')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
