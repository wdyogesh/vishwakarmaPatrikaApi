<?php $__env->startSection('content'); ?>
<!-- row -->
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/home')); ?>"><?php echo e(trans('labels.dashboard')); ?></a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"><?php echo e(trans('labels.users')); ?></a></li>
        </ol>
        <a href="<?php echo e(URL::to('/admin/createsystem-addons')); ?>" class="btn btn-primary">Install/Update addons</a>
    </div>
</div>
<!-- row -->
<div class="container-fluid">
    <!-- End Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <div class="default-tab">
                        <ul class="nav nav-tabs mb-3" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#installed">Installed Addons</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#available">Available Addons</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="installed" role="tabpanel">
                                <div class="p-t-15">
                                    <div class="row">
                                        <?php $__empty_1 = true; $__currentLoopData = \App\SystemAddons::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $addon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="card">
                                                <img class="img-fluid" src='<?php echo asset("storage/app/public/addons/".$addon->image); ?>' alt="">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo e(ucfirst($addon->name)); ?></h5>
                                                </div>
                                                <div class="card-footer">
                                                    <p class="card-text d-inline"><small class="text-muted">Version : <?php echo e($addon->version); ?></small></p>
                                                    <?php if($addon->activated): ?>
                                                        <a href="#" class="btn btn-sm btn-primary float-right" onclick="StatusUpdate('<?php echo e($addon->id); ?>','0','<?php echo e(URL::to('admin/systemaddons/update')); ?>')">Activated</a>
                                                    <?php else: ?>
                                                        <a href="#" class="btn btn-sm btn-danger float-right" onclick="StatusUpdate('<?php echo e($addon->id); ?>','1','<?php echo e(URL::to('admin/systemaddons/update')); ?>')">Deactivated</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="col-md-6 col-lg-3 mt-4">
                                            <h4><?php echo e(trans('labels.no_data')); ?></h4>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="available">
                                <div class="p-t-15">
                                    <?php
                                    $payload = file_get_contents('https://gravityinfotech.net/api/addonsapi.php?type=gravity');
                                    $obj = json_decode($payload);
                                    ?>
                                    <div class="row">
                                        <?php $__currentLoopData = $obj->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6 col-lg-3">
                                                <div class="card">
                                                    <img class="img-fluid" src='<?php echo e($item->image); ?>' alt="">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?php echo e($item->name); ?></h5>
                                                        <p><?php echo e($item->short_description); ?></p>
                                                    </div>
                                                    <div class="card-footer">
                                                        <a href="<?php echo e($item->purchase); ?>" target="_blank" class="btn btn-sm btn-primary">Purchase</a>
                                                        <a href="<?php echo e($item->link); ?>" target="_blank" class="btn btn-sm btn-success float-right">Preview</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <!-- End Col -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 m-b-30">
            <div class="row mt-4">
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
<!-- #/ container -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url('resources/views/admin/systemaddons/systemaddons.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/systemaddons/system-addons.blade.php ENDPATH**/ ?>