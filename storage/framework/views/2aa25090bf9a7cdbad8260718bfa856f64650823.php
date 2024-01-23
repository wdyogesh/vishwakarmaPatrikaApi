
<?php $__env->startSection('content'); ?>
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/home')); ?>"><?php echo e(trans('labels.dashboard')); ?></a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"><?php echo e(trans('labels.bookings')); ?></a></li>
        </ol>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <span id="message"></span>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo e(trans('labels.bookings')); ?></h4>
                    <div class="table-responsive" id="table-display">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(trans('labels.name')); ?></th>
                                    <th><?php echo e(trans('labels.email')); ?></th>
                                    <th><?php echo e(trans('labels.mobile')); ?></th>
                                    <th><?php echo e(trans('labels.guests')); ?></th>
                                    <th><?php echo e(trans('labels.date_time')); ?></th>
                                    <th><?php echo e(trans('labels.reservation_type')); ?></th>
                                    <th><?php echo e(trans('labels.message')); ?></th>
                                    <th><?php echo e(trans('labels.action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                <?php $__currentLoopData = $getbookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo e($booking->name); ?></td>
                                    <td><?php echo e($booking->email); ?></td>
                                    <td><?php echo e($booking->mobile); ?></td>
                                    <td><?php echo e($booking->guests); ?></td>
                                    <td><?php echo e($booking->date); ?> <br> <?php echo e($booking->time); ?> </td>
                                    <td><?php echo e($booking->reservation_type); ?> </td>
                                    <td><span data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e($booking->special_request); ?>"><?php echo e(Str::limit($booking->special_request,50)); ?></span></td>
                                    <td>
                                        <?php if($booking->status == 1): ?>
                                            <a class="badge badge-success px-2 text-white open-table-modal" data-toggle="modal" data-id="<?php echo e($booking->id); ?>" data-target="#tablemodal"><?php echo e(trans('labels.accept')); ?></a>
                                            <a class="badge badge-danger px-2 text-white" <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="StatusUpdate('<?php echo e($booking->id); ?>','3','<?php echo e(URL::to('/admin/bookings/status')); ?>')" <?php endif; ?>><?php echo e(trans('labels.reject')); ?></a>
                                        <?php elseif($booking->status == 2): ?>
                                            <span class="text-success"><?php echo e(trans('labels.accepted')); ?></span>
                                        <?php elseif($booking->status == 3): ?>
                                            <span class="text-danger"><?php echo e(trans('labels.rejected')); ?></span>
                                        <?php else: ?>
                                            --
                                        <?php endif; ?>
                                    </td>
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
<!-- modal-add-table-number -->
<div id="tablemodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="bookingid" class="col-form-label"><?php echo e(trans('labels.booking')); ?></label>
                        <input type="text" class="form-control" id="bookingid" name="bookingid" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="category_id" class="col-form-label"><?php echo e(trans('labels.table_number')); ?></label>
                        <input type="tel" class="form-control" name="table_number" placeholder="<?php echo e(trans('labels.table_number')); ?>" id="table_number" required="required">
                        <span class="table_error text-danger"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('labels.close')); ?></button>
                    <button type="button" class="btn btn-primary" <?php if(env('Environment') == 'sendbox'): ?> onclick="myFunction()" <?php else: ?> onclick="set_table_number('2','<?php echo e(URL::to('/admin/bookings/status')); ?>')" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url('resources/views/admin/bookings/bookings.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/bookings/bookings.blade.php ENDPATH**/ ?>