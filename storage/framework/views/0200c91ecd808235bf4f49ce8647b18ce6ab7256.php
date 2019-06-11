<html>
<head>
  <meta charset="utf-8">
</head>
<body>
    
    <?php echo e($msg); ?>

    <form action="/form" method="post">
      <?php echo e(csrf_field()); ?>

      <input type="text" name="msg">
      <input type="submit" >
    </form>
</body>
</html>
<?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/hello/hello.blade.php ENDPATH**/ ?>