<?php $__env->startSection('content'); ?>
  <table class="table table-responsive table-striped table-hover">
    <caption>店舗情報</caption>
    <tr>
      <th  style="width:800">メールアドレス:</th>
      <td  style="width:600"><?php echo e($item->email); ?></td>
    </tr>
    <tr>
      <th>店舗名:</th>
      <td><?php echo e($item->name); ?></td>
    </tr>
    <tr>
      <th>電話番号:</th>
      <td><?php echo e(substr($item->phone,0,2)."-".substr($item->phone,2,4)."-".substr($item->phone,6,4)); ?></td>
    </tr>
    <tr>
      <th>郵便番号:</th>
      <td><?php echo e(substr($item->postcode,0,3)."-".substr($item->postcode,3,4)); ?></td>
    </tr>
    <tr>
      <th>住所（都道府県）:</th>
      <td></td>
    </tr>
    <tr>
      <th>営業時間:</th>
      <td><input type="text" name="business_hour" value="<?php echo e(old('business_hour')); ?>"></td>
    </tr>


  </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('restaurants.layouts.app',['title'=>'店舗情報'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/restaurants/info.blade.php ENDPATH**/ ?>