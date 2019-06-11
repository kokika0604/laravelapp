<?php $__env->startSection('content'); ?>
        <a href="<?php echo e(route('get_restaurant_mypage')); ?>" style="float:right">マイページ</a><br><br>

        <?php if($info_action==''): ?>
            <?php echo $__env->make('restaurant.parts.basic_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if($info_action=='edit'): ?>
            <?php echo $__env->make('restaurant.parts.basic_info_edit_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <br><br>

        <?php echo $__env->make('restaurant.parts.pic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <br><br>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('restaurant.layouts.app',['title'=>'店舗情報'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/restaurant/info.blade.php ENDPATH**/ ?>