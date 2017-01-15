<div class="news-feed-element">
    <div class="title">
        <?php echo e($element->user->firstname); ?> <?php echo e($element->user->lastname); ?> <?php echo e(__('shared some files.')); ?><br>
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
        <form method="POST" action="<?php echo e(route('likePost')); ?>">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="post_id" value="<?php echo e($element->id); ?>">
            <div class="btn like-btn">
                <?php if($element->userLikes): ?>
                    <button type="submit" class="active-action-btn" onClick="javascript:this.form.submit();"><?php echo e(__('like')); ?></button>
                <?php else: ?>
                    <button type="submit" onClick="javascript:this.form.submit();"><?php echo e(__('like')); ?></button>
                <?php endif; ?>
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