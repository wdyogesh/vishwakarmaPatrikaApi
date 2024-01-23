<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo e(trans('labels.offer_name')); ?></th>
            <th><?php echo e(trans('labels.offer_code')); ?></th>
            <th><?php echo e(trans('labels.amount')); ?></th>
            <th><?php echo e(trans('labels.min_amount')); ?></th>
            <th><?php echo e(trans('labels.from_to')); ?></th>
            <th><?php echo e(trans('labels.description')); ?> </th>
            <th><?php echo e(trans('labels.action')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $i = 1;
        ?>
        <?php $__currentLoopData = $getpromocode; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promocode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr id="dataid<?php echo e($promocode->id); ?>">
            <td><?php echo $i++; ?></td>
            <td><?php echo e($promocode->offer_name); ?></td>
            <td><?php echo e($promocode->offer_code); ?></td>
            <td><?php echo e($promocode->offer_type == 1 ? Helper::currency_format($promocode->offer_amount) : $promocode->offer_amount.'%'); ?></td>
            <td><?php echo e(Helper::currency_format($promocode->min_amount)); ?></td>
            <td><span class="badge badge-success"><?php echo e(Helper::date_format($promocode->start_date)); ?></span><span class="badge badge-warning"><?php echo e(Helper::date_format($promocode->expire_date)); ?></span></td>
            <td><span data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e($promocode->description); ?>"><?php echo e(Str::limit($promocode->description,100)); ?></span></td>
            <td>
                <a class="badge badge-success px-2 text-white" href="<?php echo e(URL::to('admin/promocode-'.$promocode->id)); ?>" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(trans('labels.edit_promocode')); ?>">
                    <?php echo e(trans('labels.edit')); ?>

                </a>
                <a class="badge badge-danger px-2 text-white" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="StatusUpdate('<?php echo e($promocode->id); ?>','2','<?php echo e(URL::to('admin/promocode/status')); ?>')" <?php endif; ?> ><?php echo e(trans('labels.delete')); ?></a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH D:\XAMPP\htdocs\mywinkel\resources\views/admin/promocode/promocodetable.blade.php ENDPATH**/ ?>