<?php $__env->startSection('stylesheets'); ?>
    <link rel="stylesheet" type="text/css" href="/css/home.css">
    <link rel="import"  href="/components/upload.template.html" >
    <link rel="import"  href="/components/newsFeedElement.template.html">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    library
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="left-side">
        <?php echo $__env->make('components.upload', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


        <div class="news-feed">
            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php echo $__env->make('components.library-element', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>
    </div>

    <div class="right-side">
        <?php echo $__env->make('components.friends-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script src="/js/friends.js"></script>
    <script src="/js/home.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>