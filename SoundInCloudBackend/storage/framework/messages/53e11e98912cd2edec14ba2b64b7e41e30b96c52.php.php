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
        <form id="register-form" method="POST" action="<?php echo e(route('updateProfile')); ?>">
            <?php echo e(csrf_field()); ?>


            <div class="form-group<?php echo e($errors->has('firstname') ? ' has-error' : ''); ?>">
                <label for="name" class="col-md-4 control-label"><?php echo e(__('First name')); ?></label>

                <div class="col-md-6">
                    <input id="name" type="text"  class="form-control" name="firstname" value="<?php echo e($user->firstname); ?>" required autofocus>

                    <?php if($errors->has('firstname')): ?>
                        <span class="help-block">
                                        <strong><?php echo e($errors->first('firstname')); ?></strong>
                                    </span>
                    <?php endif; ?>
                </div>
            </div>


            <div class="form-group<?php echo e($errors->has('lastname') ? ' has-error' : ''); ?>">
                <label for="name" class="col-md-4 control-label"><?php echo e(__('Last name')); ?></label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="lastname" value="<?php echo e($user->lastname); ?>" required autofocus>

                    <?php if($errors->has('lastname')): ?>
                        <span class="help-block">
                                        <strong><?php echo e($errors->first('lastname')); ?></strong>
                                    </span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                <label for="email" class="col-md-4 control-label"><?php echo e(__('E-mail')); ?></label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e($user->email); ?>" required>

                    <?php if($errors->has('email')): ?>
                        <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                <label for="password" class="col-md-4 control-label"><?php echo e(__('Password')); ?></label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label"><?php echo e(__('Confirm password')); ?></label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
            <?php echo e(__('Gender')); ?>:
            <select name="gender">
                <?php if($user->gender == 'M'): ?>
                    <option value="M" selected><?php echo e(__('Male')); ?></option>
                    <option value="F"><?php echo e(__('Female')); ?></option>
                <?php else: ?>
                    <option value="M"><?php echo e(__('Male')); ?></option>
                    <option value="F" selected><?php echo e(__('Female')); ?></option>
                <?php endif; ?>
            </select><br>

            <button type="submit" class="sign-up"><?php echo e(__('Update data')); ?></button>
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