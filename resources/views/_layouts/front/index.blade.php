<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    @include('_layouts.front.includes.styles')
    @stack('page-styles')
    @stack('styles')
</head>

<body class="text-justify">

<div id="main-container">


@include('_layouts.front.includes.header')


@yield('content')


@include('_layouts.front.includes.footer')


@include('_layouts.front.includes.scripts')
@stack('top-scripts')
@stack('page-scripts')
@stack('scripts')
</body>

</html>