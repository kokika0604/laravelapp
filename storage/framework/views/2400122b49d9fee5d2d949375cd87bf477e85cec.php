    <?php if(count($item->pics)>0): ?>
        <table class="table table-responsive table-striped table-hover" style="width:1000">
            <caption><p style="float:left">店舗写真</p></caption>
            <thead>
                <tr>
                    <th style="width:30%">画像</th>
                    <th style="width:20%">ランク</th>
                    <th style="width:20%">メイン画像</th>
                    <th style="width:15%"></th>
                    <th style="width:15%"></th>
                </tr>
            </thead>
            <tbody id="sortable">

                <?php $__currentLoopData = $item->pics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if(isset($pic_action) and $pic_action=='edit' and $request->id==$pic->id): ?>
                        <?php echo $__env->make('restaurant.parts.pic_edit_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>


                    <tr  style="height:150">
                        <td style="width:300"><img src="<?php echo e(URL::asset("storage/$pic->pic")); ?>" style="width:180;height:140" onclick='show(this)'></td>
                        <td style="width:200"><?php echo e($pic->rank); ?></td>
                        <td style="width:200"><?php echo e($pic->main_flg=='1'?'はい':'いえ'); ?></td>
                        <td style="width:150"><a href="<?php echo e(route('get_restaurant_pic_edit',['id'=>$pic->id])); ?>">編集</a></td>
                        <td style="width:150"><a href="<?php echo e(route('get_restaurant_pic_delete',['id'=>$pic->id])); ?>">削除</a></td>
                    </tr>


                    <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    <?php else: ?>
        <h4>結果なし</h4>
    <?php endif; ?>
    <a href="<?php echo e(route('get_restaurant_pic_add')); ?>" style="float:right">+写真を追加</a><br>


    <?php if(isset($pic_action) and $pic_action=='add'): ?>
        <?php echo $__env->make('restaurant.parts.pic_add_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <br>
<?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/restaurant/parts/pic.blade.php ENDPATH**/ ?>