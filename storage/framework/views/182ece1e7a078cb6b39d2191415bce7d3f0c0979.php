<?php $__env->startSection('content'); ?>
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/home')); ?>"><?php echo e(trans('labels.dashboard')); ?></a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"><?php echo e(trans('labels.notification')); ?></a></li>
        </ol>
        <a href="<?php echo e(URL::to('admin/notification/add')); ?>" class="btn btn-primary"><?php echo e(trans('labels.send_notification')); ?></a>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <span id="success"></span>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo e(trans('labels.notification')); ?></h4>
                    <div class="table-responsive" id="table-display">
                        <?php echo $__env->make('admin.notification.notificationtable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/notification/notification.blade.php ENDPATH**/ ?>