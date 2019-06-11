<form action="<?php echo e(route('post_restaurant_menu_edit',['id'=>$menu->id])); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo e($menu->id); ?>">

        <?php echo csrf_field(); ?>
        <tr style="height:120">
            <td><?php if(isset($menu->pic)): ?><img src="<?php echo e(URL::asset("storage/$menu->pic")); ?>" style="width:140;height:100" onclick='show(this)'><?php else: ?><?php echo e('なし'); ?><?php endif; ?></td>
            <td><input type="text" name="name" value="<?php echo e(old('name',$menu->name)); ?>" style="width:100"/></td>
            <td><input type="text" name="price" value="<?php echo e(old('price',$menu->price)); ?>" style="width:100"/></td>
            <td><select name="tax_excluded_flg" >
                <?php $selected_flg=old("tax_excluded_flg",$menu->tax_excluded_flg) ?>
                <option value="0" <?php if($selected_flg=='0'): ?><?php echo e('selected'); ?><?php endif; ?>>はい</option>
                <option value="1" <?php if($selected_flg=='1'): ?><?php echo e('selected'); ?><?php endif; ?>>いえ</option></selected>
            </td>
            <td><textarea name="description"><?php echo e(old('description',$menu->description)); ?></textarea></td>
            <td><input type="file" name="pic" style="width:100"/>
            <td><input type="submit" value="保存"></td>
        </tr>

        <?php if(count($errors)>0): ?>
            <tr><td colspan='7'>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($error." "); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td></tr>
        <?php endif; ?>
</form>
<?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/restaurant/parts/menu_edit_form.blade.php ENDPATH**/ ?>