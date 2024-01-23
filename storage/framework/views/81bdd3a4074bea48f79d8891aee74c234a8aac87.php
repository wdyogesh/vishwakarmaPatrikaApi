<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" type="text/css"
        href="<?php echo e(url('storage/app/public/admin-assets/assets/excelbutton/1.6.4.buttons.bootstrap4.min.css')); ?>">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/home')); ?>"><?php echo e(trans('labels.dashboard')); ?></a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)"><?php echo e(trans('labels.report')); ?></a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo e(trans('labels.report')); ?></h4>

                        <form action="<?php echo e(URL::to('/admin/report')); ?>" class="my-3">
                            <div class="input-group col-md-12 pl-0">
                                <div class="input-group-append col-auto px-1">
                                    <input type="date" class="form-control rounded" name="startdate"
                                        <?php if(isset($_GET['startdate'])): ?> value="<?php echo e($_GET['startdate']); ?>" <?php endif; ?>
                                        aria-label="<?php echo e(trans('labels.type_and_enter')); ?>" aria-describedby="basic-addon2"
                                        required>
                                </div>
                                <div class="input-group-append col-auto px-1">
                                    <input type="date" class="form-control rounded" name="enddate"
                                        <?php if(isset($_GET['enddate'])): ?> value="<?php echo e($_GET['enddate']); ?>" <?php endif; ?>
                                        aria-label="<?php echo e(trans('labels.type_and_enter')); ?>" aria-describedby="basic-addon2"
                                        required>
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-primary rounded"
                                        type="submit"><?php echo e(trans('labels.fetch')); ?></button>
                                </div>
                            </div>
                        </form>


                        <?php echo $__env->make('admin.orders.statistics', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="table-responsive reportstable" id="table-display">
                            <?php echo $__env->make('admin.orders.orderstable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(url('storage/app/public/admin-assets/assets/excelbutton/1.6.4.dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(url('storage/app/public/admin-assets/assets/excelbutton/1.6.4.buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(url('storage/app/public/admin-assets/assets/excelbutton/3.1.3.jszip.min.js')); ?>"></script>
    <script src="<?php echo e(url('storage/app/public/admin-assets/assets/excelbutton/1.6.4.buttons.html5.min.js')); ?>"></script>

    <script src="<?php echo e(url('resources/views/admin/orders/orders.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/orders/report.blade.php ENDPATH**/ ?>