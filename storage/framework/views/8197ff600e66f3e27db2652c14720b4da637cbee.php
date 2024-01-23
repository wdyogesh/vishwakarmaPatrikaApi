<?php if(count($getreview)>0): ?>
    <div class="row">
        <?php $__currentLoopData = $getreview; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reviews): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-sm-6 mt-4 mb-2 d-flex">
                <div class="card w-100">
                    <div class="card-body pb-0">
                        <div class="media align-items-center mb-2">
                            <img class="rounded hw-50 mr-3" src="<?php echo e($reviews['user_info']->profile_image); ?>" alt="">
                            <div class="media-body">
                                <h3 class="mb-0"><?php echo e($reviews['user_info']->name); ?> <small class="float-right"><i class="fa fa-star text-warning"></i> <?php echo e(number_format($reviews->ratting,1)); ?></small></h3>
                                <p class="text-muted mb-0"><?php echo e(Helper::date_format($reviews->created_at)); ?></p>
                            </div>
                        </div>
                        <p class="text-muted"><?php echo e($reviews->comment); ?></p>
                    </div>
                    <div class="card-footer py-0">
                        <div class="row justify-content-around align-items-center">
                            <a class="btn text-danger d-grid" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="DeleteData('<?php echo e($reviews->id); ?>','<?php echo e(URL::to('admin/reviews/destroy')); ?>')" <?php endif; ?>>
                                <i class="fa fa-trash"></i><small><?php echo e(trans('labels.delete')); ?></small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <?php echo e($getreview->links()); ?>

        </div>
    </div>
<?php else: ?>
<?php echo $__env->make('admin.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH D:\XAMPP\htdocs\mywinkel\resources\views/admin/reviews/card-view.blade.php ENDPATH**/ ?>