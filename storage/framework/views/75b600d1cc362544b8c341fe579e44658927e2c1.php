<?php $__env->startSection('content'); ?>
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/home')); ?>"><?php echo e(trans('labels.dashboard')); ?></a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"><?php echo e(trans('labels.banners')); ?></a></li>
        </ol>
        <?php
        if(request()->is('admin/bannersection-1*')){
            $url = URL::to('admin/bannersection-1/add');
            $section = 1;
        }else if(request()->is('admin/bannersection-2*')){
            $url = URL::to('admin/bannersection-2/add');
            $section = 2;
        }else if(request()->is('admin/bannersection-3*')){
            $url = URL::to('admin/bannersection-3/add');
            $section = 3;
        }else{
            $url = URL::to('admin/banner/add');
            $section = 0;
        }
        ?>
        <a href="<?php echo e($url); ?>" class="btn btn-primary"><?php echo e(trans('labels.add_banner')); ?></a>
    </div>
</div>
<!-- row -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo e(trans('labels.all_banner')); ?></h4>
                    <div class="table-responsive" id="table-display">
                        <?php echo $__env->make('admin.banner.bannertable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url('resources/views/admin/banner/banner.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/banner/banner.blade.php ENDPATH**/ ?>