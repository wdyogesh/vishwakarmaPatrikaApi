<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo e(trans('labels.image')); ?></th>
            <th><?php echo e(trans('labels.category')); ?></th>
            <th><?php echo e(trans('labels.item')); ?></th>
            <th><?php echo e(trans('labels.action')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php $__currentLoopData = $getbanner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($banner->section == $section): ?>
            <tr id="dataid<?php echo e($banner->id); ?>">
                <td><?php echo $i++; ?></td>
                <td><img src='<?php echo e(Helper::image_path($banner->image)); ?>' class='img-fluid rounded hw-50'></td>
                <td><?php if($banner->type == "1"): ?> <?php echo e(@$banner['category_info']->category_name); ?> <?php else: ?> -- <?php endif; ?></td>
                <td><?php if($banner->type == "2"): ?> <?php echo e(@$banner['item_info']->item_name); ?> <?php else: ?> -- <?php endif; ?></td>
                <td>
                    <a class="badge badge-success px-2 text-white" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(trans('labels.edit')); ?>" href="<?php echo e(URL::to('admin/banner-'.$banner->id)); ?>" ><?php echo e(trans('labels.edit')); ?></a>
                    <a class="badge badge-danger px-2 text-white" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(trans('labels.delete')); ?>" href="javascript:void(0)"  <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="DeleteData('<?php echo e($banner->id); ?>','<?php echo e(URL::to('admin/banner/destroy')); ?>')" <?php endif; ?>><?php echo e(trans('labels.delete')); ?></a>
                </td>
            </tr>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/banner/bannertable.blade.php ENDPATH**/ ?>