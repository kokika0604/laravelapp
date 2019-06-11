<div class="col-xs-6 col-sm-3" style="background-color: #dedef8;box-shadow: inset 1px -1px 1px #444,inset -1px 1px 1px #444;margin-top:1px; padding-top:8px">
    <?php $main_pic=null ?>
    <?php $__currentLoopData = $restaurant->pics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <?php if($pic->main_flg=='1'): ?>
           <?php $main_pic=$pic->pic ?>
       <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <img src="<?php echo e(asset("storage/$main_pic")); ?>" alt="restaurant_pics" width="200" height="150">
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

        <?php $ratings=array(); ?>
        <?php $__currentLoopData = $restaurant->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($review->deleted_at==null): ?>
                <?php $ratings[]=$review->rating;?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <td><?php echo e(count($ratings)>0?substr(array_sum($ratings)/count($ratings),0,3):'なし'); ?></td>
    </tr>
</table>
</div>
<?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/user/subviews/restaurants_info.blade.php ENDPATH**/ ?>