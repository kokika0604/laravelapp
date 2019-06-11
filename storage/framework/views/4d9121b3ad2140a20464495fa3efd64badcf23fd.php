<!--前台显示页面  -->


<!-- bootstrap的引用放在layouts/app文件中 -->

<!--内容 引用 -->
<?php $__env->startSection("content"); ?>

<h1>ログイン</h1>


<!-- 当提交失败时，返回本页面 -->
<form method="post" action="<?php echo e(route('post_user_login')); ?>">
<!-- 必加，可以防止外部攻击 -->
  <?php echo csrf_field(); ?>

<!-- 怎样显示错误信息，ex：email，输入后显示刚刚输入email -->
  メール：<input type="text" name="email">
  <br />


  パスワード：<input type="password" name="password">
  <br />


  <input type="submit" value="送信">

</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("users.layouts.app", array("title" => "会員新規登録"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/users/login.blade.php ENDPATH**/ ?>