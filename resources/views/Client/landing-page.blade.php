<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Landing Page</h1>
        <a href="{{ route('login') }}">Login</a>
    </div>

    <div>
        <a href="{{ route('client.form') }}">Book now</a>
    </div>

        <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @include('sweetalert::alert')
</body>
</html>