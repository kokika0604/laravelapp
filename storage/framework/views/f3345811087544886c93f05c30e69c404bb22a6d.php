<!--前台显示页面  -->
<!-- bootstrap的引用放在layouts/app文件中 -->

<!--内容 引用 -->
<?php $__env->startSection("content"); ?>
<h1>Welcome,<?php echo e($user->name); ?>!<h1>
    <br>
    <a href="homepage">店舗一覧</a>
    <br>
    <a href="info">個人情報</a>
    <br>
    <a href="<?php echo e(route('get_user_favourites')); ?>">お気に入り</a>
    <br>
    <a href="<?php echo e(route('get_user_logout')); ?>">logout</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("user.layouts.app", array("title" => "mypage"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/user/mypage.blade.php ENDPATH**/ ?>