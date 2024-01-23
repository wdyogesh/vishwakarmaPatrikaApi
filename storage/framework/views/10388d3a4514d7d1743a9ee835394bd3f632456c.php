<?php $__env->startSection('content'); ?>
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/home')); ?>"><?php echo e(trans('labels.dashboard')); ?></a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"><?php echo e(trans('labels.employee')); ?></a></li>
        </ol>
        <a href="<?php echo e(URL::to('admin/employee/add')); ?>" class="btn btn-primary"><?php echo e(trans('labels.add_new')); ?></a>
    </div>
</div>
<div class="container-fluid">
    <section class="employee-section">
        <?php echo $__env->make('admin.employee.card-view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url('resources/views/admin/employee/employee.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/employee/index.blade.php ENDPATH**/ ?>