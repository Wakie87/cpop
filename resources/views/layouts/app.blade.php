@include('partials.header')
<body>
    <div id="app">
        @include('partials.navbar')
        @include('partials.notification')
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>        
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
</body>
</html>
