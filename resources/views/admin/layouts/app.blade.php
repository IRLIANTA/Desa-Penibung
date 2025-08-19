<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Digital</title>
    <meta name="description" content="The simple way to manage your citizens">
    <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/') }}/images/logos/logo-icon.png">
    <link rel="apple-touch-icon" href="{{ asset('assets/') }}/images/logos/logo-icon.png">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="The simple way to manage your citizens">
    <meta property="og:description" content="The simple way to manage your citizens">
    <meta property="og:image" content="https://desa-digital.netlify.app/assets/images/logos/logo-icon.png">
    <meta property="og:url" content="https://desa-digital.netlify.app">
    <meta property="og:type" content="website">
</head>

<body>
    <div class="flex flex-1">
        @include('admin.partials.sidebar')
        <div id="Main-Container" class="flex flex-col flex-1">
            @include('admin.partials.navbar')
            @yield('content')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/') }}/js/accordion.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('assets/') }}/js/statistik-penduduk.js"></script>
    <script src="{{ asset('assets/') }}/js/accordion.js"></script>
    <script src="{{ asset('assets/') }}/js/tab-content.js"></script>
    <script src="{{ asset('assets/') }}/js/modal.js"></script>
    <script src="{{ asset('assets/') }}/js/submit-form.js"></script>
    <script src="{{ asset('assets/') }}/js/multiple-image-input.js"></script>
</body>

</html>
