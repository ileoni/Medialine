<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.main.head')
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <a href="#" class="navbar-brand">
                <img src="https://laravel.com/img/notification-logo.png" width="60" height="60" alt="Laravel Logo">
            </a>
        </nav>
    </header>
    
    <main>        
        <div id="app">
            @yield('content')
        </div>
    </main>
    
    <footer>
        @include('layouts.main.footer')
    </footer>    

    
    @stack('start-scripts')
    <script src="{{ asset('/js/app.js') }}"></script>
    @stack('final-scripts')
</body>
</html>