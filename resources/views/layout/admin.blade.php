<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    @yield('title')

    <!-- Favicons -->
    <link href="{{ asset('assets') }}/img/icon.png" rel="icon">
    <link href="{{ asset('assets') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"/>

    <link rel="stylesheet" href="{{ asset('admin/css/tailwind.output.css') }}"/>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>

    <script src="{{ asset('admin/js/init-alpine.js') }}"></script>
    <script src="{{ asset('admin/js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('admin/js/charts-pie.js') }}" defer></script>
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @yield('desktop-sidebar')

        @yield('mobile-sidebar')

        <div class="flex flex-col flex-1 w-full">
            @include('include.admin.header')

            @yield('main')
        </div>
    </div>
</body>

</html>
