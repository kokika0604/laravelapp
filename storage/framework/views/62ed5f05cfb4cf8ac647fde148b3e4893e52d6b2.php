<?php $__env->startSection('content'); ?>



      <a href="<?php echo e(route('get_restaurant_mypage')); ?>" style="float:right">マイページ</a><br><br>

      <h2>平均レーティング：<?php echo e(substr($avg_rating,0,3)); ?> 点 (<?php echo e($count_ratings); ?> 件)</h2><br><br>


        <h3 style="float:left;margin:0;padding-bottom:10px;border-bottom:solid #D3D3D3">レビュー(<?php echo e($count_reviews); ?>件)</h3>
        <select style="float:right" onchange="window.location=this.value">
            <option value="<?php echo e(route('get_restaurant_review',['order'=>null])); ?>">新しい順</option>
            <option value="<?php echo e(route('get_restaurant_review',['order'=>'highRating'])); ?>" <?php if($order=='highRating'): ?><?php echo e('selected'); ?><?php endif; ?>>レーティングの高い順</option>
            <option value="<?php echo e(route('get_restaurant_review',['order'=>'lowRating'])); ?>" <?php if($order=='lowRating'): ?><?php echo e('selected'); ?><?php endif; ?>>レーティングの低い順</option>
        </select>

        <br><br><br><br>

        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div style="border-bottom:solid #D3D3D3;margin-bottom:20px;padding-bottom:20px">
                  <h4><?php echo e($review->user->name); ?>さん</h4>
                  <?php for($i=1;$i<=$review->rating;$i++): ?>
                      <img src="<?php echo e(asset('local/star.png')); ?>" height="15" >
                  <?php endfor; ?>
                  <p style="color:grey"><?php echo e(date('Y/m/d H:i',strtotime($review->created_at))); ?></p>
                  <h4><?php echo e($review->review); ?></h4>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($reviews->links()); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('restaurant.layouts.app',['title'=>'レビュー'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/restaurant/review.blade.php ENDPATH**/ ?>