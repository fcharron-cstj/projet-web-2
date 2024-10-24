<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.typekit.net/dmc2smn.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>PJWEB2</title>
</head>

<body>

    <!-- Displays success messages -->
    @if (session('success'))
        <div class="alert alert-success">
            <img src="medias/x-close.svg" alt="" class="close-popup">
            {{ session('success') }}
        </div>
    @endif

    <!-- Displays error messages -->
    @if (session('error'))
        <div class="alert alert-danger">
            <img src="medias/x-close.svg" alt="" class="close-popup">
            {{ session('error') }}
        </div>
    @endif

    {{ $slot }}
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
