<?php $__env->startSection('content'); ?>
  <form action="<?php echo e(route('post_restaurant_login')); ?>" method="post">
    <?php echo csrf_field(); ?>
    メールアドレス：<input type="text" name="email"><br>
    パスワード:<input type="password" name="password"><br>
    <?php if(isset($error)): ?>
    <span><?php echo e($error); ?></span><br>
    <?php endif; ?>
    <input type="submit" value="ログイン">
  </form>
  <a href="add">新規登録</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('restaurants.layouts.app',['title'=>'店舗ログイン'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/restaurants/login.blade.php ENDPATH**/ ?>