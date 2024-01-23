<?php $__env->startSection('content'); ?>
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/home')); ?>"><?php echo e(trans('labels.dashboard')); ?></a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"><?php echo e(trans('labels.users')); ?></a></li>
        </ol>
    </div>
</div>
<!-- row -->
<div class="container-fluid">
    <section class="users-section">
        <?php echo $__env->make('admin.users.card-view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
</div>
<!-- #/ container -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url('resources/views/admin/users/users.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\mywinkel\resources\views/admin/users/users.blade.php ENDPATH**/ ?>