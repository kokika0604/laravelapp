<html>
<head>
  <title><?php echo e($title); ?></title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  span {color:#FF0000;}
  </style>
</head>
<body>
  <div class="container">
    <div class="row" >
       <div class="col-xs-12 col-sm-8">

          <?php echo $__env->yieldContent('content'); ?>

       </div>
    </div>
  </div>

</body>
</html>
<?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/restaurants/layouts/app.blade.php ENDPATH**/ ?>