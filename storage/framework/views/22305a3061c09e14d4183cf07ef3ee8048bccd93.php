<?php $__env->startSection("content"); ?>
<!-- <caption>個人情報</caption> -->
<table class = "table table-striped table-hover">
    <caption>個人情報</caption>
    <thead>
        <tr>
            <th>email</th>
            <th>名前</th>
            <th>電話番号</th>
            <th>郵便番号</th>
            <th>住所</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo e($user->email); ?></td>
            <td><?php echo e($user->name); ?></td>
            <td><?php echo e($user->phone); ?></td>
            <td><?php echo e($user->postcode); ?></td>
            <td><?php echo e($mtb_prefecture." ".$user->address1."".$user->address2); ?></td>
        </tr>
    </tbody>
</table>
<a href="edit">編集</a>
<br>
<a href="mypage">mypageへ</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("user.layouts.app", array("title" => "個人情報"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/user/info.blade.php ENDPATH**/ ?>