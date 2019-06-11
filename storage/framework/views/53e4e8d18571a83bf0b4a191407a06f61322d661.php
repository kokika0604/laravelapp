<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(route('get_restaurant_mypage')); ?>" style="float:right">マイページ</a><br><br>

    <?php if(count($item->pics)>0): ?>
        <table class="table table-responsive table-striped table-hover">
            <caption><p style="float:left">店舗写真</p></caption>
            <tr>
                <th>画像</th>
                <th style="width:200">ランク</th>
                <th style="width:200">メイン画像</th>
                <td style="width:150"></td>
                <td style="width:150"></td>
            </tr>

            <?php $__currentLoopData = $item->pics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if(isset($action) and $action=='edit' and $request->id==$pic->id): ?>
                    <?php echo $__env->make('restaurant.parts.pic_edit_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php else: ?>
                <tr>
                    <td><img src="<?php echo e(URL::asset($pic->pic)); ?>" style="width:50%"></td>
                    <td><?php echo e($pic->rank); ?></td>
                    <td><?php echo e($pic->main_flg=='1'?'はい':'いえ'); ?></td>
                    <td><a href="<?php echo e(route('get_restaurant_pic_edit',['id'=>$pic->id])); ?>">編集</a></td>
                    <td><a href="<?php echo e(route('get_restaurant_pic_delete',['id'=>$pic->id])); ?>">削除</a></td>
                </tr>
                <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </table>
    <?php else: ?>
        <h4>結果なし</h4>
    <?php endif; ?>
    <a href="<?php echo e(route('get_restaurant_pic_add')); ?>" style="float:right">+追加</a><br>


    <?php if(isset($action) and $action=='add'): ?>
        <?php echo $__env->make('restaurant.parts.pic_add_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <br>

    <a href="<?php echo e(route('get_restaurant_info')); ?>" style="float:right">基本情報へ</a></br></br>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('restaurant.layouts.app',['title'=>'店舗写真'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/restaurant/pic.blade.php ENDPATH**/ ?>