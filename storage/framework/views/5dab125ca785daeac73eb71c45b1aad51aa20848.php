<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo e(trans('labels.image')); ?></th>
            <th><?php echo e(trans('labels.title')); ?></th>
            <th><?php echo e(trans('labels.description')); ?></th>
            <th><?php echo e(trans('labels.action')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php $__currentLoopData = $gettutorials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tutorial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr id="dataid<?php echo e($tutorial->id); ?>">
            <td><?php echo $i++; ?></td>
            <td><img src='<?php echo e(Helper::image_path($tutorial->image)); ?>' class='img-fluid rounded hw-50'></td>
            <td><?php echo e($tutorial->title); ?></td>
            <td><?php echo e($tutorial->description); ?></td>
            <td>
                <a class="badge badge-success px-2 text-white" href="<?php echo e(URL::to('admin/tutorial-'.$tutorial->id)); ?>" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(trans('labels.edit')); ?>">
                    <?php echo e(trans('labels.edit')); ?>

                </a>
                <a class="badge badge-danger px-2 text-white" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="Delete('<?php echo e($tutorial->id); ?>','<?php echo e(URL::to('admin/tutorial/delete')); ?>')" <?php endif; ?>><?php echo e(trans('labels.delete')); ?></a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/tutorial/table.blade.php ENDPATH**/ ?>