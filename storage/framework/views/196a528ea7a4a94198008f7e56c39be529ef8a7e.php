<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(route('get_restaurant_mypage')); ?>" style="float:right">マイページ</a><br><br>

    <?php if(count($item->menus)>0): ?>
        <table class="table table-responsive table-striped table-hover" style="width:1000">
            <caption><p style="float:left">メニュー一覧</p></caption>
            <tr>
                <th style="width:20%">画像</th>
                <th style="width:12%">料理名</th>
                <th style="width:12%">価格（円）</th>
                <th style="width:12%">税込み</th>
                <th style="width:20%">説明</th>
                <th style="width:12%"> </th>
                <th style="width:12%"></th>
            </tr>

            <?php $__currentLoopData = $item->menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if(isset($action) and $action=='edit' and $request->id==$menu->id): ?>
                    <?php echo $__env->make('restaurant.parts.menu_edit_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php else: ?>
                <tr style="height:120">
                    <td><?php if(isset($menu->pic)): ?><img src="<?php echo e(URL::asset("storage/$menu->pic")); ?>" style="width:140;height:100" onclick='show(this)'><?php else: ?><?php echo e("なし"); ?><?php endif; ?></td>
                    <td><?php echo e($menu->name); ?></td>
                    <td><?php echo e($menu->price); ?></td>
                    <td><?php echo e($menu->tax_excluded_flg=='0'?'はい':'いえ'); ?></td>
                    <td><?php echo e($menu->description); ?></td>
                    <td><a href="<?php echo e(route('get_restaurant_menu_edit',['id'=>$menu->id])); ?>">編集</a></td>
                    <td><a href="<?php echo e(route('get_restaurant_menu_delete',['id'=>$menu->id])); ?>">削除</a></td>
                </tr>
                <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </table>
    <?php else: ?>
        <h4>結果なし</h4>
    <?php endif; ?>
    <a href="<?php echo e(route('get_restaurant_menu_add')); ?>" style="float:right">+追加</a><br>


    <?php if(isset($action) and $action=='add'): ?>
        <?php echo $__env->make('restaurant.parts.menu_add_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <br>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('restaurant.layouts.app',['title'=>'メニュー'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/restaurant/menu.blade.php ENDPATH**/ ?>