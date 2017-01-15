<div class="friends-box">
    <div class="top"><?php echo e(__('People you may know')); ?></div>
    <?php $__currentLoopData = $people; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <?php if($item->id != Auth::id()): ?>
            <div class="add-friend">
                <span class="name"><?php echo e($item->firstname); ?> <?php echo e($item->lastname); ?></span>
                <button type="submit" class="add-friend-btn"><?php echo e(__('Add friend')); ?></button>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <div class="bottom">
        <div class="search">
            <form>
                <input type="text" name="search_friends" placeholder="Search friends"/>
                <button type="submit" class="search-btn"><?php echo e(__('Search')); ?></button>
            </form>
        </div>
    </div>
</div>