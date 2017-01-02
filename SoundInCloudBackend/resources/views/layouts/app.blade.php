<!DOCTYPE html>
<html lang="en">
<head>
    <script src="/js/lib/webcomponents.min.js"></script>

    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoundInCloud | @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    @yield('stylesheets')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div class="header-bar">
        <div class="title">
            <a href="/home" class="responsive-title-long">SoundInCloud</a>
            <a href="/home" class="responsive-title-short">SC</a>
        </div>

        <div class="right-side">
            <span class="{{Route::currentRouteName() == 'home' ? 'active' : ''}}"><a href="/home">Home</a></span>
            <span class="{{Route::currentRouteName() == 'library' ? 'active' : ''}}"><a href="/library">My library</a></span>
            <span class="{{Route::currentRouteName() == 'profile' ? 'active' : ''}}"><a href="/profile">My profile</a></span>
            <span><a href="/logout">Sign out</a></span>
        </div>
    </div>


    <div class="main-container">
        @yield('content')
    </div>

    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="/js/main.js"></script>
    @yield('scripts')
</body>
</html>
