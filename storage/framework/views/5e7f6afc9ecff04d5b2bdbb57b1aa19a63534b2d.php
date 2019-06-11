<!--前台显示页面  -->


<!-- bootstrap的引用放在layouts/app文件中 -->

<!--内容 引用 -->
<?php $__env->startSection("content"); ?>

<h1>会員新規登録</h1>


<!-- 当提交失败时，返回本页面 -->
<form method="post" action="<?php echo e(route('post_user_add')); ?>">
<!-- 必加，可以防止外部攻击 -->
  <?php echo csrf_field(); ?>

<!-- 怎样显示错误信息，ex：email，输入后显示刚刚输入email -->
  メール：<input type="text" name="email" value="<?php echo e(old('email')); ?>">
  <!-- 验证email -->
  <?php if($errors->has("email")): ?>
    <p><?php echo e($errors->first("email")); ?></p>
  <?php endif; ?>
  <br />
  名前：<input type="text" name="name" value="<?php echo e(old('name')); ?>">
  <br />
  <!--注意此处前台电话号码名是telephone，而数据库中是phone  -->
  電話番号：<input type="text" name="telephone">
  <br />
  郵便番号：<input type="text" name="postcode">
  <br />
  <!--怎样表示下拉菜单，下拉菜单值为空的时候，显示 ’都道府県を選択して下さい。’  -->
  都道府県：<select name="mtb_prefecture_id">
    <option value="">都道府県を選択して下さい。</option>
    <?php $__currentLoopData = $mtb_prefectures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mtb_prefecture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($mtb_prefecture->id); ?>"><?php echo e($mtb_prefecture->value); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
  <br />
  住所１：<input type="text" name="address1">
  <br />
  住所２：<input type="text" name="address2">
  <br />

  パスワード：<input type="password" name="password">
  <br />
  <!--  密码要验证password_confirmation-->
  パスワード確認：<input type="password" name="password_confirmation">
  <br />

  <input type="submit" value="送信">

</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("users.layouts.app", array("title" => "会員新規登録"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/users/add.blade.php ENDPATH**/ ?>