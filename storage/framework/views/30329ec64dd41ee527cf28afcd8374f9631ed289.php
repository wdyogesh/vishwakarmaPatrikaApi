<?php $__env->startSection('content'); ?>
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/home')); ?>"><?php echo e(trans('labels.dashboard')); ?></a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"><?php echo e(trans('labels.items')); ?></a></li>
        </ol>
    </div>
</div>
<!-- row -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo e(trans('labels.add_new')); ?></h4>
                    <p class="text-muted"><code></code></p>
                    <div id="privacy-policy-three" class="privacy-policy">
                        <form method="post" action="<?php echo e(URL::to('admin/item/store')); ?>" name="about" id="about" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cat_id" class="col-form-label"><?php echo e(trans('labels.category')); ?></label>
                                                <select name="cat_id" class="form-control" id="cat_id" data-url="<?php echo e(URL::to('admin/item/subcategories')); ?>">
                                                    <option value="" selected><?php echo e(trans('labels.select')); ?></option>
                                                    <?php $__currentLoopData = $getcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($category->id); ?>" data-id="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php $__errorArgs = ['cat_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <span class="emsg text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="subcat_id" class="col-form-label"><?php echo e(trans('labels.subcategory')); ?></label>
                                                <select name="subcat_id" class="form-control" id="subcat_id">
                                                    <option value="" selected><?php echo e(trans('labels.select')); ?></option>
                                                </select>
                                                <?php $__errorArgs = ['subcat_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="item_name" class="col-form-label"><?php echo e(trans('labels.item_name')); ?></label>
                                        <input type="text" class="form-control" name="item_name" id="item_name" placeholder="<?php echo e(trans('labels.item_name')); ?>">
                                        <?php $__errorArgs = ['item_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="addons_id" class="col-form-label"><?php echo e(trans('labels.addons')); ?></label>
                                        <select name="addons_id[]" class="form-control selectpicker" multiple data-live-search="true" id="addons_id">
                                            <option value="" selected><?php echo e(trans('labels.select')); ?></option>
                                            <?php $__currentLoopData = $getaddons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($addons->id); ?>"><?php echo e($addons->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="has_variation" class="col-form-label"><?php echo e(trans('labels.item_has_variation')); ?></label>
                                        <div class="col-md-12">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input mr-0" type="radio" onclick="get_variation(this)" name="has_variation" id="yes" value="1" <?php if(old('has_variation') == 1): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="yes"><?php echo e(trans('labels.yes')); ?></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input mr-0" type="radio" onclick="get_variation(this)" name="has_variation" id="no" value="2" <?php if(old('has_variation') == 2): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="no"><?php echo e(trans('labels.no')); ?></label>
                                            </div>
                                            <?php $__errorArgs = ['has_variation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><br><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row dn <?php if($errors->has('variants_name.*') || $errors->has('variants_price.*')): ?> dn <?php endif; ?> <?php if(old('has_variation') == 2): ?> d-flex <?php endif; ?>" id="price_row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price" class="col-form-label"><?php echo e(trans('labels.price')); ?></label>
                                        <input type="text" class="form-control" name="price" id="price" value="<?php echo e(old('price')); ?>" placeholder="<?php echo e(trans('labels.price')); ?>">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="col-form-label"><?php echo e(trans('labels.qty')); ?></label>
                                        <input type="number" class="form-control" name="qty" min="0" value="<?php echo e(old('qty')); ?>" placeholder="<?php echo e(trans('labels.qty')); ?>">
                                        <?php $__errorArgs = ['qty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row panel-body dn <?php if($errors->has('variation.*') || $errors->has('product_price.*') || old('has_variation') == 1): ?> d-flex <?php endif; ?>" id="variations">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="attribute" class="col-form-label"><?php echo e(trans('labels.attribute')); ?></label>
                                        <input type="text" class="form-control attribute" name="attribute" id="attribute" placeholder="<?php echo e(trans('messages.enter_attribute')); ?>">
                                        <?php $__errorArgs = ['attribute'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="variation" class="col-form-label"><?php echo e(trans('labels.variation')); ?></label>
                                        <input type="text" class="form-control variation" name="variation[]" id="variation" placeholder="<?php echo e(trans('labels.variation')); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="product_price" class="col-form-label"><?php echo e(trans('labels.product_price')); ?></label>
                                        <input type="text" class="form-control product_price" id="product_price" name="product_price[]" placeholder="<?php echo e(trans('labels.product_price')); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="" class="col-form-label"><?php echo e(trans('labels.qty')); ?></label>
                                        <input type="number" class="form-control" name="available_qty[]" min="0" placeholder="<?php echo e(trans('labels.qty')); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-4 d-none">
                                    <div class="form-group">
                                        <label for="sale_price" class="col-form-label"><?php echo e(trans('labels.sale_price')); ?></label>
                                        <input type="text" class="form-control sale_price" id="sale_price" name="sale_price[]" placeholder="<?php echo e(trans('labels.sale_price')); ?>" value="0">
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-btn pt-35">
                                                <button class="btn btn-info" type="button"  onclick="variation_fields();"> + </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <div class="clear"></div>
                            </div>
                            <div id="more_variation_fields"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image" class="col-form-label"><?php echo e(trans('labels.image')); ?> (512x512) (<?php echo e(trans('labels.png')); ?>)</label>
                                        <input type="file" class="form-control" name="image[]" id="image" accept="image/*" multiple>
                                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <div class="row pl-2 gallery"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="tax" class="col-form-label"><?php echo e(trans('labels.tax')); ?> (%)</label>
                                                <input type="text" class="form-control" name="tax" id="tax" value="0" placeholder="<?php echo e(trans('labels.tax')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description" class="col-form-label"><?php echo e(trans('labels.description')); ?></label>
                                        <textarea class="form-control" rows="5" name="description" id="description" placeholder="<?php echo e(trans('labels.description')); ?>"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" <?php if(env('Environment')=='sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                            <a href="<?php echo e(URL::to('admin/item')); ?>" class="btn btn-dark"><?php echo e(trans('labels.cancel')); ?></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script src="<?php echo e(url('resources/views/admin/item/additem.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/item/additem.blade.php ENDPATH**/ ?>