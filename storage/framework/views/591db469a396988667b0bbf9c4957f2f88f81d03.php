<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo e(trans('labels.title')); ?></th>
            <th><?php echo e(trans('labels.description')); ?></th>
            <th><?php echo e(trans('labels.action')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php $__currentLoopData = $getfaqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr id="dataid<?php echo e($faq->id); ?>">
            <td><?php echo $i++; ?></td>
            <td><?php echo e($faq->title); ?></td>
            <td><?php echo e($faq->description); ?></td>
            <td>
                <a class="badge badge-success px-2 text-white" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(trans('labels.edit')); ?>" href="<?php echo e(URL::to('admin/faq-'.$faq->id)); ?>">
                    <?php echo e(trans('labels.edit')); ?>

                </a>
                <a class="badge badge-danger px-2 text-white" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(trans('labels.delete')); ?>" href="javascript:void(0)" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="Delete('<?php echo e($faq->id); ?>','<?php echo e(URL::to('admin/faq/delete')); ?>')" <?php endif; ?>><?php echo e(trans('labels.delete')); ?></a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/faq/table.blade.php ENDPATH**/ ?>