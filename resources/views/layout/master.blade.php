<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <meta name="description" content="">--}}
{{--    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">--}}
{{--    <meta name="generator" content="Hugo 0.108.0">--}}
{{--    <title>@yield('title')</title>--}}
    <title>{{ config('app.name') }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Favicons -->
{{--    <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">--}}
{{--    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">--}}
{{--    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">--}}
{{--    <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">--}}
{{--    <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">--}}
{{--    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">--}}
{{--    <meta name="theme-color" content="#712cf9">--}}


    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/blog.css" rel="stylesheet">
    <link href={{ mix("/css/app.css") }} rel="stylesheet">

    <script src={{ mix("/js/manifest.js") }}></script>
    <script src={{ mix("/js/vendor.js") }}></script>
    <script src={{ mix("/js/app.js") }}></script>

</head>
<body>
    @include('layout.nav')

    <main role="main" class="container" id="app">
{{--        <div class="row">--}}
{{--            <example-component></example-component>--}}
{{--        </div>--}}
        <div class="row">

            @include('layout.flash_message')
            @yield('content')

            @section('sidebar')
                @include('layout.sidebar')
            @show
        </div>
    </main>

    @include('layout.footer')

{{--    @push('scripts')--}}
{{--        --}}
{{--        <script src="/js/manifest.js"></script>--}}
{{--        <script src="/js/vendor.js"></script>--}}
{{--        <script src="/js/app.js"></script>--}}

{{--    @endpush--}}

{{--    @prepend('scripts')--}}
{{--        <script src={{ mix("/js/manifest.js") }}></script>--}}
{{--        <script src={{ mix("/js/vendor.js") }}></script>--}}
{{--        <script src={{ mix("/js/app.js") }}></script>--}}
{{--    @endprepend--}}

{{--    @stack('scripts')--}}
</body>
</html>

