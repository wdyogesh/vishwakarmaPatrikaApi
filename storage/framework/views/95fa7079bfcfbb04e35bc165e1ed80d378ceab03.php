<?php if(count($getdriverlist) > 0): ?>
    <div class="row">
        <?php $__currentLoopData = $getdriverlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mt-4 mb-2">
                <div class="card card-section text-center">
                    <img src="<?php echo e(Helper::image_path($driver->profile_image)); ?>" class="listing-view-image mx-auto" alt="...">
                    <div class="card-body py-3">
                        <h6 class="card-title fw-bold mb-2"><?php echo e($driver->name); ?></h6>
                        <div class="item-details px-2">
                            <div class="d-flex justify-content-between"><?php echo e(trans('labels.mobile')); ?> <span><?php echo e($driver->mobile); ?></span></div>
                            <div class="d-flex justify-content-between"><?php echo e(trans('labels.email')); ?> <span><?php echo e($driver->email); ?></span></div>
                        </div>
                    </div>
                    <div class="card-footer py-0">
                        <div class="row justify-content-center">
                            <?php if($driver->is_available == 1): ?>
                                <a class="btn text-success d-grid" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="StatusUpdate('<?php echo e($driver->id); ?>','2','<?php echo e(URL::to('admin/driver/status')); ?>')" <?php endif; ?>>
                                    <i class="fa fa-check"></i><small><?php echo e(trans('labels.status')); ?></small>
                                </a>
                            <?php else: ?>
                                <a class="btn text-danger d-grid" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="StatusUpdate('<?php echo e($driver->id); ?>','1','<?php echo e(URL::to('admin/driver/status')); ?>')" <?php endif; ?>>
                                    <i class="fa fa-close"></i><small><?php echo e(trans('labels.status')); ?></small>
                                </a>
                            <?php endif; ?>
                            <a class="btn text-info d-grid" href="<?php echo e(URL::to('admin/driver-'.$driver->id)); ?>">
                                <i class="fa fa-edit"></i><small><?php echo e(trans('labels.update')); ?></small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <?php echo e($getdriverlist->links()); ?>

        </div>
    </div>
<?php else: ?>
<?php echo $__env->make('admin.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/driver/card-view.blade.php ENDPATH**/ ?>