<table class="table table-striped table-bordered zero-configuration">

    <thead>

        <tr>

            <th>#</th>

            <th><?php echo e(trans('labels.name')); ?></th>

            <th><?php echo e(trans('labels.category')); ?></th>

            <th><?php echo e(trans('labels.status')); ?></th>

            <th><?php echo e(trans('labels.action')); ?></th>

        </tr>

    </thead>

    <tbody>

        <?php $i = 1; ?>

        <?php $__currentLoopData = $getsubcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr id="dataid<?php echo e($category->id); ?>">

            <td><?php echo $i++; ?></td>

            <td><?php echo e($category->subcategory_name); ?></td>

            <td><?php echo e(@$category['category_info']->category_name); ?></td>

            <td>

                <?php if($category->is_available == 1): ?>

                    <a class="badge badge-success px-2" <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="StatusUpdate('<?php echo e($category->id); ?>','2','<?php echo e(URL::to('admin/sub-category/status')); ?>')" <?php endif; ?> style="color: #fff;"><?php echo e(trans('labels.active')); ?></a>

                <?php else: ?>

                    <a class="badge badge-danger px-2" <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="StatusUpdate('<?php echo e($category->id); ?>','1','<?php echo e(URL::to('admin/sub-category/status')); ?>')" <?php endif; ?> style="color: #fff;"><?php echo e(trans('labels.deactive')); ?></a>

                <?php endif; ?>

            </td>

            <td>

                <a href="<?php echo e(URL::to('admin/sub-category-'.$category->id)); ?>" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(trans('labels.edit_category')); ?>">

                    <span class="badge badge-success"><?php echo e(trans('labels.edit')); ?></span>

                </a>

                <a class="badge badge-danger px-2" <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="Delete('<?php echo e($category->id); ?>','<?php echo e(URL::to('admin/sub-category/delete')); ?>')" <?php endif; ?> style="color: #fff;"><?php echo e(trans('labels.delete')); ?></a>

            </td>

        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>

</table><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/subcategory/table.blade.php ENDPATH**/ ?>