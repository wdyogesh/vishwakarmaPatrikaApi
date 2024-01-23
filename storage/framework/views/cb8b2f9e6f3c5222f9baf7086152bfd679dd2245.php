<?php $__env->startSection('content'); ?>

<div class="row page-titles mx-0">

    <div class="col p-md-0">

        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/home')); ?>"><?php echo e(trans('labels.dashboard')); ?></a></li>

            <li class="breadcrumb-item active"><a href="javascript:void(0)"><?php echo e(trans('labels.reviews')); ?></a></li>

        </ol>

    </div>

</div>

<div class="container-fluid">



    <section class="reviews-section">

        <?php echo $__env->make('admin.reviews.card-view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </section>



</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script src="<?php echo e(url('resources/views/admin/reviews/reviews.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP\htdocs\mywinkel\resources\views/admin/reviews/reviews.blade.php ENDPATH**/ ?>