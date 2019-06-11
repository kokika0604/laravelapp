<html>
<body>
<?php if(count($errors)>0): ?>
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p><?php echo e($error); ?></p>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<table>
  <form action="/prefecture/add" method="POST">
    <?php echo e(csrf_field()); ?>

    value:<input type="text" name="value" value="<?php echo e(old('value')); ?>"><br>
    rank:<input type="number" name="rank" value="<?php echo e(old('rank')); ?>"><br>
    <input type="submit">
  </form>



</body>
</html>
<?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/mtb_prefectures/add.blade.php ENDPATH**/ ?>