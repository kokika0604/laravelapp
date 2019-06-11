<?php $__env->startSection("content"); ?>
<h1>個人情報編集</h1>
<form method="post" action="<?php echo e(route('post_user_edit')); ?>" class="form-horizontal" role="form">
    <div class="form-group">
  <?php echo csrf_field(); ?>
  email:  <input type="text" name="email" value="<?php echo e($user->email); ?>">
  <?php if($errors->has("email")): ?>
    <p><?php echo e($errors->first("email")); ?></p>
  <?php endif; ?>
  <br>
  名前:   <input type="text" name="name" value="<?php echo e($user->name); ?>">
  <?php if($errors->has("name")): ?>
    <p><?php echo e($errors->first("name")); ?></p>
  <?php endif; ?>
  <br>
  電話番号:<input type="text" name="phone" value="<?php echo e($user->phone); ?>">
  <?php if($errors->has("phone")): ?>
    <p><?php echo e($errors->first("phone")); ?></p>
  <?php endif; ?>
  <br>
  郵便番号:<input type="text" name="postcode" value="<?php echo e($user->postcode); ?>">
  <br>
  都道府県：<select name="mtb_prefecture_id">
       <option value="" >選択してください</option>
       <?php $selected_prefecture=old('mtb_prefecture_id',$user->mtb_prefecture_id) ?>
       <?php $__currentLoopData = $mtb_prefectures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mtb_prefecture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <option value="<?php echo e($mtb_prefecture->id); ?>" <?php if($selected_prefecture==$mtb_prefecture->id): ?><?php echo e('selected'); ?><?php endif; ?>>
               <?php echo e($mtb_prefecture->value); ?></option>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
  <br>
  住所１:  <input type="text" name="address1" value="<?php echo e($user->address1); ?>">
  <br>
  住所２:  <input type="text" name="address2" value="<?php echo e($user->address2); ?>">
  <br>
  古いパスワード:<input type="password" name="oldpassword" >
  <br>
  新しいパスワード:<input type="password" name="newpassword">
  パスワード確認:<input type="password" name="password_confirmation" >
  <br>
  <input type="submit" name="送信">
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("user.layouts.app", array("title" => "個人情報編集"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/user/edit.blade.php ENDPATH**/ ?>