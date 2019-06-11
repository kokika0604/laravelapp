<html>
<body>
  <table>
    <tr>
      <th>no.</th>
      <th>name</th>
      <th>rank</th>
    </tr>

      <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($item->id); ?></td>
          <td><?php echo e($item->value); ?></td>
          <td><?php echo e($item->rank); ?></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </table>
</body>
</html>
<?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/mtb_prefectures/index.blade.php ENDPATH**/ ?>