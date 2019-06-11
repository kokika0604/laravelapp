<form action="<?php echo e(route('get_restaurant_pic_add')); ?>" method="post" enctype="multipart/form-data">
    <table class="table table-responsive table-striped table-hover">
        <?php echo csrf_field(); ?>
        <tr>
            <td ><input type="file" name="pic" ></td>
            <td>
                ランク：<select name="rank"><option value="">未選択</option>
                <?php for($i=1;$i<=5;$i++): ?>
                    <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                <?php endfor; ?>
                </select>
            </td>
            <td>メイン画像：<select name="main_flg"><option value="0" selected>いえ</option><option value="1">はい</option></selected></td>
            <td><input type="submit" value="保存"></td>
        </tr>
    </table>
</form>
    <?php if(count($errors)>0): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/restaurant/parts/pic_add_form.blade.php ENDPATH**/ ?>