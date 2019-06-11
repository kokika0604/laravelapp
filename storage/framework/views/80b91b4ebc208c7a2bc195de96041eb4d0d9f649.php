<html>
<head>
  <meta charset="utf-8">
</head>
<body>
    
    <?php if(isset($_POST['msg'])): ?>
      <?php echo e($msg); ?>

    <?php else: ?>
    <?php echo e($msg); ?>

    <form action="/form" method="post">
      <?php echo e(csrf_field()); ?>

      <input type="text" name="msg">
      <input type="submit" >
    </form>
    <?php $__currentLoopData = $abc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <p>no.<?php echo e($loop->iteration); ?> <?php echo e($a); ?></p><br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
</body>
</html>
<?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/hello/form.blade.php ENDPATH**/ ?>