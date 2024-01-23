<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo e(trans('labels.name')); ?></th>
            <th><?php echo e(trans('labels.system_modules')); ?></th>
            <th><?php echo e(trans('labels.status')); ?></th>
            <th><?php echo e(trans('labels.action')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; ?>
        <?php $__currentLoopData = $getroles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr id="dataid<?php echo e($role->id); ?>">
            <td><?php echo $i++; ?></td>
            <td><?php echo e($role->name); ?></td>
            <td><?php echo e($role->modules); ?></td>
            <td>
                <?php if($role->is_available == 1): ?>
                    <a class="badge badge-success px-2 text-white" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="StatusUpdate('<?php echo e($role->id); ?>','2','<?php echo e(URL::to('admin/roles/status')); ?>')" <?php endif; ?>><?php echo e(trans('labels.active')); ?></a>
                <?php else: ?>
                    <a class="badge badge-danger px-2 text-white" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="StatusUpdate('<?php echo e($role->id); ?>','1','<?php echo e(URL::to('admin/roles/status')); ?>')" <?php endif; ?>><?php echo e(trans('labels.deactive')); ?></a>
                <?php endif; ?>
            </td>
            <td>
                <a class="badge badge-warning px-2 text-white" data-toggle="tooltip" data-original-title="<?php echo e(trans('labels.view')); ?>" href="<?php echo e(URL::to('admin/roles-'.$role->id)); ?>" >
                    <?php echo e(trans('labels.view')); ?>

                </a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH D:\XAMPP\htdocs\mywinkel\resources\views/admin/roles/rolestable.blade.php ENDPATH**/ ?>