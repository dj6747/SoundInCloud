<?php $__env->startSection('stylesheets'); ?>
    <link rel="stylesheet" type="text/css" href="/css/profile.css">
    <link rel="import"  href="/components/upload.template.html" >
    <link rel="import"  href="/components/newsFeedElement.template.html">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="left-side">
        <h2>Janez Novak</h2>
        <form id="register-form">
            <?php echo e(__('Name')); ?>:<br>
            <input type="text" name="firstname" placeholder="<?php echo e(__('Enter your name')); ?>..." autofocus><br>
            <?php echo e(__('Last name')); ?>:<br>
            <input type="text" name="lastname" placeholder="<?php echo e(__('Enter your last name')); ?>..." ><br>
            <?php echo e(__('Email')); ?>:<br>
            <input type="email" name="email" placeholder="<?php echo e(__('Enter your email')); ?>..."><br>
            <?php echo e(__('Password')); ?>:<br>
            <input type="password" placeholder="<?php echo e(__('Enter your password')); ?>..." name="password"><br>
            <?php echo e(__('Repeat password')); ?>:<br>
            <input type="password" placeholder="<?php echo e(__('Repeat your password')); ?>..." name="repeat_password">
            <br>
            <?php echo e(__('Gender')); ?>:
            <select name="gender">
                <option value="M"><?php echo e(__('Male')); ?></option>
                <option value="F"><?php echo e(__('Female')); ?></option>
            </select><br>

            <button class="sign-up"><?php echo e(__('Update data')); ?></button>
        </form>
    </div>

    <div class="right-side">
        <?php echo $__env->make('components.friends-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script src="/js/login.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>