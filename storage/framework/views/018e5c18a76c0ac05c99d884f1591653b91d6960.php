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
            <span id="message"></span>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo e($paymentdetails->payment_name); ?></h4>
                    <div class="basic-form">
                        <form action="<?php echo e(URL::to('admin/payment/update')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" class="form-control" value="<?php echo e($paymentdetails->id); ?>">
                            <?php if(in_array($paymentdetails->id,array(3,4,5,6))): ?>
                                <div class="form-group">
                                    <label><?php echo e(trans('labels.environment')); ?></label>
                                    <select id="environment" name="environment" class="form-control">
                                        <option selected="selected" value=""><?php echo e(trans('labels.select')); ?></option>
                                        <option value="0" <?php echo e($paymentdetails->environment == 0  ? 'selected' : ''); ?>><?php echo e(trans('labels.production')); ?></option>
                                        <option value="1" <?php echo e($paymentdetails->environment == 1  ? 'selected' : ''); ?>><?php echo e(trans('labels.sandbox')); ?></option>
                                    </select>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label><?php echo e(trans('labels.currency')); ?></label>
                                        <input type="text" name="currency" id="currency_code" class="form-control" placeholder="<?php echo e(trans('labels.currency')); ?>" value="<?php echo e($paymentdetails->currency); ?>">
                                    </div>
                                </div>
                                <?php if( strtolower($paymentdetails->payment_name) == 'flutterwave'): ?>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label><?php echo e(trans('labels.encryption_key')); ?></label>
                                        <input type="text" name="encryption_key" class="form-control" placeholder="<?php echo e(trans('labels.encryption_key')); ?>" value="<?php echo e($paymentdetails->encryption_key); ?>">
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label><?php echo e(trans('labels.test_public_key')); ?></label>
                                        <input type="text" name="test_public_key" class="form-control" placeholder="<?php echo e(trans('labels.test_public_key')); ?>" value="<?php echo e($paymentdetails->test_public_key); ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><?php echo e(trans('labels.test_secret_key')); ?></label>
                                        <input type="text" name="test_secret_key" class="form-control" placeholder="<?php echo e(trans('labels.test_secret_key')); ?>" value="<?php echo e($paymentdetails->test_secret_key); ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label><?php echo e(trans('labels.live_public_key')); ?></label>
                                        <input type="text" name="live_public_key" class="form-control" placeholder="<?php echo e(trans('labels.live_public_key')); ?>" value="<?php echo e($paymentdetails->live_public_key); ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><?php echo e(trans('labels.live_secret_key')); ?></label>
                                        <input type="text" name="live_secret_key" class="form-control" placeholder="<?php echo e(trans('labels.live_secret_key')); ?>" value="<?php echo e($paymentdetails->live_secret_key); ?>">
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label><?php echo e(trans('labels.image')); ?></label>
                                    <input type="file" name="image" class="form-control">
                                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"> <?php echo e($message); ?> </span> <br> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <img src="<?php echo e(Helper::image_path($paymentdetails->image)); ?>" alt="" class='img-fluid rounded hw-50 mt-1'>
                                </div>
                            </div>
                            <button class="btn btn-primary" <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                            <a href="<?php echo e(URL::to('admin/payment')); ?>" class="btn btn-dark"><?php echo e(trans('labels.cancel')); ?></a>
                        </form>
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
<?php echo $__env->make('admin.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/payment/manage-payment.blade.php ENDPATH**/ ?>