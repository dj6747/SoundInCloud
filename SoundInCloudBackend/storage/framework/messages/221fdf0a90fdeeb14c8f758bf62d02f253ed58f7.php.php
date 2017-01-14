<!DOCTYPE html>
<html lang="en">
<head>
    <script src="/js/lib/webcomponents.min.js"></script>

    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoundInCloud | <?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <?php echo $__env->yieldContent('stylesheets'); ?>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

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
            <span class="<?php echo e(Route::currentRouteName() == 'home' ? 'active' : ''); ?>"><a href="/home"><?php echo e(__('Home')); ?></a></span>
            <span class="<?php echo e(Route::currentRouteName() == 'library' ? 'active' : ''); ?>"><a href="/library"><?php echo e(__('My library')); ?></a></span>
            <span class="<?php echo e(Route::currentRouteName() == 'profile' ? 'active' : ''); ?>"><a href="/profile"><?php echo e(__('My profile')); ?></a></span>
            <span><a href="/logout"><?php echo e(__('Sign out')); ?></a></span>
        </div>
    </div>


    <div class="main-container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="/js/main.js"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
