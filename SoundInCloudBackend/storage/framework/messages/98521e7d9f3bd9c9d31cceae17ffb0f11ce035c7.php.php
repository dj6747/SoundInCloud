<?php $__env->startSection('title'); ?>
    home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    Admin home page
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>