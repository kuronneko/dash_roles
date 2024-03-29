<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 4.1.1 -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="//fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    @yield('page_css')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/style_alt.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/components.css') }}">
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css') }}" rel="stylesheet">
    @yield('page_css')

    @yield('css')
</head>

<body>

    <div id="app">

        <nav class="navbar navbar-expand-md bg-default mb-5">
            <div class="container">
                <a class="navbar-brand text-white decoration-none" href="/"><i class="fas fa-leaf"></i>
                    wikiPlantas</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        @if (Route::has('login'))
                            <div class="">
                                @auth
                                    <a href="{{ url('/home') }}" class="text-white">Home</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-white">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-3 text-white">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content_public')

        <footer class="bg-light text-center text-lg-start mt-5">
            <!-- Copyright -->
            <div class="text-center p-3 bg-default text-white">
                <p>wikiPlantas es una repositorio con información referente a plantas, hierbas y símiles.</p>
                © 2022 Copyright:
            </div>
            <!-- Copyright -->
        </footer>
    </div>

</body>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/iziToast.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
<script type="text/javascript" src="{{asset('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js')}}"></script>

<!-- Template JS File -->
<script src="{{ asset('web/js/stisla.js') }}"></script>
<script src="{{ asset('web/js/scripts.js') }}"></script>
<script src="{{ mix('assets/js/profile.js') }}"></script>
<script src="{{ mix('assets/js/custom/custom.js') }}"></script>

@yield('page_js')
@yield('scripts')

</html>
