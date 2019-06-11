<?php $__env->startSection('content'); ?>

    <div>

        <div>
            <form action="<?php echo e(route('get_homepage')); ?>" method="get">
                <?php echo csrf_field(); ?>
                <input type="text" name="keyword" value="<?php echo e(app('request')->input('keyword')); ?>" placeholder="店舗を探す" /><br>
                <b>カテゴリ：</b>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <input type="checkbox" name="category_ids[]" value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <br>
                <b>タグ：</b>
                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <input type="checkbox" name="tag_ids[]" value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <br>
                <input type="submit"  value="search">
            </form>
        </div>


              <div class="container">
                  <div class="row" >
                      <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="col-xs-6 col-sm-3" style="background-color: #dedef8;box-shadow: inset 1px -1px 1px #444,inset -1px 1px 1px #444;margin-top:1px; padding-top:8px">
                              <div style="height:200;width:200;margin:20px">
                                  <a href="">
                                      <?php $picaddress="local/nothing.jpg";?>
                                      <?php if(isset($restaurant->pics)): ?>
                                          <?php $__currentLoopData = $restaurant->pics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <?php if($pic->main_flg=='1'): ?>
                                                  <?php $picaddress=$pic->pic; ?>
                                              <?php endif; ?>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      <?php endif; ?>
                                    <img src="<?php echo e(asset("storage/$picaddress")); ?>" alt="restaurant_pics" width="100%">
                                  </a>
                              </div>
                              <table>
                                  <tr>
                                      <th>店名</th>
                                      <td><?php echo e($restaurant->name); ?></td>
                                  </tr>
                                  <tr>
                                    <th>ランチ予算</th>
                                    <td><?php echo e($restaurant->lunch_low_cost); ?> ~ <?php echo e($restaurant->lunch_high_cost); ?>円/人</td>
                                  </tr>
                                  <tr>
                                    <th>コース予算</th>
                                    <td><?php echo e($restaurant->course_low_cost); ?> ~ <?php echo e($restaurant->course_high_cost); ?>円/人
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
                                      <td><?php echo e(substr($restaurant->reviews->avg('rating'),0,3)); ?></td>
                                  </tr>
                          </table>
                      </div>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
              </div>

              <?php echo e($restaurants->links()); ?>



              
   </div>















<?php $__env->stopSection(); ?>

<?php echo $__env->make('restaurant.layouts.app',['title'=>'ホーム'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/homepage.blade.php ENDPATH**/ ?>