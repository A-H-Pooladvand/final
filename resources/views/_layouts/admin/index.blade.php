<!doctype html>
<html lang="{{ config('app.locale') }}" dir="rtl">

<head>
    @include('_layouts.admin.includes.styles')
    @stack('page-styles')
    @stack('styles')
</head>

<body>

<div id="dark-layout"></div>

<header>
    @include('_layouts.admin.includes.header')
</header>

<section id="layout-section">
    <!-- Sidebar -->
    @include('_layouts.admin.includes.sidebar')

    <div class="container-fluid" id="admin-layout">

        @yield('helper_block')

        @yield('content')
    </div>

</section>

<footer>
    @include('_layouts.admin.includes.footer')
</footer>

@include('_layouts.admin.includes.scripts')
@stack('top-scripts')
@stack('page-scripts')
@stack('scripts')
</body>

</html>

