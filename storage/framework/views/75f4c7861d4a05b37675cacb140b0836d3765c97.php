<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo e(trans('labels.addons_name')); ?></th>
            <th><?php echo e(trans('labels.price')); ?></th>
            <th><?php echo e(trans('labels.status')); ?></th>
            <th><?php echo e(trans('labels.action')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php $__currentLoopData = $getaddons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr id="dataid<?php echo e($addons->id); ?>">
            <td><?php echo $i++; ?></td>
            <td><?php echo e($addons->name); ?></td>
            <td><?php echo e(Helper::currency_format($addons->price)); ?></td>
            <td>
                <?php if($addons->is_available == 1): ?>
                    <a class="badge badge-success px-2 text-white" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="StatusUpdate('<?php echo e($addons->id); ?>','2','<?php echo e(URL::to('admin/addons/status')); ?>')" <?php endif; ?>><?php echo e(trans('labels.active')); ?></a>
                <?php else: ?>
                    <a class="badge badge-danger px-2 text-white" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="StatusUpdate('<?php echo e($addons->id); ?>','1','<?php echo e(URL::to('admin/addons/status')); ?>')" <?php endif; ?>><?php echo e(trans('labels.deactive')); ?></a>
                <?php endif; ?>
            </td>
            <td>
                <a class="badge badge-success px-2 text-white" href="<?php echo e(URL::to('admin/addons-'.$addons->id)); ?>" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(trans('labels.edit_addons')); ?>">
                    <?php echo e(trans('labels.edit')); ?>

                </a>
                <a class="badge badge-danger px-2 text-white" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="Delete('<?php echo e($addons->id); ?>','<?php echo e(URL::to('admin/addons/delete')); ?>')" <?php endif; ?>><?php echo e(trans('labels.delete')); ?></a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/addons/addonstable.blade.php ENDPATH**/ ?>