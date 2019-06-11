<html>
<body>

  <?php if(isset($items)): ?>
    <table>
      <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($item->id); ?></td>
        <td><?php echo e($item->value); ?></td>
        <td><?php echo e($item->rank); ?></td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  <?php endif; ?>
  <form action="/prefecture/find" method="POST">
    <?php echo e(csrf_field()); ?>

    id:<input type="text" name="id" value="<?php echo e($id); ?>">
    <input type="submit">
  </form>
 
</body>
</html>
<?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/hello/find.blade.php ENDPATH**/ ?>