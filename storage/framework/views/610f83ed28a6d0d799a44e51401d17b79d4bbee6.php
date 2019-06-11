<?php $__env->startSection("content"); ?>
<div class="">
    <header>
        <nav style="text-align:center">
            <a href="<?php echo e(route('get_homepage')); ?>">ホームへ</a>
            <a href="<?php echo e(route('get_user_favourites')); ?>">お気に入りへ</a>
            <a href="<?php echo e(route('get_user_mypage')); ?>"><?php echo e($user->name); ?></a>
        </nav>
    </header>
    <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php echo $__env->make("user.subviews.restaurants_info", array("restaurant" => $restaurant), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("user.layouts.app", array("title" => "favourites"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/user/favourites.blade.php ENDPATH**/ ?>