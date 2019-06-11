<?php $__env->startSection('content'); ?>
<p><span>*必須項目</span></p>
<form action="<?php echo e(route('post_restaurant_add')); ?>" method="post">
  <?php echo csrf_field(); ?>
  <table class="table table-responsive table-striped table-hover">
    <tr>
      <th  style="width:800">メールアドレス:<span>*</span></th>
      <td  style="width:600"><input type="text" name="email" value="<?php echo e(old('email')); ?>"></td>
    </tr>
      <?php if($errors->has('email')): ?>
        <tr><td></td><td><span><?php echo e($errors->first('email')); ?></td></tr></span>
      <?php endif; ?>
    <tr>
      <th>店舗名:<span>*</span></th>
      <td><input type="text" name="name" value="<?php echo e(old('name')); ?>"></td>
    </tr>
    <?php if($errors->has('name')): ?>
      <tr><td></td><td><span><?php echo e($errors->first('name')); ?></td></tr></span>
    <?php endif; ?>
    <tr>
      <th>電話番号:<span>*</span></th>
      <td><input type="text" name="phone1" value="<?php echo e(old('phone1')); ?>" style="width:2em">-
          <input type="text" name="phone2" value="<?php echo e(old('phone2')); ?>" style="width:4em">-
          <input type="text" name="phone3" value="<?php echo e(old('phone3')); ?>" style="width:4em"></td>
    </tr>
    <?php if($errors->has('phone')): ?>
      <tr><td></td><td><span><?php echo e($errors->first('phone')); ?></td></tr></span>
    <?php endif; ?>
    <tr>
      <th>郵便番号:<span>*</span></th>
      <td><input type="text" name="postcode1" value="<?php echo e(old('postcode1')); ?>" style="width:3em">-
          <input type="text" name="postcode2" value="<?php echo e(old('postcode2')); ?>" style="width:4em"></td>
    </tr>
    <?php if($errors->has('postcode')): ?>
      <tr><td></td><td><span><?php echo e($errors->first('postcode')); ?></td></tr></span>
    <?php endif; ?>
    <tr>
      <th>住所（都道府県）:<span>*</span></th>
      <td><select name="mtb_prefecture"><option value="">選択してください</option>
        <?php $selected_pre=old('mtb_prefecture','');?>
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($item->id); ?>" <?php if($selected_pre==$item->id){echo 'selected';}?> ><?php echo e($item->value); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select></td>
    </tr>
    <?php if($errors->has('mtb_prefecture')): ?>
      <tr><td></td><td><span><?php echo e($errors->first('mtb_prefecture')); ?></td></tr></span>
    <?php endif; ?>
    <tr>
      <th>住所（市区町村）:<span>*</span></th>
      <td><input type="text" name="address1" value="<?php echo e(old('address1')); ?>"></td>
    </tr>
    <?php if($errors->has('address1')): ?>
      <tr><td></td><td><span><?php echo e($errors->first('address2')); ?></td></tr></span>
    <?php endif; ?>
    <tr>
      <th>住所（そのほか）:<span>*</span></th>
      <td><input type="text" name="address2" value="<?php echo e(old('address2')); ?>"></td>
    </tr>
    <?php if($errors->has('address2')): ?>
      <tr><td></td><td><span><?php echo e($errors->first('address2')); ?></td></tr></span>
    <?php endif; ?>
    <tr>
      <th>営業時間:<span>*</span></th>
      <td><input type="text" name="business_hour" value="<?php echo e(old('business_hour')); ?>"></td>
    </tr>
    <?php if($errors->has('business_hour')): ?>
      <tr><td></td><td><span><?php echo e($errors->first('business_hour')); ?></td></tr></span>
    <?php endif; ?>
    <tr>
      <th>パスワード:<span>*</span></th>
      <td><input type="password" name="password"></td>
    </tr>
    <?php if($errors->has('password')): ?>
      <tr><td></td><td><span><?php echo e($errors->first('password')); ?></td></tr></span>
    <?php endif; ?>
    <tr>
      <th>もう一度入力してください: <span>*</span></th>
      <td><input type="password" name="password_confirmation"></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" value="送信"></td>
    </tr>
  </table>
</form>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('restaurant.layouts.app',['title'=>'店舗新規登録'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/restaurant/add.blade.php ENDPATH**/ ?>