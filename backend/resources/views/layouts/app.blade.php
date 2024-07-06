<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('phsar kasekor', 'phsar kasekor') }}</title>
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="../../../node_modules/apexcharts/dist/apexcharts.css">

    <link href="../../../node_modules/@fullcalendar/core/main.css" rel="stylesheet">
    <link href="../../../node_modules/@fullcalendar/daygrid/main.css" rel="stylesheet">
    <!-- Optional FullCalendar theme -->
    <link href="../../../node_modules/@fullcalendar/bootstrap/main.css" rel="stylesheet">
</head>

<body class="font-sans antialiased">
    @yield('content')

    <!-- jQuery -->
    <script src="/path/to/node_modules/jquery/dist/jquery.min.js"></script>
    <!-- Moment.js -->
    <script src="/path/to/node_modules/moment/min/moment.min.js"></script>
    <!-- FullCalendar -->
    <script src="/path/to/node_modules/@fullcalendar/core/main.js"></script>
    <script src="/path/to/node_modules/@fullcalendar/daygrid/main.js"></script>
    <script src="/path/to/node_modules/@fullcalendar/bootstrap/main.js"></script>

    @yield('scripts')
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

        @include('layouts.sidebar')

        <div class="flex-1 flex flex-col overflow-scroll">

            @include('layouts.header')

            @if(\Session::has('success'))
            <div class="text-green-600 pt-5 pl-5">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
            @endif

            @if(\Session::has('error'))
            <div class="text-green-600 pt-5 pl-5">
                <ul>
                    <li>{!! \Session::get('error') !!}</li>
                </ul>
            </div>
            @endif

            @if ($errors->any())
            <div class="text-red-600  pt-5 pl-5">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{ $slot }}
        </div>
    </div>
    <script src="../../../node_modules/lodash/lodash.min.js"></script>
    <script src="../../../node_modules/apexcharts/dist/apexcharts.min.js"></script>
</body>

</html>