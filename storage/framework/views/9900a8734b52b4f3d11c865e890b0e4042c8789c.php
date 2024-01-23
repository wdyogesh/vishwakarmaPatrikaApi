<?php $__env->startSection('content'); ?>
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/home')); ?>"><?php echo e(trans('labels.dashboard')); ?></a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"><?php echo e(trans('labels.payment_methods')); ?></a></li>
        </ol>
    </div>
</div>
<!-- row -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo e(trans('labels.payment_methods')); ?></h4>
                    <div class="table-responsive" id="table-display">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(trans('labels.image')); ?></th>
                                    <th><?php echo e(trans('labels.name')); ?></th>
                                    <th><?php echo e(trans('labels.currency')); ?></th>
                                    <th><?php echo e(trans('labels.status')); ?></th>
                                    <th><?php echo e(trans('labels.action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $getpayment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($payment->id); ?></td>
                                    <td><img src="<?php echo e(Helper::image_path($payment->image)); ?>" alt="" class='img-fluid rounded hw-50'></td>
                                    <td><?php echo e($payment->payment_name); ?></td>
                                    <td>
                                        <?php if( strtolower($payment->payment_name) != 'cod' && strtolower($payment->payment_name) != 'wallet' ): ?>
                                            <?php echo e($payment->currency); ?>

                                        <?php else: ?>
                                            --
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($payment->is_available == '1'): ?>
                                            <a class="badge badge-success px-2 text-white" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="StatusUpdate('<?php echo e($payment->id); ?>','2','<?php echo e(URL::to('admin/payment/status')); ?>')" <?php endif; ?>><?php echo e(trans('labels.active')); ?></a>
                                        <?php else: ?>
                                            <a class="badge badge-danger px-2 text-white" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="StatusUpdate('<?php echo e($payment->id); ?>','1','<?php echo e(URL::to('admin/payment/status')); ?>')" <?php endif; ?>><?php echo e(trans('labels.deactive')); ?></a>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a class="badge badge-warning px-2 text-white" data-toggle="tooltip" href="<?php echo e(URL::to('admin/payment-'.$payment->id)); ?>" data-original-title="<?php echo e(trans('labels.view')); ?>"><?php echo e(trans('labels.view')); ?></a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url('resources/views/admin/payment/payment.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/payment/payment.blade.php ENDPATH**/ ?>