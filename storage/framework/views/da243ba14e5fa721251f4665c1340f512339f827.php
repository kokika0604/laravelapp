<form action="<?php echo e(route('post_restaurant_pic_edit',['id'=>$pic->id])); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo e($pic->id); ?>">

        <?php echo csrf_field(); ?>
        <tr style="height:150">
            <td ><img src="<?php echo e(URL::asset("storage/$pic->pic")); ?>" style="width:180;height:140" onclick='show(this)'></td>
            <td>
                <select name="rank"><option value="">未選択</option>
                <?php $selected_rank=old('rank',$pic->rank) ?>
                <?php for($i=1;$i<=5;$i++): ?>
                    <option value="<?php echo e($i); ?>" <?php if($selected_rank==$i): ?><?php echo e('selected'); ?><?php endif; ?>><?php echo e($i); ?></option>
                <?php endfor; ?>
                </select>
            </td>
            <td><select name="main_flg">
                <?php $selected_main_flg=old("main_flg",$pic->main_flg) ?>
                <option value="0" <?php if($selected_main_flg=='0'): ?><?php echo e('selected'); ?><?php endif; ?>>いえ</option>
                <option value="1" <?php if($selected_main_flg=='1'): ?><?php echo e('selected'); ?><?php endif; ?>>はい</option></selected>
            </td>
            <td><input type="file" name="pic"/></td>
            <td><input type="submit" value="保存"></td>
        </tr>

        <?php if(count($errors)>0): ?>
            <tr><td colspan='6'>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($error." "); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td></tr>
        <?php endif; ?>
</form>
<?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/restaurant/parts/pic_edit_form.blade.php ENDPATH**/ ?>