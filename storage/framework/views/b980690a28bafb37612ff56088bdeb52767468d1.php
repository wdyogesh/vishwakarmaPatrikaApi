<?php $__env->startSection('content'); ?>
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/home')); ?>"><?php echo e(trans('labels.dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)"><?php echo e(trans('labels.items')); ?></a></li>
            </ol>
            <a href="<?php echo e(URL::to('/admin/item/add')); ?>" class="btn btn-primary"><?php echo e(trans('labels.add_new')); ?></a>
        </div>
    </div>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 float-right my-4">
                    <form action="<?php echo e(URL::to('admin/item')); ?>">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control rounded" name="search" <?php if(isset($_GET['search'])): ?> value="<?php echo e($_GET['search']); ?>" <?php endif; ?> placeholder="<?php echo e(trans('labels.type_and_enter')); ?>" aria-label="<?php echo e(trans('labels.type_and_enter')); ?>" aria-describedby="basic-addon2">
                            <div class="input-group-append px-1">
                                <select class="form-control rounded" name="option">
                                    <option value="" selected><?php echo e(trans('labels.select')); ?></option>
                                    <option value="veg" <?php if(isset($_GET['option'])): ?> <?php if($_GET['option'] == 'veg'): ?> selected <?php endif; ?> <?php endif; ?>> <?php echo e(trans('labels.veg')); ?></option>
                                    <option value="nonveg" <?php if(isset($_GET['option'])): ?> <?php if($_GET['option'] == 'nonveg'): ?> selected <?php endif; ?> <?php endif; ?>> <?php echo e(trans('labels.nonveg')); ?></option>
                                </select>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary rounded" type="submit"><?php echo e(trans('labels.fetch')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <section class="item-section">
            <?php echo $__env->make('admin.item.card-view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script src="<?php echo e(url('resources/views/admin/item/additem.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/item/item.blade.php ENDPATH**/ ?>