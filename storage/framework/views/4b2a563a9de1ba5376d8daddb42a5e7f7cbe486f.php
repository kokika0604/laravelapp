<!--内容 引用 -->
<?php $__env->startSection("content"); ?>

<h1>ご登録ありがとうございます。</h1>
<p>あなたの情報は以下の通りです。</p>
<table>
    <tr>
        <td>名前</td>
        <td><?php echo e($info->name); ?></td>
    </tr>
    <tr>
        <td>email</td>
        <td><?php echo e($info->email); ?></td>
    </tr>
    <tr>
        <td>phone</td>
        <td><?php echo e($info->phone); ?></td>
    </tr>
    <tr>
        <td>postcode</td>
        <td><?php echo e($info->postcode); ?></td>
    </tr>
</table>



<?php $__env->stopSection(); ?>
<?php echo $__env->make("user.layouts.app", array("title" => "ログイン"), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\gyh19\Desktop\laravelapp\resources\views/user/mail.blade.php ENDPATH**/ ?>