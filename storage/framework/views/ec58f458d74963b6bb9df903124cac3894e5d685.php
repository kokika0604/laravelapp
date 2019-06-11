<html>
<head>
  <title><?php echo e($title); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <script type="text/javascript">
      function show(pic){

          sw = document.documentElement.clientWidth;
          sh = document.documentElement.clientHeight;

          gdiv = document.createElement('div');
          gdiv.id = 'gray';
          gdiv.style.height = sh+'px';
          gdiv.style.width = sw+'px';
          document.body.appendChild(gdiv);

          gdiv.onclick = function(){
          document.body.removeChild(this);
          document.body.removeChild(oimg);
          }

          oimg = document.createElement('img');
          oimg.src = pic.src;
          oimg.height= 450 ;
          oimg.width=  600 ;
          oimg.style.position = 'absolute';
          oimg.style.top = (sh-window.screen.height)+(window.screen.height-oimg.height)/2+50+'px';
          oimg.style.left= (window.screen.width-oimg.width)/2+'px';
          document.body.appendChild(oimg);

      }

      $(document).ready(function(){
        $("tr.fold").click(function(){
          $("tr.toggle").toggle();
        });
      });
      $( function() {
          $( "#sortable" ).sortable();
          $( "#sortable" ).disableSelection();
      } );

  </script>
  <style>
  span {color:#FF0000;}
  .toggle { display:none;}
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #gray{
      background : black;
      opacity : 0.55;
      filter : alpha(opacity=55);
      position : absolute;
      top : 0px;
      left : 0px;
  }


  </style>
</head>
<body>
  <div style="width:960px;margin:auto">

          <?php echo $__env->yieldContent('content'); ?>

  </div>

</body>
</html>
<?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/user/layouts/app.blade.php ENDPATH**/ ?>