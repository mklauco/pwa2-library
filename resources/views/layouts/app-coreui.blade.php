<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui@3.4.0/dist/css/coreui.min.css" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/free.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/brand.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/flag.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.2/css/perfect-scrollbar.css" integrity="sha512-2xznCEl5y5T5huJ2hCmwhvVtIGVF1j/aNUEJwi/BzpWPKEzsZPGpwnP1JrIMmjPpQaVicWOYVu8QvAIg9hwv9w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
        <!-- Sidebar content here -->
        @include('_sidebar')
    </div>
    
    <div class="c-wrapper">
        <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
            @include('_header')
        </header>
        
        <div class="c-body">
            <main class="c-main">

                @if (Session::has('success'))
                <div class="alert alert-success" role="alert">{!! Session::get('success') !!}</div>
                @endif

                @if (Session::has('failure'))
                <div class="alert alert-danger" role="alert">{!! Session::get('success') !!}</div>
                @endif

                <!-- Main content here -->
                @yield('content')
            </main>
        </div>
        
        <footer class="c-footer">
            <!-- Footer content here -->
            
            @php
            $S = \Carbon\Carbon::createFromTimestamp(exec("git log -1 --format=%at"));
            @endphp
            
            <div class="ml-auto">
                Last Git update:&nbsp;<strong>{{$S->tz('Europe/Berlin')->toDateTimeString()}}</strong> |
                {{-- Git branch:  --}}
                Laravel version:&nbsp;<strong>{{app()->version()}}</strong> |
                PHP version:&nbsp;<strong>{{phpversion()}}</strong> |
                Enviroment:&nbsp;<strong>{{App::environment()}}</strong> |
                IP Address:&nbsp;<strong>{{$_SERVER['REMOTE_ADDR']}}</strong>
            </div>
        </footer>
        
    </div>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js" integrity="sha512-yUNtg0k40IvRQNR20bJ4oH6QeQ/mgs9Lsa6V+3qxTj58u2r+JiAYOhOW0o+ijuMmqCtCEg7LZRA+T4t84/ayVA==" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@coreui/coreui@3.4.0/dist/js/coreui.min.js"></script>
    
    
</body>
</html>