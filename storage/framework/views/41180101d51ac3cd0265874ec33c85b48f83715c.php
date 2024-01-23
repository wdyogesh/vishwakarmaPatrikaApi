<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo e(trans('labels.image')); ?></th>
            <th><?php echo e(trans('labels.category')); ?></th>
            <th><?php echo e(trans('labels.status')); ?></th>
            <th><?php echo e(trans('labels.action')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php $__currentLoopData = $getcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr id="dataid<?php echo e($category->id); ?>">
            <td><?php echo $i++; ?></td>
            <td><img src='<?php echo e(Helper::image_path($category->image)); ?>' class='img-fluid rounded hw-50'></td>
            <td><?php echo e($category->category_name); ?></td>
            <td>
                <?php if($category->is_available == 1): ?>
                    <a class="badge badge-success px-2 text-white" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="StatusUpdate('<?php echo e($category->id); ?>','2','<?php echo e(URL::to('admin/category/status')); ?>')" <?php endif; ?>><?php echo e(trans('labels.active')); ?></a>
                <?php else: ?>
                    <a class="badge badge-danger px-2 text-white" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="StatusUpdate('<?php echo e($category->id); ?>','1','<?php echo e(URL::to('admin/category/status')); ?>')" <?php endif; ?>><?php echo e(trans('labels.deactive')); ?></a>
                <?php endif; ?>
            </td>
            <td>
                <a class="badge badge-success px-2 text-white" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(trans('labels.edit_category')); ?>" href="<?php echo e(URL::to('admin/category-'.$category->id)); ?>">
                    <?php echo e(trans('labels.edit')); ?>

                </a>
                <a class="badge badge-danger px-2 text-white" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(trans('labels.delete')); ?>" href="javascript:void(0)" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="Delete('<?php echo e($category->id); ?>','<?php echo e(URL::to('admin/category/delete')); ?>')" <?php endif; ?>><?php echo e(trans('labels.delete')); ?></a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/category/categorytable.blade.php ENDPATH**/ ?>