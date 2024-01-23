<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th><?php echo e(trans('labels.order_number')); ?></th>
            <th><?php echo e(trans('labels.date')); ?></th>
            <th><?php echo e(trans('labels.user_info')); ?></th>
            <th><?php echo e(trans('labels.order_type')); ?></th>
            <th><?php echo e(trans('labels.amount')); ?></th>
            <th><?php echo e(trans('labels.payment_type')); ?></th>
            <th><?php echo e(trans('labels.status')); ?></th>
            <th><?php echo e(trans('labels.action')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $i = 1;
            foreach ($getorders as $orderdata) {
        ?>
        <tr id="dataid<?php echo e($orderdata->id); ?>">
            <td><?php echo e($orderdata->order_number); ?></td>
            <td><?php echo e(Helper::date_format($orderdata->created_at)); ?></td>
            <td><?php echo e($orderdata['user_info']->name); ?></td>
            <td><?php echo e($orderdata->order_type == 1 ? trans('labels.delivery') : trans('labels.pickup')); ?></td>
            <td><?php echo e(Helper::currency_format($orderdata->grand_total)); ?></td>
            <td>
                <?php if($orderdata->transaction_type == 1): ?>
                    <?php echo e(trans('labels.cash')); ?>

                <?php elseif($orderdata->transaction_type == 2): ?>
                    <?php echo e(trans('labels.wallet')); ?>

                <?php elseif($orderdata->transaction_type == 3): ?>
                    <?php echo e(trans('labels.razorpay')); ?>

                <?php elseif($orderdata->transaction_type == 4): ?>
                    <?php echo e(trans('labels.stripe')); ?>

                <?php elseif($orderdata->transaction_type == 5): ?>
                    <?php echo e(trans('labels.flutterwave')); ?>

                <?php elseif($orderdata->transaction_type == 6): ?>
                    <?php echo e(trans('labels.paystack')); ?>

                <?php else: ?>
                    --
                <?php endif; ?>
            </td>
            <td>
                <?php if($orderdata->status == '1'): ?>
                    <span class="text-order-placed"><?php echo e(trans('labels.placed')); ?></span>
                <?php elseif($orderdata->status == '2'): ?>
                    <span class="text-order-preparing"><?php echo e(trans('labels.preparing')); ?></span>
                <?php elseif($orderdata->status == '3'): ?>
                    <span class="text-order-ready"><?php echo e(trans('labels.ready')); ?></span>
                <?php elseif($orderdata->status == '4'): ?>
                    <?php if($orderdata->order_type == 2): ?>
                        <span class="text-order-waitingpickup"><?php echo e(trans('labels.waiting_pickup')); ?></span>
                    <?php else: ?>
                        <span class="text-order-ontheway"><?php echo e(trans('labels.on_the_way')); ?></span>
                    <?php endif; ?>
                <?php elseif($orderdata->status == '5'): ?>
                    <span class="text-order-completed"><?php echo e(trans('labels.completed')); ?></span>
                <?php elseif($orderdata->status == '6' || $orderdata->status == '7'): ?>
                    <span class="text-order-cancelled"><?php echo e(trans('labels.cancelled')); ?></span>
                <?php else: ?>
                    --
                <?php endif; ?>
            </td>
            <td>
                <button type="button" class="btn btn-sm btn-dark dropdown-toggle"
                    data-toggle="dropdown"><?php echo e(trans('labels.action')); ?></button>
                <div class="dropdown-menu dropdown-menu-right">
                    <?php if($orderdata->order_from == 'pos'): ?>
                        <a class="dropdown-item w-auto <?php if($orderdata->status == '2'): ?> fw-600 <?php endif; ?>"
                            data-toggle="tooltip" data-placement="top"
                            data-original-title="<?php echo e(trans('labels.complete')); ?>"
                            onclick="OrderStatusUpdate('<?php echo e($orderdata->id); ?>','5','<?php echo e(URL::to('admin/orders/update')); ?>')">
                            <?php echo e(trans('labels.complete')); ?> </a>
                        <a class="dropdown-item w-auto" data-toggle="tooltip" data-placement="top"
                            data-original-title="<?php echo e(trans('labels.reject')); ?>"
                            onclick="OrderStatusUpdate('<?php echo e($orderdata->id); ?>','6','<?php echo e(URL::to('admin/orders/update')); ?>')">
                            <?php echo e(trans('labels.reject')); ?> </a>
                    <?php else: ?>
                        <a class="dropdown-item w-auto <?php if($orderdata->status == '1'): ?> fw-600 <?php endif; ?>"
                            data-toggle="tooltip" data-placement="top"
                            data-original-title="<?php echo e(trans('labels.accept')); ?>"
                            onclick="OrderStatusUpdate('<?php echo e($orderdata->id); ?>','2','<?php echo e(URL::to('admin/orders/update')); ?>')"><?php echo e(trans('labels.accept')); ?></a>
                        <a class="dropdown-item w-auto <?php if($orderdata->status == '2'): ?> fw-600 <?php endif; ?>"
                            onclick="OrderStatusUpdate('<?php echo e($orderdata->id); ?>','3','<?php echo e(URL::to('admin/orders/update')); ?>')"><?php echo e(trans('labels.ready')); ?></a>
                        <?php if($orderdata->order_type == '2'): ?>
                            <a class="dropdown-item w-auto <?php if($orderdata->status == '3'): ?> fw-600 <?php endif; ?>"
                                onclick="OrderStatusUpdate('<?php echo e($orderdata->id); ?>','4','<?php echo e(URL::to('admin/orders/update')); ?>')"><?php echo e(trans('labels.ready_pickup')); ?></a>
                        <?php else: ?>
                            <a class="dropdown-item w-auto <?php if($orderdata->status == '3'): ?> fw-600 <?php endif; ?> open-AddBookDialog"
                                data-toggle="modal" data-id="<?php echo e($orderdata->id); ?>"
                                data-number="<?php echo e($orderdata->order_number); ?>"
                                data-target="#myModal"><?php echo e(trans('labels.assign_to_driver')); ?></a>
                        <?php endif; ?>
                        <a class="dropdown-item w-auto <?php if($orderdata->status == '4'): ?> fw-600 <?php endif; ?>"
                            data-toggle="tooltip" data-placement="top"
                            data-original-title="<?php echo e(trans('labels.complete')); ?>"
                            onclick="OrderStatusUpdate('<?php echo e($orderdata->id); ?>','5','<?php echo e(URL::to('admin/orders/update')); ?>')"><?php echo e(trans('labels.complete')); ?></a>
                        <a class="dropdown-item w-auto" data-toggle="tooltip" data-placement="top"
                            data-original-title="<?php echo e(trans('labels.reject')); ?>"
                            onclick="OrderStatusUpdate('<?php echo e($orderdata->id); ?>','6','<?php echo e(URL::to('admin/orders/update')); ?>')"><?php echo e(trans('labels.reject')); ?></a>
                    <?php endif; ?>
                </div>
                <a class="btn btn-sm btn-light" data-toggle="tooltip" data-placement="top"
                    data-original-title="<?php echo e(trans('labels.view')); ?>"
                    href="<?php echo e(URL::to('admin/invoice/' . $orderdata->id)); ?>">
                    <i class="ti-more-alt"></i>
                </a>
            </td>
        </tr>
        <?php
        $i++;
        }
        ?>
    </tbody>
</table>
<?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/orders/orderstable.blade.php ENDPATH**/ ?>