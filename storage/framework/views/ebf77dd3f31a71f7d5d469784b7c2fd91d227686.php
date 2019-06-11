<html>
<body>

<?php if(count($errors)>0): ?>
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p><?php echo e($error); ?></p>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<table>
  <form action="/prefecture/edit" method="POST">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name='id' value='<?php echo e($form->id); ?>'>
    value:<input type="text" name="value" value="<?php echo e(old('value')?old('value'):$form->value); ?>"><br>
    rank:<input type="text" name="rank" value="<?php echo e(old('rank')?old('rank'):$form->rank); ?>"><br>
    <input type="submit">
  </form>



</body>
</html>
<?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/mtb_prefectures/edit.blade.php ENDPATH**/ ?>