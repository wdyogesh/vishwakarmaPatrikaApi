<?php if(count($getitem) > 0): ?>
    <div class="row item-list-view">
        <?php $__currentLoopData = $getitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mt-4 mb-2 d-flex">
                <div class="card card-section text-center w-100">
                    <?php if($item->addons_id != "" || count($item->variation) > 0): ?>
                    <div class="ribbon"><span><?php echo e(trans('labels.customizable')); ?></span></div>
                    <?php endif; ?>
                    <?php
                        $i = 0;$j = 0;
                        $item->has_variation == 2 && $item->available_qty <= 0 ? $j++ : '' ;
                        if ($item->has_variation == 1) {
                            foreach ($item->variation as $key => $value){
                                $value->available_qty <= 0 ? $i++ : '' ;
                            }
                        }
                    ?>
                    <?php if($i > 0 || $j > 0): ?>
                        <span class="item-detail-warning"><i class="text-danger fs-3 fa fa-bell"></i></span>  
                    <?php endif; ?>
                    <img src="<?php echo e(@$item['item_image']->image_url); ?>" class="listing-view-image mx-auto" alt="...">
                    <div class="card-body py-3">
                        <h6 class="card-title fw-bold mb-2"> <img <?php if($item->item_type == 1): ?> src="<?php echo e(Helper::image_path('veg.svg')); ?>" <?php else: ?> src="<?php echo e(Helper::image_path('nonveg.svg')); ?>" <?php endif; ?> class="item-type-img" alt=""> <?php echo e($item->item_name); ?></h6>
                        <div class="item-details px-2">
                            <p class="d-flex justify-content-between my-0"><?php echo e(trans('labels.category')); ?> <span><?php echo e(@$item['category_info']->category_name); ?></span></p>
                            <p class="d-flex justify-content-between my-0"><?php echo e(trans('labels.preparation_time')); ?> <span><?php echo e($item->preparation_time); ?></span></p>
                            <p class="d-flex justify-content-between my-0"><?php echo e(trans('labels.tax')); ?> <span><?php echo e(number_format($item->tax,2)); ?>%</span></p>
                        </div>
                    </div>
                    <div class="card-footer py-0">
                        <div class="row justify-content-center">
                            <?php if($item->is_featured == 1): ?>
                                <a class="btn px-2 text-success d-grid" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="StatusFeatured('<?php echo e($item->id); ?>','2','<?php echo e(URL::to('admin/item/featured')); ?>')" <?php endif; ?>><i class="fa fa-check"></i><small><?php echo e(trans('labels.featured')); ?></small>
                                </a>
                            <?php else: ?>
                                <a class="btn px-2 text-danger d-grid" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="StatusFeatured('<?php echo e($item->id); ?>','1','<?php echo e(URL::to('admin/item/featured')); ?>')" <?php endif; ?>><i class="fa fa-close"></i><small><?php echo e(trans('labels.featured')); ?></small>
                                </a>
                            <?php endif; ?>
                            <?php if($item->item_status == 1): ?>
                                <a class="btn px-2 text-success d-grid" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="StatusUpdate('<?php echo e($item->id); ?>','2','<?php echo e(URL::to('admin/item/status')); ?>')" <?php endif; ?>>
                                    <i class="fa fa-check"></i><small><?php echo e(trans('labels.status')); ?></small>
                                </a>
                            <?php else: ?>
                                <a class="btn px-2 text-danger d-grid" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="StatusUpdate('<?php echo e($item->id); ?>','1','<?php echo e(URL::to('admin/item/status')); ?>')" <?php endif; ?>>
                                    <i class="fa fa-close"></i><small><?php echo e(trans('labels.status')); ?></small>
                                </a>
                            <?php endif; ?>
                            <a class="btn px-2 text-info d-grid" href="<?php echo e(URL::to('admin/item-'.$item->id)); ?>">
                                <i class="fa fa-edit"></i><small><?php echo e(trans('labels.update')); ?></small>
                            </a>
                            <a class="btn px-2 text-danger d-grid" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="Delete('<?php echo e($item->id); ?>','<?php echo e(URL::to('admin/item/delete')); ?>')" <?php endif; ?>>
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
            <?php echo e($getitem->appends(request()->query())->links()); ?>

        </div>
    </div>
<?php else: ?>
<?php echo $__env->make('admin.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/item/card-view.blade.php ENDPATH**/ ?>