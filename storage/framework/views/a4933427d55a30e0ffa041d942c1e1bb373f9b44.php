<?php $__env->startSection('content'); ?>
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/home')); ?>"><?php echo e(trans('labels.dashboard')); ?></a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"><?php echo e(trans('labels.inquiries')); ?></a></li>
        </ol>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <span id="message"></span>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo e(trans('labels.inquiries')); ?></h4>
                    <div class="table-responsive" id="table-display">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(trans('labels.name')); ?></th>
                                    <th><?php echo e(trans('labels.email')); ?></th>
                                    <th><?php echo e(trans('labels.message')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                <?php $__currentLoopData = $getcontact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo e($contact->firstname); ?> <?php echo e($contact->lastname); ?></td>
                                    <td><?php echo e($contact->email); ?></td>
                                    <td><?php echo e($contact->message); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/contact/contact.blade.php ENDPATH**/ ?>