<div class="col-xs-6 col-sm-3" style="background-color: #dedef8;box-shadow: inset 1px -1px 1px #444,inset -1px 1px 1px #444;margin-top:1px; padding-top:8px">
    <a href="">
        <img src="<?php echo e(asset('img/Restaurant.jpg')); ?>" alt="restaurant_pics" width="100%">
    </a>
    <table>
    <tr>
        <th>店名</th>
        <td><?php echo e($restaurant->name); ?></td>
    </tr>

    <tr>
      <th>ランチ予算</th>
      <td>
          <?php echo e($restaurant->lunch_low_cost); ?> ~ <?php echo e($restaurant->lunch_high_cost); ?>円/人
      </td>
    </tr>
    <tr>
      <th>コース予算</th>
      <td>
          <?php echo e($restaurant->course_low_cost); ?> ~ <?php echo e($restaurant->course_high_cost); ?>円/人
      </td>
    </tr>
    <tr>
      <th>タグ</th>
      <td>
        <?php $__currentLoopData = $restaurant->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php echo e($tag->name); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </td>
    </tr>
    <tr>
        <th>評価</th>
        <td>3.5</td>
    </tr>
</table>
</div>
<?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/subviews/restaurant_info.blade.php ENDPATH**/ ?>