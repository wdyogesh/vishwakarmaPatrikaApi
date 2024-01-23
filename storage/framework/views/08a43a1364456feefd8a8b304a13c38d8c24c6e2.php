<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo e(trans('labels.image')); ?></th>
            <th><?php echo e(trans('labels.title')); ?></th>
            <th><?php echo e(trans('labels.category')); ?></th>
            <th><?php echo e(trans('labels.item')); ?></th>
            <th><?php echo e(trans('labels.description')); ?></th>
            <th><?php echo e(trans('labels.action')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php $__currentLoopData = $getslider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr id="dataid<?php echo e($slider->id); ?>">
            <td><?php echo $i++; ?></td>
            <td><img src='<?php echo e(Helper::image_path($slider->image)); ?>' class='img-fluid rounded hw-50'></td>
            <td><?php echo e($slider->title); ?></td>
            <td><?php if($slider->type == "1"): ?> <?php echo e(@$slider['category_info']->category_name); ?> <?php else: ?> -- <?php endif; ?></td>
            <td><?php if($slider->type == "2"): ?> <?php echo e(@$slider['item_info']->item_name); ?> <?php else: ?> -- <?php endif; ?></td>
            <td><?php echo e($slider->description); ?></td>
            <td>
                <a class="badge badge-success px-2 text-white" href="<?php echo e(URL::to('admin/slider-'.$slider->id)); ?>" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(trans('labels.edit_slider')); ?>">
                    <?php echo e(trans('labels.edit')); ?>

                </a>
                <a class="badge badge-danger px-2 text-white" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(trans('labels.delete')); ?>" <?php if(env('Environment')=='sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="DeleteData('<?php echo e($slider->id); ?>','<?php echo e(URL::to('admin/slider/destroy')); ?>')" <?php endif; ?> data-original-title="<?php echo e(trans('labels.delete')); ?>">
                    <?php echo e(trans('labels.delete')); ?>

                </a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/slider/slidertable.blade.php ENDPATH**/ ?>