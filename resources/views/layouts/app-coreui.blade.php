<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui@3.4.0/dist/css/coreui.min.css" crossorigin="anonymous">
    
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.2/css/perfect-scrollbar.css" integrity="sha512-2xznCEl5y5T5huJ2hCmwhvVtIGVF1j/aNUEJwi/BzpWPKEzsZPGpwnP1JrIMmjPpQaVicWOYVu8QvAIg9hwv9w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/free.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/brand.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/flag.min.css">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body class="c-app">
    
    <div class="c-sidebar c-sidebar-dark c-sidebar-show">
        <!-- Sidebar content here -->
        @include('_sidebar')
    </div>
    
    <div class="c-wrapper">
        <header class="c-header">
            <!-- Header content here -->
            <header class="navbar navbar-light">
                <button class="navbar-toggler sidebar-toggler" type="button" data-toggle="sidebar-show">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </header> 
        </header>
        
        <div class="c-body">
            <main class="c-main">
                <!-- Main content here -->
                @yield('content')
            </main>
        </div>
        
        <footer class="c-footer">
            <!-- Footer content here -->
        </footer>
        
    </div>
    
    <!-- Optional JavaScript -->
    <!-- Popper.js first, then CoreUI JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js" integrity="sha512-yUNtg0k40IvRQNR20bJ4oH6QeQ/mgs9Lsa6V+3qxTj58u2r+JiAYOhOW0o+ijuMmqCtCEg7LZRA+T4t84/ayVA==" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
    {{-- <script src="https://unpkg.com/@coreui/coreui@3.4.0/dist/js/coreui.min.js"></script> --}}
</body>
</html>