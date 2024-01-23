<?php if(count($getusers) > 0): ?>

    <div class="row">

        <?php $__currentLoopData = $getusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-lg-3 col-md-4 col-sm-6 mt-4 mb-2">

                <div class="card card-section text-center">

                    <img src="<?php echo e(Helper::image_path($users->profile_image)); ?>" class="listing-view-image mx-auto" alt="...">

                    <div class="card-body py-3">

                        <h6 class="card-title fw-bold mb-2"><?php echo e($users->name); ?></h6>

                        <div class="item-details px-2">

                            <div class="d-flex justify-content-between"><?php echo e(trans('labels.referral_code')); ?> <span><?php echo e($users->referral_code); ?></span></div>

                            <div class="d-flex justify-content-between"><?php echo e(trans('labels.mobile')); ?> <span><?php echo e($users->mobile); ?></span></div>

                            <div class="d-flex justify-content-between"><?php echo e(trans('labels.email')); ?> <span><?php echo e($users->email); ?></span></div>

                            <div class="d-flex justify-content-between"><?php echo e(trans('labels.login_with')); ?> <span><?php if($users->login_type == "facebook"): ?> <?php echo e(trans('labels.facebook')); ?> <?php elseif($users->login_type == "google"): ?> <?php echo e(trans('labels.google')); ?> <?php else: ?> <?php echo e(trans('labels.email')); ?><?php endif; ?></span></div>

                            <div class="d-flex justify-content-between"><?php echo e(trans('labels.otp_status')); ?> <span><?php echo e($users->is_verified == "1" ? trans('labels.verified') : trans('labels.unverified')); ?></span></div>

                        </div>

                    </div>

                    <div class="card-footer py-0">

                        <div class="row justify-content-center">

                            <?php if($users->is_available == 1): ?>

                                <a class="btn text-success d-grid" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="StatusUpdate('<?php echo e($users->id); ?>','2','<?php echo e(URL::to('admin/users/status')); ?>')" <?php endif; ?>>

                                    <i class="fa fa-check"></i><small><?php echo e(trans('labels.status')); ?></small>

                                </a>

                            <?php else: ?>

                                <a class="btn text-danger d-grid" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="StatusUpdate('<?php echo e($users->id); ?>','1','<?php echo e(URL::to('admin/users/status')); ?>')" <?php endif; ?>>

                                    <i class="fa fa-close"></i><small><?php echo e(trans('labels.status')); ?></small>

                                </a>

                            <?php endif; ?>

                            <a class="btn text-info d-grid" href="<?php echo e(URL::to('admin/users-'.$users->id)); ?>">

                                <i class="fa fa-eye"></i><small><?php echo e(trans('labels.view')); ?></small>

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

    <div class="row">

        <div class="col-md-12 d-flex justify-content-center">

            <?php echo e($getusers->links()); ?>


        </div>

    </div>

<?php else: ?>

<?php echo $__env->make('admin.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endif; ?><?php /**PATH D:\XAMPP\htdocs\mywinkel\resources\views/admin/users/card-view.blade.php ENDPATH**/ ?>