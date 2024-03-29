<!--********************************** Nav header start ***********************************-->
<div class="nav-header">
    <div class="brand-logo">
        <a href="<?php echo e(URL::to('/admin/home')); ?>">
            <span class="brand-title" style="color: #fff;">
                <?php echo e(trans('labels.admin_title')); ?>

            </span>
        </a>
    </div>
</div>
<!--********************************** Nav header end ***********************************-->
<!--********************************** Header start ***********************************-->
<div class="header">
    <div class="header-content clearfix">
        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown">
                    <?php if(Auth::user()->is_online == 1): ?>
                        <a href="javascript:void(0)" data-toggle="tooltip"
                            data-original-title="<?php echo e(trans('messages.online_note')); ?>" <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> onclick="changeStatus(2)" <?php endif; ?>><i
                                class="fa fa-power-off is-online"></i> </a>
                    <?php else: ?>
                        <a href="javascript:void(0)" data-toggle="tooltip"
                            data-original-title="<?php echo e(trans('messages.offline_note')); ?>" <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> onclick="changeStatus(1)" <?php endif; ?>><i
                                class="fa fa-power-off"></i></a>
                    <?php endif; ?>
                </li>
                <li class="icons dropdown">
                    <a href="javascript:void(0)" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                        <span class="badge badge-pill gradient-2 badge-primary" id="notificationcount"
                            onclick="clearnoti();"></span>
                    </a>
                </li>
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        
                        <img src="<?php echo e(Helper::image_path(@Helper::appdata()->logo)); ?>" height="40" width="40"
                            alt="">
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li><a href="javascript:void(0);" data-toggle="modal"
                                        data-target="#ChangePasswordModal"><i class="icon-key"></i>
                                        <span><?php echo e(trans('labels.edit_profile')); ?></span></a></li>
                                <li><a href="<?php echo e(URL::to('admin/settings')); ?>"><i class="fa fa-cog"
                                            aria-hidden="true"></i>
                                        <span><?php echo e(trans('labels.general_settings')); ?></span></a></li>
                                <li><a href="<?php echo e(URL::to('/admin/logout')); ?>"><i class="icon-logout"></i>
                                        <span><?php echo e(trans('labels.logout')); ?></span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--********************************** Header end ti-comment-alt ***********************************
<?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/theme/header.blade.php ENDPATH**/ ?>