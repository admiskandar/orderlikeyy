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

    <!-- Styles -->
    @livewireStyles

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

<body class="font-sans antialiased">
    <!-- DreamsPOS  -->
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
    <!-- /Main Wrapper -->

    @stack('modals')

    @livewireScripts


    <!-- DreamsPOS  -->
    <!-- jQuery -->
    <script src="{{ asset('build') }}/assets/js/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

    <!-- Feather Icon JS -->
    <script src="{{ asset('build') }}/assets/js/feather.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('build') }}/assets/js/jquery.slimscroll.min.js"></script>

    <!-- Datatable JS -->
    <script src="{{ asset('build') }}/assets/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('build') }}/assets/js/dataTables.bootstrap4.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('build') }}/assets/js/bootstrap.bundle.min.js"></script>

    <!-- Owl JS -->
    <script src="{{ asset('build') }}/assets/plugins/owlcarousel/owl.carousel.min.js"></script>

    <!-- Select2 JS -->
    <script src="{{ asset('build') }}/assets/plugins/select2/js/select2.min.js"></script>

    <!-- Datetimepicker JS -->
    <script src="{{ asset('build') }}/assets/js/moment.min.js"></script>
    <script src="{{ asset('build') }}/assets/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Sweetalert 2 -->
    <script src="{{ asset('build') }}/assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="{{ asset('build') }}/assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <!-- Fileupload JS -->
    <script src="{{ asset('build') }}/assets/plugins/fileupload/fileupload.min.js"></script>

    <!-- Alertify JS -->
    <script src="{{ asset('build') }}/assets/plugins/lightbox/glightbox.min.js"></script>
    <script src="{{ asset('build') }}/assets/plugins/lightbox/lightbox.js"></script>


    <!-- Custom JS -->
    <script src="{{ asset('build') }}/assets/js/script.js"></script>

    <script>
        //Wait for the page to finish loading
        

        window.addEventListener('DOMContentLoaded', function() {

            
        });

        window.addEventListener('load', function() {
            var toggleBtn = document.getElementById('toggle_btn');

            // Simulate a click event on the toggle button
            toggleBtn.click();
        });

        window.addEventListener('load', function() {
            // Add the "active" class to the first tab_content element
            document.querySelector('.tab_content').classList.add('active');
        });
    </script>

</body>

</html>