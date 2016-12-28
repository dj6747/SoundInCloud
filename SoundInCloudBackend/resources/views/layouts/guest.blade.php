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
        <h1>Store your music. Add effects. Share it.</h1>
        <section>
            <h3>Features</h3>
            <ul>
                <li>
                    share songs
                </li>
                <li>
                    connect with friends
                </li>
            </ul>
        </section>
    </div>
</div>

@yield('content')



<script src="../js/main.js"></script>
<script src="../js/login.js"></script>
</body>


</html>
