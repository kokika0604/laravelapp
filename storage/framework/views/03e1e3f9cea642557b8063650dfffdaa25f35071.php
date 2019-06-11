<?php $__env->startSection("content"); ?>
<h1>会員新規登録</h1>
<form method="post" action="<?php echo e(route('post_user_add')); ?>">
  <?php echo csrf_field(); ?>
  email:  <input type="text" name="email" value="<?php echo e(old('email')); ?>">
  <?php if($errors->has("email")): ?>
    <p><?php echo e($errors->first("email")); ?></p>
  <?php endif; ?>
  <br>
  名前:   <input type="text" name="name" value="<?php echo e(old('name')); ?>">
  <?php if($errors->has("name")): ?>
    <p><?php echo e($errors->first("name")); ?></p>
  <?php endif; ?>
  <br>
  電話番号:<input type="text" name="phone" value="<?php echo e(old('phone')); ?>">
  <?php if($errors->has("phone")): ?>
    <p><?php echo e($errors->first("phone")); ?></p>
  <?php endif; ?>
  <br>
  郵便番号:<input type="text" name="postcode" value="">
  <br>
  都道府県：<select name="mtb_prefecture_id">
    <option value="">都道府県を選択して下さい。</option>
    <?php $__currentLoopData = $mtb_prefectures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mtb_prefecture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($mtb_prefecture->id); ?>"><?php echo e($mtb_prefecture->value); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
  <br>
  住所１:  <input type="text" name="address1">
  <br>
  住所２:  <input type="text" name="address2">
  <br>
  パスワード:<input type="password" name="password" value="<?php echo e(old('password')); ?>" >
  <br>
  パスワード確認:<input type="password" name="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>">
  <br>
  <input type="submit" name="送信">
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("user.layouts.app", array("title" => "会員新規登録"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/user/add.blade.php ENDPATH**/ ?>