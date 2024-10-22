<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.typekit.net/dmc2smn.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('medias/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('medias/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" type="image/png" href="{{ asset('medias/favicon-48x48.png') }}" sizes="48x48" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('medias/favicon.svg') }}" />
    <link rel="manifest" href="{{ asset('medias/site.webmanifest') }}">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/css/datepicker-foundation.min.css">
    <title>{{ $title ?? 'Nova' }}</title>
</head>

<body>
    <x-nav />
    {{ $slot }}
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
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/popup.js') }}"></script>
</body>

</html>
