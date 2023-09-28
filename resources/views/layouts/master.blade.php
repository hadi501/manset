<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link href="{{ asset('fonts/icomoon/style.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Data Table -->
    <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
    
    <!-- Style -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @stack('styles')

    <title>@yield('title')</title>
  </head>
  <body>
  
    @include('partials.aside')
    
    <main>
        @include('sweetalert::alert')
        @yield('main')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @stack('scripts')

  </body>
</html>