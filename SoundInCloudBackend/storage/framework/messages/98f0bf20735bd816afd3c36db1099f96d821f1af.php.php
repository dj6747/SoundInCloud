<form enctype="multipart/form-data" method="POST" action="<?php echo e(route('createPost')); ?>">
    <?php echo e(csrf_field()); ?>

    <div class="block1">
        <h1 class="upload-container-h1"><?php echo e(__('Upload')); ?></h1>

        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <input type="file" id="file-input" name="files[]" multiple/>
    </div>

    <div class="block2 hidden">
        <b><?php echo e(__('Uploaded files')); ?>:</b>
        <ul id="file-list"></ul>
        <div class="comment-section">
            <input type="text" name="text" class="comment-box" placeholder="<?php echo e(__('Insert message')); ?>"/>
        </div>

        <input type="hidden" name="latitude" value="1.23"/>
        <input type="hidden" name="longitude" value="2.34"/>
    </div>
    <button type="submit" class="btn btn-post"><?php echo e(__('Post')); ?></button>
</form>

<?php $__env->startSection('stylesheets'); ?>
    @parent
    <link rel="stylesheet" type="text/css" href="/css/components/upload.css">
<?php $__env->stopSection(); ?>