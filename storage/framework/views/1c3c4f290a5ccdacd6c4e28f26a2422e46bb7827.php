<?php $__env->startSection('content'); ?>

          <h1>Welcome,<?php echo e($item->name); ?>!</h1><br><br>

          <div class="container">
              <div class="row">

                  <div  class="col-xs-12 col-sm-6">
                      <div style="margin-top:30px">
                          <a href="<?php echo e(route('get_restaurant_info')); ?>"><h4>店舗情報</h4></a><br>
                          <a href="<?php echo e(route('get_restaurant_menu')); ?>"><h4>メニュー一覧</h4></a><br>
                          <a href="<?php echo e(route('get_restaurant_review')); ?>"><h4>お客様からのレビュー</h4></a><br>
                          <a href="<?php echo e(route('get_restaurant_logout')); ?>"><h4>ログオフ</h4></a>
                      </div>
                  </div>

                  <div  class="col-xs-12 col-sm-6">
                      <div id="myCarousel" class="carousel slide" style="width:400;height:300;margin-bottom:100px" >
                        	<!-- 轮播（Carousel）指标 -->
                        	<ol class="carousel-indicators">
                        		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        		<li data-target="#myCarousel" data-slide-to="1"></li>
                        		<li data-target="#myCarousel" data-slide-to="2"></li>
                        	</ol>
                        	<!-- 轮播（Carousel）项目 -->
                        	<div class="carousel-inner">
                                <?php $pic_rank_1=$pic_rank_2=$pic_rank_3='../local/nothing.jpg';?>
                                <?php if(count($item->pics)>0): ?>
                                    <?php $__currentLoopData = $item->pics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($pic->rank==1): ?>
                                            <?php $pic_rank_1=$pic->pic;?>
                                        <?php elseif($pic->rank==2): ?>
                                            <?php $pic_rank_2=$pic->pic;?>
                                        <?php elseif($pic->rank==3): ?>
                                            <?php $pic_rank_3=$pic->pic;?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                        		<div class="item active" >
                        			<img src="<?php echo e(URL::asset("storage/$pic_rank_1")); ?>"  style="width:400;height:300" alt="First slide">
                        		</div>
                        		<div class="item" >
                        			<img src="<?php echo e(URL::asset("storage/$pic_rank_2")); ?>"   style="width:400;height:300" alt="Second slide">
                        		</div>
                        		<div class="item" >
                        			<img src="<?php echo e(URL::asset("storage/$pic_rank_3")); ?>"   style="width:400;height:300" alt="Third slide">
                        		</div>
                        	</div>
                        	<!-- 轮播（Carousel）导航 -->
                        	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        		<span class="sr-only">Previous</span>
                        	</a>
                        	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        		<span class="sr-only">Next</span>
                        	</a>
                        </div>
                    </div>

             </div>
        </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('restaurant.layouts.app',['title'=>'マイページ'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/restaurant/mypage.blade.php ENDPATH**/ ?>