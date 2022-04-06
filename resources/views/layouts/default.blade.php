<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.main.head')
</head>
<body>

    <header>
        @include('layouts.main.header')
    </header>
    
    <main>
        <div id="app">
            @yield('content')
        </div>
    </main> 

    <footer class="fixed-bottom">
        @include('layouts.main.footer')
    </footer>    


    @stack('start-scripts')
        <script src="{{ asset('/js/app.js') }}"></script>
    @stack('final-scripts')
    
    @stack('script')
</body>
</html>