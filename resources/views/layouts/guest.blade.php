<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

         <!-- DreamsPOS -->
        <!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('build') }}/assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('build') }}/assets/css/bootstrap.min.css">
		
		<!-- Animation CSS -->
		<link rel="stylesheet" href="{{ asset('build') }}/assets/css/animate.css">

        <!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="{{ asset('build') }}/assets/plugins/owlcarousel/owl.carousel.min.css">
		<link rel="stylesheet" href="{{ asset('build') }}/assets/plugins/owlcarousel/owl.theme.default.min.css">

        <!-- Select2 CSS -->
		<link rel="stylesheet" href="{{ asset('build') }}/assets/plugins/select2/css/select2.min.css">

        <!-- Datetimepicker CSS -->
        <link rel="stylesheet" href="{{ asset('build') }}/assets/css/bootstrap-datetimepicker.min.css">


		<!-- Datatable CSS -->
		<link rel="stylesheet" href="{{ asset('build') }}/assets/css/dataTables.bootstrap4.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{ asset('build') }}/assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="{{ asset('build') }}/assets/plugins/fontawesome/css/all.min.css">

        <!-- Lightbox CSS -->
        <link rel="stylesheet" href="{{ asset('build') }}/assets/plugins/lightbox/glightbox.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="{{ asset('build') }}/assets/css/style.css">
		<link rel="stylesheet" href="{{ asset('build') }}/assets/css/custom-style.css">

        <!-- Font AWESOME CDN -->
        <script src="https://kit.fontawesome.com/9a25734289.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body class="account-page">
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        <!-- DreamsPOS -->
        <!-- jQuery -->
        <script src="{{ asset('build') }}/assets/js/jquery-3.6.0.min.js"></script>

         <!-- Feather Icon JS -->
		<script src="{{ asset('build') }}/assets/js/feather.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{ asset('build') }}/assets/js/bootstrap.bundle.min.js"></script>
		
		<!-- Custom JS -->
		<script src="{{ asset('build') }}/assets/js/script.js"></script>
    </body>
</html>