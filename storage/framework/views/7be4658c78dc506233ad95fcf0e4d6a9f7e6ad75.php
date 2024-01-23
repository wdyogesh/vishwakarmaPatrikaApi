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
                    <h4 class="card-title"><?php echo e(trans('labels.edit_item')); ?></h4>
                    <p class="text-muted"><code></code></p>
                    <div id="privacy-policy-three" class="privacy-policy">
                        <form method="post" action="<?php echo e(URL::to('admin/item/update')); ?>" name="about" id="about" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo e($getitem->id); ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cat_id" class="col-form-label"><?php echo e(trans('labels.category')); ?></label>
                                                <select name="cat_id" class="form-control" id="cat_id" data-url="<?php echo e(URL::to('admin/item/subcategories')); ?>">
                                                    <option value="" selected><?php echo e(trans('labels.select')); ?></option>
                                                    <?php $__currentLoopData = $getcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($category->id); ?>" <?php echo e($getitem->cat_id == $category->id ? 'selected' : ''); ?> data-id="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php $__errorArgs = ['get_cat_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="subcat_id" class="col-form-label"><?php echo e(trans('labels.subcategory')); ?></label>
                                                <select name="subcat_id" class="form-control" id="subcat_id">
                                                    <option value="" selected><?php echo e(trans('labels.select')); ?></option>
                                                    <?php $__currentLoopData = $getsubcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcatdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($subcatdata->id); ?>" <?php echo e($getitem->subcat_id == $subcatdata->id ? 'selected' : ''); ?>><?php echo e($subcatdata->subcategory_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                        <label for="getitem_name" class="col-form-label"><?php echo e(trans('labels.item_name')); ?></label>
                                        <input type="text" class="form-control" id="getitem_name" name="item_name" placeholder="<?php echo e(trans('labels.item_name')); ?>" value="<?php echo e($getitem->item_name); ?>">
                                        <?php $__errorArgs = ['getitem_name'];
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
                                        <label for="getaddons_id" class="col-form-label"><?php echo e(trans('labels.addons')); ?></label>
                                        <?php $selected = explode(",", $getitem->addons_id); ?>
                                        <select name="addons_id[]" class="form-control selectpicker" multiple data-live-search="true" id="getaddons_id">
                                            <?php $__currentLoopData = $getaddons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($supplier->id); ?>" <?php echo e((in_array($supplier->id, $selected)) ? 'selected' : ''); ?>><?php echo e($supplier->name); ?></option>
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
                                                <input class="form-check-input mr-0" type="radio" onclick="get_variation(this)" name="has_variation" id="yes" value="1" <?php if($getitem->has_variation == 1): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="yes"><?php echo e(trans('labels.yes')); ?></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input mr-0" type="radio" onclick="get_variation(this)" name="has_variation" id="no" value="2" <?php if($getitem->has_variation == 2): ?> checked <?php endif; ?>>
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
                            <div class="row <?php if($getitem->has_variation == 1): ?> dn <?php endif; ?>" id="price_row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price" class="col-form-label"><?php echo e(trans('labels.price')); ?></label>
                                        <input type="text" class="form-control" name="price" id="price" placeholder="<?php echo e(trans('labels.price')); ?>" value="<?php echo e($getitem->price); ?>">
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
                                        <input type="number" class="form-control" name="qty" min="0" placeholder="<?php echo e(trans('labels.qty')); ?>" value="<?php echo e($getitem->available_qty); ?>">
                                        <?php $__errorArgs = ['qty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><br> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <?php if($getitem->available_qty <= 0): ?>
                                            <span class="text-danger"><?php echo e(trans('labels.low_qty')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="<?php if($getitem->has_variation == 2): ?> dn <?php endif; ?>" id="variations">
                                
                                    <div class="col-md-12 px-0">
                                        <div class="form-group">
                                            <label for="attribute" class="col-form-label"><?php echo e(trans('labels.attribute')); ?></label>
                                            <input type="text" class="form-control attribute" name="attribute" id="attribute" placeholder="<?php echo e(trans('messages.enter_attribute')); ?>" value="<?php echo e($getitem->attribute); ?>">
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
                                
                                <?php $__currentLoopData = $getvariation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ky => $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row panel-body" id="del-<?php echo e($variation->id); ?>">
                                    <input type="hidden" class="form-control" id="variation_id" name="variation_id[<?php echo e($ky); ?>]" value="<?php echo e($variation->id); ?>">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="variation" class="col-form-label"><?php echo e(trans('labels.variation')); ?></label>
                                            <input type="text" class="form-control variation" name="variation[<?php echo e($ky); ?>]" id="variation" placeholder="<?php echo e(trans('labels.variation')); ?>" required="" value="<?php echo e($variation->variation); ?>">
                                            <?php if($errors->has('variation.'.$ky)): ?>
                                                <span class="text-danger"><?php echo e($errors->first('variation.'.$ky)); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="product_price" class="col-form-label"><?php echo e(trans('labels.product_price')); ?></label>
                                            <input type="text" class="form-control product_price" id="product_price" name="product_price[<?php echo e($ky); ?>]" placeholder="<?php echo e(trans('labels.product_price')); ?>" required="" value="<?php echo e($variation->product_price); ?>">
                                            <?php if($errors->has('product_price.'.$ky)): ?>
                                                <span class="text-danger"><?php echo e($errors->first('product_price.'.$ky)); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="" class="col-form-label"><?php echo e(trans('labels.qty')); ?></label>
                                            <input type="number" class="form-control" name="available_qty[]" min="0" placeholder="<?php echo e(trans('labels.qty')); ?>" value="<?php echo e($variation->available_qty); ?>">
                                            <?php if($errors->has('available_qty.'.$ky)): ?>
                                                <span class="text-danger"><?php echo e($errors->first('available_qty.'.$ky)); ?></span> <br>
                                            <?php endif; ?>
                                            <?php if($variation->available_qty <= 0): ?>
                                                <span class="text-danger"><?php echo e(trans('labels.low_qty')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 d-none">
                                        <div class="form-group">
                                            <label for="sale_price" class="col-form-label"><?php echo e(trans('labels.sale_price')); ?></label>
                                            <input type="text" class="form-control sale_price" id="sale_price" name="sale_price[<?php echo e($ky); ?>]" placeholder="<?php echo e(trans('labels.sale_price')); ?>" required="" value="<?php echo e($variation->sale_price); ?>">
                                            <?php if($errors->has('sale_price.'.$ky)): ?>
                                                <span class="text-danger"><?php echo e($errors->first('sale_price.'.$ky)); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-1 ">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-btn pt-35">
                                                    <button class="btn btn-danger" type="button"  onclick="DeleteVariation('<?php echo e($variation->id); ?>','<?php echo e($getitem->id); ?>','<?php echo e(URL::to('admin/item/deletevariation')); ?>')"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $currentdata[] = array(
                                        "currentkey" => $ky
                                    );
                                ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <p id="counter" style="display: none;"><?php if($getitem->has_variation == 1): ?> <?php echo e(count(array_column(@$currentdata, 'currentkey'))-1); ?> <?php endif; ?></p>
                            <div id="edititem_fields"></div>
                            <button class="btn btn-success btn-add-variations <?php if($getitem->has_variation == 2): ?> dn <?php endif; ?>" type="button" onclick="edititem_fields();"> <?php echo e(trans('labels.add_varation')); ?> + </button>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="tax" class="col-form-label"><?php echo e(trans('labels.tax')); ?> (%)</label>
                                                <input type="text" class="form-control" name="tax" id="tax" value="<?php echo e($getitem->tax); ?>" placeholder="<?php echo e(trans('labels.tax')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description" class="col-form-label"><?php echo e(trans('labels.description')); ?></label>
                                        <textarea class="form-control" rows="5" name="description" id="description" placeholder="<?php echo e(trans('labels.description')); ?>"><?php echo e($getitem->item_description); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" <?php if(env('Environment')=='sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.update')); ?></button>
                            <a href="<?php echo e(URL::to('admin/item')); ?>" class="btn btn-dark"><?php echo e(trans('labels.cancel')); ?></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddProduct" data-whatever="@addProduct"><?php echo e(trans('labels.add_image')); ?></button>
            <div id="card-display">
                <div class="row" style="margin-top: 20px;">
                    
                    <?php $__currentLoopData = $getitemimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemimage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-2 col-md-4 col-sm-6 my-card dataid<?php echo e($itemimage->id); ?>" id="table-image">
                            <img class="img-fluid rounded edit-item-image" src='<?php echo e(Helper::image_path($itemimage->image)); ?>' >
                            <div class="actioncenter">
                                <a href="javascript:void(0)" class="badge badge-info" onClick="updateItemImage('<?php echo e($itemimage->id); ?>','<?php echo e(URL::to('admin/item/showimage')); ?>')" title="<?php echo e(trans('labels.edit')); ?>"><i class="fa fa-edit p-2" aria-hidden="true"></i> </a>
                                <?php if(count($getitemimages) > 1): ?>
                                <a href="javascript:void(0)" class="badge badge-danger" <?php if(env('Environment')=='sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> onClick="deleteItemImage('<?php echo e($itemimage->id); ?>','<?php echo e($itemimage->item_id); ?>','<?php echo e(URL::to('admin/item/destroyimage')); ?>')" <?php endif; ?> title="<?php echo e(trans('labels.delete')); ?>"><i class="fa fa-trash p-2" aria-hidden="true"></i> </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Edit Images -->
<div class="modal fade" id="EditImages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabeledit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" name="editimg" class="editimg" id="editimg" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" id="updateimageurl" value="<?php echo e(URL::to('admin/item/updateimage')); ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabeledit"><?php echo e(trans('labels.images')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <span id="emsg"></span>
                <div class="modal-body">
                    <div class="form-group">
                        <label><?php echo e(trans('labels.images')); ?> (500x250) (<?php echo e(trans('labels.png')); ?>)</label>
                        <input type="hidden" id="idd" name="id">
                        <input type="hidden" class="form-control" id="old_img" name="old_img">
                        <input type="file" class="form-control" name="image" id="image" accept="image/*">
                        <input type="hidden" name="removeimg" id="removeimg">
                    </div>
                    <div class="galleryim"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btna-secondary" type="button" data-dismiss="modal"><?php echo e(trans('labels.close')); ?></button>
                    <button class="btn btn-primary" <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?> ><?php echo e(trans('labels.update')); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Add Item Image -->
<div class="modal fade" id="AddProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" name="addproduct" class="addproduct" id="addproduct" enctype="multipart/form-data">
            <span id="msg"></span>
            <input type="hidden" id="storeimagesurl" value="<?php echo e(URL::to('admin/item/storeimages')); ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(trans('labels.images')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo e(trans('labels.close')); ?>"><span aria-hidden="true">&times;</span></button>
                </div>
                <span id="iiemsg"></span>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="colour" class="col-form-label"><?php echo e(trans('labels.images')); ?></label>
                        <input type="file" multiple="true" class="form-control" name="file[]" id="file" accept="image/*" required="">
                    </div>
                    <div class="gallery"></div>
                    <input type="hidden" name="itemid" id="itemid" value="<?php echo e(request()->route('id')); ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(trans('labels.close')); ?></button>
                    <button class="btn btn-primary" <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?> ><?php echo e(trans('labels.update')); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- #/ container -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url('resources/views/admin/item/additem.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/item/edititem.blade.php ENDPATH**/ ?>