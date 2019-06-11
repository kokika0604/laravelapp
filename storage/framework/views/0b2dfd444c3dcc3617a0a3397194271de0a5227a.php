<div>
    <form action="<?php echo e(route('get_homepage')); ?>" method="get">
        <?php echo csrf_field(); ?>
        <input type="text" name="keyword" value="<?php echo e(app('request')->input('keyword')); ?>" placeholder="店舗を探す" />
        <hr>

        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <input type="checkbox" name="category_ids[]" value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <hr>

        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <input type="checkbox" name="tag_ids[]" value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <hr>

        <input type="submit"  value="search">
    </form>
</div>
<?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/subviews/restaurant_search_form.blade.php ENDPATH**/ ?>