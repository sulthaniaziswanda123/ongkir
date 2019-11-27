<!doctype html>
<html lang="{{ config('app.locale') }}" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Cek Ongkir</title>

        <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Icons -->

        <!-- Fonts and Styles -->
        @yield('css_before')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
{{--        <link rel="stylesheet" id="css-main" href="{{ mix('/css/codebase.css') }}">--}}
        <link rel="stylesheet" id="css-main" href="{{ mix('/css/codebase.css') }}">

        <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
        <link rel="stylesheet" id="css-theme" href="{{ mix('/css/themes/corporate.css') }}">
{{--        <link rel="stylesheet" id="css-main" href="{{ asset('vendor/titipmasa/assets/css/codebase.css') }}">--}}

        <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
{{--        <!-- <link rel="stylesheet" id="css-theme" href="{{ mix('/css/themes/corporate.css') }}"> -->--}}
        @yield('css_after')
        <link rel="stylesheet"
              href="{{ asset('vendor/titipmasa/assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
{{--        <link rel="stylesheet" href="{{ asset('vendor/titipmasa/assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">--}}
        <link rel="stylesheet" href="{{ asset('vendor/titipmasa/assets/js/plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet"
              href="{{ asset('vendor/titipmasa/assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
        <link rel="stylesheet"
              href="{{ asset('vendor/titipmasa/assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.css') }}">

        <!-- Scripts -->
{{--        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>--}}
    </head>
    <body>

        <div id="page-container" class="main-content-boxed">
            <!-- Main Container -->
            <main id="main-container">
                @yield('content')
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->
        <script src="{{ mix('js/codebase.app.js') }}"></script>

        <!-- Laravel Scaffolding JS -->
        <script src="{{ mix('js/laravel.app.js') }}"></script>
        <!-- Codebase Core JS -->
{{--        <script src="{{ asset('vendor/titipmasa/assets/js/codebase.core.min.js') }}"></script>--}}
{{--        <script src="{{ asset('vendor/titipmasa/assets/js/codebase.app.min.js') }}"></script>--}}
        <script src="{{ asset('vendor/titipmasa/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
{{--                <script src="{{ asset('vendor/titipmasa/assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>--}}
        <script
            src="{{ asset('vendor/titipmasa/assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
        <script src="{{ asset('vendor/titipmasa/assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
        <script
            src="{{ asset('vendor/titipmasa/assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
        <script
            src="{{ asset('vendor/titipmasa/assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js') }}"></script>
        <script
            src="{{ asset('vendor/titipmasa/assets/js/plugins/masked-inputs/jquery.maskedinput.min.js') }}"></script>
        <script
            src="{{ asset('vendor/titipmasa/assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
        <script src="{{ asset('vendor/titipmasa/assets/js/plugins/dropzonejs/dropzone.min.js') }}"></script>
        <script
            src="{{ asset('vendor/titipmasa/assets/js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js') }}"></script>

        <!-- Page JS Code -->
        <script src="{{ asset('vendor/titipmasa/assets/js/pages/be_forms_plugins.min.js') }}"></script>

        <!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins) -->
        <script>jQuery(function () {
                Codebase.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']);
            });</script>

        @yield('js_after')

    </body>
</html>
