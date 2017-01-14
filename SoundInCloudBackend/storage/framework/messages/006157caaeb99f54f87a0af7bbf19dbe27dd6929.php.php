<?php $__env->startSection('stylesheets'); ?>
    <link rel="stylesheet" type="text/css" href="/css/home.css">
    <link rel="import"  href="/components/upload.template.html" >
    <link rel="import"  href="/components/newsFeedElement.template.html">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <?php echo e(__('home')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="left-side">
        <?php echo $__env->make('components.upload', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


            <div class="news-feed">

                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div class="news-feed-element">
                        <div class="title">
                            <?php echo e($element->text); ?>

                        </div>
                        <div class="files">
                            <?php $__currentLoopData = $element->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <?php if($file->isAudioFile()): ?>
                                    <div class="audio">
                                        <audio controls>
                                            <source src="<?php echo e(Storage::url($file->path)); ?>" type="<?php echo e($file->mime_type); ?>">
                                            <?php echo e(__('Your browser does not support the audio element.')); ?>

                                        </audio>
                                    </div>
                                <?php else: ?>
                                    <div class="documents">
                                        <div class="document" data-src="testSrc">
                                            <div class="icon icon-document"></div>
                                            <div class="document-title"><?php echo e($file->name); ?></div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                        </div>

                        <div class="controls">
                            <form>
                                <div class="btn like-btn">
                                    <button type="submit"><?php echo e(__('like')); ?></button>
                                </div>
                                <div class="btn share-btn">
                                    <button type="submit"><?php echo e(__('share')); ?></button>
                                </div>
                                <div class="btn add-to-lib-btn">
                                    <span class="long"> <button type="submit"><?php echo e(__('add to my library')); ?></button></span>
                                    <span class="short"> <button type="submit"><?php echo e(__('add')); ?></button></span>
                                </div>
                            </form>
                        </div>

                    </div>
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