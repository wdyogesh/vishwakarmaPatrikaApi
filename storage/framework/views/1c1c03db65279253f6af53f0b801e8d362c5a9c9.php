<?php $__env->startSection('content'); ?>
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(trans('labels.dashboard')); ?></a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('admin/banner')); ?>"><?php echo e(trans('labels.banner')); ?></a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"><?php echo e(trans('labels.edit_banner')); ?></a></li>
        </ol>
    </div>
</div>
<!-- row -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <form action="<?php echo e(URL::to('admin/banner/update-'.$getbanner->id)); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="section" value="<?php echo e($getbanner->section); ?>">
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for="type"><?php echo e(trans('labels.type')); ?></label>
                                <div class="col-lg-6">
                                    <select name="type" class="form-control type" data-live-search="true" id="type">
                                        <option value="" selected><?php echo e(trans('labels.select')); ?></option>
                                        <option value="1" <?php echo e(old('type') == 1 ? 'selected' : ($getbanner->type == 1 ? 'selected' : '')); ?>><?php echo e(trans('labels.category')); ?></option>
                                        <option value="2" <?php echo e(old('type') == 2 ? 'selected' : ($getbanner->type == 2 ? 'selected' : '')); ?>><?php echo e(trans('labels.item')); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row 1 gravity <?php if($errors->has('cat_id')): ?> <?php else: ?> <?php if($errors->has('item_id')): ?> dn <?php else: ?> <?php if($getbanner->type == 1): ?> <?php else: ?> dn <?php endif; ?> <?php endif; ?> <?php endif; ?>">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for=""><?php echo e(trans('labels.category')); ?> <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <select name="cat_id" class="form-control selectpicker" data-live-search="true" id="cat_id">
                                        <option value="" selected><?php echo e(trans('labels.select')); ?></option>
                                        <?php $__currentLoopData = $getcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>" <?php echo e($getbanner->cat_id == $category->id ? 'selected' : ''); ?> ><?php echo e($category->category_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['cat_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group row 2 gravity <?php if($errors->has('item_id')): ?> <?php else: ?> <?php if($errors->has('cat_id')): ?> dn <?php else: ?> <?php if($getbanner->type == 2): ?> <?php else: ?> dn <?php endif; ?> <?php endif; ?> <?php endif; ?>">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for=""><?php echo e(trans('labels.item')); ?> <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <select name="item_id" class="form-control selectpicker" data-live-search="true" id="item_id">
                                        <option value="" selected><?php echo e(trans('labels.select')); ?></option>
                                        <?php $__currentLoopData = $getitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>" <?php echo e($getbanner->item_id == $item->id ? 'selected' : ''); ?> ><?php echo e($item->item_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['item_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 text-md-right text-sm-left col-form-label" for=""><?php echo e(trans('labels.image')); ?> (500x250) <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <br> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <img src="<?php echo e(Helper::image_path($getbanner->image)); ?>" alt="" class="img-fluid pt-2" style="max-height: 50px;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 m-auto">
                                    <button class="btn btn-primary" <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                                    <a class="btn btn-dark" <?php if($getbanner->section == 0): ?> href="<?php echo e(URL::to('admin/banner')); ?>" <?php else: ?> href="<?php echo e(URL::to('admin/bannersection-'.$getbanner->section)); ?>" <?php endif; ?>><?php echo e(trans('labels.cancel')); ?></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url('resources/views/admin/banner/banner.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/banner/edit.blade.php ENDPATH**/ ?>