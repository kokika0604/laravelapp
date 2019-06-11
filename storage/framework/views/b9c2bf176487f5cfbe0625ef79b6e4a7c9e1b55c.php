
  <table class="table table-responsive table-striped table-hover">
    <caption>店舗情報</caption>
    <tr>
      <th  style="width:400">メールアドレス:</th>
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
      <th>住所:</th>
      <td><?php echo e($item->mtb_prefecture->value." ".$item->address1." ".$item->address2); ?></td>
    </tr>
    <tr>
      <th>営業時間:</th>
      <td><?php echo e($item->business_hour); ?></td>
    </tr>
    <tr>
      <th>ランチ予算:</th>
      <td><?php echo e(isset($item->lunch_low_cost)?$item->lunch_low_cost:''); ?>~<?php echo e(isset($item->lunch_high_cost)?$item->lunch_high_cost:''); ?>円/人</td>
    </tr>
    <tr>
      <th>コース予算:</th>
      <td><?php echo e(isset($item->course_low_cost)?$item->course_low_cost:''); ?>~<?php echo e(isset($item->course_high_cost)?$item->course_high_cost:''); ?>円/人</td>
    </tr>

    <tr class="fold" onclick="changetext()"><td></td><td><a><b id="fold">さらに表示▼</b></a></td></tr>
    <script>
        function changetext(){
        var text = document.getElementById('fold').innerText;
        var text1 = '折り畳み▲';
        var text2 = 'さらに表示▼';
        if (text == text1){
            text = text2;
        } else {
            text = text1;
        }
         document.getElementById('fold').innerText= text;
    }
    </script>

    <tr class="toggle">
      <th>一言アピール:</th>
      <td><?php echo e(isset($item->short_description)?$item->short_description:'未入力'); ?></td>
    </tr>
    <tr class="toggle">
      <th>具体的な紹介:</th>
      <td><?php echo nl2br(e(isset($item->long_description)?$item->long_description:'未入力')); ?></td>
    </tr>
    <tr class="toggle">
      <th>カテゴリ:</th>
      <td><?php if(isset($item->categories)): ?> <?php $__currentLoopData = $item->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($category->name." "); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php else: ?> <?php echo e('なし'); ?><?php endif; ?></td>
    </tr>
    <tr class="toggle">
      <th>タグ:</th>
      <td><?php if(isset($item->tags)): ?> <?php $__currentLoopData = $item->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($tag->name." "); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php else: ?> <?php echo e('なし'); ?><?php endif; ?></td>
    </tr>
  </table>

  <a href="<?php echo e(route('get_restaurant_info_edit')); ?>" style="float:right">基本情報を編集</a><br><br>
<?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/restaurant/parts/basic_info.blade.php ENDPATH**/ ?>