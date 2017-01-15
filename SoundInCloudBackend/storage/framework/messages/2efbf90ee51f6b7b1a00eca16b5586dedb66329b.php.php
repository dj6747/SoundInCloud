<?php $__env->startSection('content'); ?>

    <div class="login-form">
            <form id="login-form"  role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                <?php echo e(csrf_field()); ?>


                <div class="<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <label for="email"><?php echo e(__('E-Mail Address')); ?></label>

                    <div >
                        <input id="email" type="email"  name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                        <?php if($errors->has('email')): ?>
                            <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <label for="password" class=""><?php echo e(__('Password')); ?></label>

                    <div class="">
                        <input id="password" type="password"  name="password" required>

                        <?php if($errors->has('password')): ?>
                            <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>
                </div>

                <button type="submit" name="login" class="btn btn-primary sign-in">
                    <?php echo e(__('Login')); ?>

                </button>

        </form>
        <br>
        <span><?php echo e(__('or')); ?> <a href="/register"><?php echo e(__('sign up')); ?></a></span>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>