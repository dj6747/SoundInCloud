<!DOCTYPE html>
<html>
<head>
    <title>SoundInCloud</title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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
        <h1><?php echo e(__('Store your music. Add effects. Share it.')); ?></h1>
        <section>
            <h3><?php echo e(__('Features')); ?></h3>
            <ul>
                <li>
                    <?php echo e(__('share songs')); ?>

                </li>
                <li>
                    <?php echo e(__('connect with friends')); ?>

                </li>
            </ul>
        </section>
    </div>
</div>

<?php echo $__env->yieldContent('content'); ?>


<script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
<script src="../js/main.js"></script>
<script src="../js/login.js"></script>
</body>


</html>
