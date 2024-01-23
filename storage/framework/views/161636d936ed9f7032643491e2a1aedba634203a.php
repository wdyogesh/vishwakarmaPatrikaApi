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
        <?php $__currentLoopData = $getblogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><img src='<?php echo e(Helper::image_path($blog->image)); ?>' class='img-fluid rounded hw-50'></td>
            <td><?php echo e($blog->title); ?></td>
            <td><?php echo e(Str::limit($blog->description, 300)); ?></td>
            <td>
                <a class="badge badge-success px-2 text-white" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(trans('labels.edit')); ?>" href="<?php echo e(URL::to('admin/blogs-'.$blog->id)); ?>">
                    <?php echo e(trans('labels.edit')); ?>

                </a>
                <a class="badge badge-danger px-2 text-white" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(trans('labels.delete')); ?>" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="Delete('<?php echo e($blog->id); ?>','<?php echo e(URL::to('admin/blogs/delete')); ?>')" <?php endif; ?>><?php echo e(trans('labels.delete')); ?></a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/blogs/table.blade.php ENDPATH**/ ?>