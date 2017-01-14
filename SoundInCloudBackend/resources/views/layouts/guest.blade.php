<!DOCTYPE html>
<html>
<head>
    <title>SoundInCloud</title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/login.css">

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
        <a href="/">SoundInCloud</a>
    </div>
</div>


<div class="carousel">
    <div class="content">
        <h1>{{ __('Store your music. Add effects. Share it.') }}</h1>
        <section>
            <h3>{{ __('Features') }}</h3>
            <ul>
                <li>
                    {{ __('share songs') }}
                </li>
                <li>
                    {{ __('connect with friends') }}
                </li>
            </ul>
        </section>
    </div>
</div>

@yield('content')


<script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
<script src="../js/main.js"></script>
<script src="../js/login.js"></script>
</body>


</html>
