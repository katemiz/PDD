<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Engineering Toolkit</title>
    {{-- <style>[x-cloak]{display:none}</style> --}}
    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/sweetalert2_min.css') }}">
    <script src="{{ asset('/js/sweetalert2.min.js') }}"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

    @livewireStyles
</head>
<body>

    @include('components.navbar')

    {{ $slot }}

    @include('components.footer')

    @livewireScripts
</body>
</html>