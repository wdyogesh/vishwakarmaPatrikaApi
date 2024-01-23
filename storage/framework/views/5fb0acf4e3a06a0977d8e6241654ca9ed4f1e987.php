<!--********************************** Sidebar start ***********************************-->
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <?php $modules = explode(',',Helper::get_roles()); ?>
            <li class="<?php echo e(request()->is('admin/home*')?'active':''); ?>" id="1">
                <a href="<?php echo e(URL::to('/admin/home')); ?>" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text"><?php echo e(trans('labels.dashboard')); ?></span>
                </a>
            </li>
            <?php if(\App\SystemAddons::where('unique_identifier', 'pos')->first() != null && \App\SystemAddons::where('unique_identifier', 'pos')->first()->activated): ?>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('26',$modules)==true?'':'dn-imp' : ''); ?>" id="26">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa fa-shopping-bag menu-icon"></i><span class="nav-text"><?php echo e(trans('labels.pos')); ?> <span class="badge badge-danger" style="color: #fff;">Addon</span></span></a>
                <ul aria-expanded="false">
                    <li class="<?php echo e(request()->is('admin/pos/items*')?'active':''); ?>"><a href="<?php echo e(URL::to('/admin/pos/items')); ?>"><?php echo e(trans('labels.items')); ?></a></li>
                    <li class="<?php echo e(request()->is('admin/pos/orders*')?'active':''); ?>"><a href="<?php echo e(URL::to('/admin/pos/orders')); ?>"><?php echo e(trans('labels.orders')); ?></a></li>
                </ul>
            </li>
            <?php endif; ?>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('27',$modules)==true?'':'dn-imp' : ''); ?> <?php echo e(request()->is('admin/bookings*')?'active':''); ?>" id="27">
                <a href="<?php echo e(URL::to('/admin/bookings')); ?>" aria-expanded="false">
                    <i class="fa fa-table"></i><span class="nav-text"><?php echo e(trans('labels.bookings')); ?></span>
                </a>
            </li>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('2',$modules)==true?'':'dn-imp' : ''); ?> <?php echo e(request()->is('admin/slider*')?'active':''); ?>" id="2">
                <a href="<?php echo e(URL::to('/admin/slider')); ?>" aria-expanded="false">
                    <i class="fa fa-image"></i><span class="nav-text"><?php echo e(trans('labels.sliders')); ?> <?php echo e(trans('labels.only_website')); ?></span>
                </a>
            </li>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('3',$modules)==true?'':'dn-imp' : ''); ?>" id="3">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon-menu menu-icon"></i><span class="nav-text"><?php echo e(trans('labels.categories')); ?></span></a>
                <ul aria-expanded="false">
                    <li class="<?php echo e(request()->is('admin/category*')?'active':''); ?>"><a href="<?php echo e(URL::to('/admin/category')); ?>"><?php echo e(trans('labels.categories')); ?></a></li>
                    <li class="<?php echo e(request()->is('admin/sub-category*')?'active':''); ?>"><a href="<?php echo e(URL::to('/admin/sub-category')); ?>"><?php echo e(trans('labels.subcategories')); ?></a></li>
                </ul>
            </li>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('4',$modules)==true?'':'dn-imp' : ''); ?> <?php echo e(request()->is('admin/addons*')?'active':''); ?>" id="4">
                <a href="<?php echo e(URL::to('/admin/addons')); ?>" aria-expanded="false">
                    <i class="fa fa-plus"></i><span class="nav-text"><?php echo e(trans('labels.addons')); ?></span>
                </a>
            </li>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('5',$modules)==true?'':'dn-imp' : ''); ?> <?php echo e(request()->is('admin/item*')?'active':''); ?>" id="5">
                <a href="<?php echo e(URL::to('/admin/item')); ?>" aria-expanded="false">
                    <i class="fa fa-plus"></i><span class="nav-text"><?php echo e(trans('labels.items')); ?></span>
                </a>
            </li>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('6',$modules)==true?'':'dn-imp' : ''); ?>" id="6">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa fa-bullhorn menu-icon"></i><span class="nav-text"><?php echo e(trans('labels.banners')); ?></span></a>
                <ul aria-expanded="false">
                    <li class="<?php echo e(request()->is('admin/banner*')?'active':''); ?>"><a href="<?php echo e(URL::to('/admin/banner')); ?>"><?php echo e(trans('labels.banners')); ?></a></li>
                    <li class="<?php echo e(request()->is('admin/banner-section-1*')?'active':''); ?>"><a href="<?php echo e(URL::to('/admin/bannersection-1')); ?>"><?php echo e(trans('labels.section-1')); ?></a></li>
                    <li class="<?php echo e(request()->is('admin/banner-section-2*')?'active':''); ?>"><a href="<?php echo e(URL::to('/admin/bannersection-2')); ?>"><?php echo e(trans('labels.section-2')); ?></a></li>
                    <li class="<?php echo e(request()->is('admin/banner-section-3*')?'active':''); ?>"><a href="<?php echo e(URL::to('/admin/bannersection-3')); ?>"><?php echo e(trans('labels.section-3')); ?></a></li>
                </ul>
            </li>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('7',$modules)==true?'':'dn-imp' : ''); ?> <?php echo e(request()->is('admin/zone*')?'active':''); ?>" id="7">
                <a href="<?php echo e(URL::to('/admin/zone')); ?>" aria-expanded="false">
                    <i class="fa fa-map" aria-hidden="true"></i><span class="nav-text"><?php echo e(trans('labels.zone')); ?></span>
                </a>
            </li>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('9',$modules)==true?'':'dn-imp' : ''); ?> <?php echo e(request()->is('admin/promocode*')?'active':''); ?>" id="9">
                <a href="<?php echo e(URL::to('/admin/promocode')); ?>" aria-expanded="false">
                    <i class="fa fa-tag"></i><span class="nav-text"><?php echo e(trans('labels.promocodes')); ?></span>
                </a>
            </li>
            <!-- <li class="<?php echo e(Auth::user()->type != 1 ? in_array('10',$modules)==true?'':'dn-imp' : ''); ?> <?php echo e(request()->is('admin/time*')?'active':''); ?>" id="10">
                <a href="<?php echo e(URL::to('/admin/time')); ?>" aria-expanded="false">
                    <i class="fa fa-clock-o"></i><span class="nav-text"><?php echo e(trans('labels.working_hours')); ?></span>
                </a>
            </li> -->
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('11',$modules)==true?'':'dn-imp' : ''); ?> <?php echo e(request()->is('admin/payment*')?'active':''); ?>" id="11">
                <a href="<?php echo e(URL::to('/admin/payment')); ?>" aria-expanded="false">
                    <i class="fa fa-usd"></i><span class="nav-text"><?php echo e(trans('labels.payment_methods')); ?></span>
                </a>
            </li>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('12',$modules)==true?'':'dn-imp' : ''); ?> <?php echo e(request()->is('admin/orders*')?'active':''); ?>" id="12">
                <a href="<?php echo e(URL::to('/admin/orders')); ?>" aria-expanded="false">
                    <i class="fa fa-shopping-cart"></i><span class="nav-text"><?php echo e(trans('labels.orders')); ?></span>
                </a>
            </li>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('14',$modules)==true?'':'dn-imp' : ''); ?> <?php echo e(request()->is('admin/reviews*')?'active':''); ?>" id="14">
                <a href="<?php echo e(URL::to('/admin/reviews')); ?>" aria-expanded="false">
                    <i class="fa fa-star"></i><span class="nav-text"><?php echo e(trans('labels.reviews')); ?></span>
                </a>
            </li>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('15',$modules)==true?'':'dn-imp' : ''); ?> <?php echo e(request()->is('admin/report*')?'active':''); ?>" id="15">
                <a href="<?php echo e(URL::to('/admin/report')); ?>" aria-expanded="false">
                    <i class="fa fa-bar-chart"></i><span class="nav-text"><?php echo e(trans('labels.report')); ?></span>
                </a>
            </li>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('16',$modules)==true?'':'dn-imp' : ''); ?> <?php echo e(request()->is('admin/notification*')?'active':''); ?>" id="16">
                <a href="<?php echo e(URL::to('/admin/notification')); ?>" aria-expanded="false">
                    <i class="fa fa-bell"></i><span class="nav-text"><?php echo e(trans('labels.notification')); ?> <?php echo e(trans('labels.only_mobile')); ?></span>
                </a>
            </li>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('17',$modules)==true?'':'dn-imp' : ''); ?> <?php echo e(request()->is('admin/contact*')?'active':''); ?>" id="17">
                <a href="<?php echo e(URL::to('/admin/contact')); ?>" aria-expanded="false">
                    <i class="fa fa-envelope"></i><span class="nav-text"><?php echo e(trans('labels.inquiries')); ?></span>
                </a>
            </li>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('18',$modules)==true?'':'dn-imp' : ''); ?> <?php echo e(request()->is('admin/roles*')?'active':''); ?>" id="18">
                <a href="<?php echo e(URL::to('/admin/roles')); ?>" aria-expanded="false">
                    <i class="fa fa-user-secret"></i><span class="nav-text"><?php echo e(trans('labels.role_management')); ?></span>
                </a>
            </li>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('24',$modules)==true?'':'dn-imp' : ''); ?> <?php echo e(request()->is('admin/employee*')?'active':''); ?>" id="24">
                <a href="<?php echo e(URL::to('/admin/employee')); ?>" aria-expanded="false">
                    <i class="fa fa-users"></i><span class="nav-text"><?php echo e(trans('labels.employee')); ?></span>
                </a>
            </li>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('8',$modules)==true?'':'dn-imp' : ''); ?> <?php echo e(request()->is('admin/driver*')?'active':''); ?>" id="8">
                <a href="<?php echo e(URL::to('/admin/driver')); ?>" aria-expanded="false">
                    <i class="fa fa-car"></i><span class="nav-text"><?php echo e(trans('labels.drivers')); ?></span>
                </a>
            </li>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('13',$modules)==true?'':'dn-imp' : ''); ?> <?php echo e(request()->is('admin/users*')?'active':''); ?>" id="13">
                <a href="<?php echo e(URL::to('/admin/users')); ?>" aria-expanded="false">
                    <i class="fa fa-users"></i><span class="nav-text"><?php echo e(trans('labels.users')); ?></span>
                </a>
            </li>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('19',$modules)==true?'':'dn-imp' : ''); ?>" id="19">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon-note menu-icon"></i><span class="nav-text"><?php echo e(trans('labels.cms_pages')); ?></span></a>
                <ul aria-expanded="false">
                    <li class="<?php echo e(request()->is('admin/privacypolicy*')?'active':''); ?>"><a href="<?php echo e(URL::to('/admin/privacypolicy')); ?>"><?php echo e(trans('labels.privacy_policy')); ?></a></li>
                    <li class="<?php echo e(request()->is('admin/termscondition*')?'active':''); ?>"><a href="<?php echo e(URL::to('/admin/termscondition')); ?>"><?php echo e(trans('labels.terms_conditions')); ?></a></li>
                    <li class="<?php echo e(request()->is('admin/settings*')?'active':''); ?>"><a href="<?php echo e(URL::to('/admin/settings')); ?>"><?php echo e(trans('labels.general_settings')); ?></a></li>
                </ul>
            </li>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('25',$modules)==true?'':'dn-imp' : ''); ?>" id="25">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon-note menu-icon"></i><span class="nav-text"><?php echo e(trans('labels.other_pages')); ?></span></a>
                <ul aria-expanded="false">
                    <li class="<?php echo e(request()->is('admin/blogs*')?'active':''); ?>"><a href="<?php echo e(URL::to('/admin/blogs')); ?>"><?php echo e(trans('labels.blogs')); ?></a></li>
                    <li class="<?php echo e(request()->is('admin/our-team*')?'active':''); ?>"><a href="<?php echo e(URL::to('/admin/our-team')); ?>"><?php echo e(trans('labels.our_team')); ?></a></li>
                    <li class="<?php echo e(request()->is('admin/tutorial*')?'active':''); ?>"><a href="<?php echo e(URL::to('/admin/tutorial')); ?>"><?php echo e(trans('labels.tutorial')); ?></a></li>
                    <li class="<?php echo e(request()->is('admin/faq*')?'active':''); ?>"><a href="<?php echo e(URL::to('/admin/faq')); ?>"><?php echo e(trans('labels.faq')); ?></a></li>
                    <li class="<?php echo e(request()->is('admin/gallery*')?'active':''); ?>"><a href="<?php echo e(URL::to('/admin/gallery')); ?>"><?php echo e(trans('labels.gallery')); ?></a></li>
                </ul>
            </li>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('20',$modules)==true?'':'dn-imp' : ''); ?> <?php echo e(request()->is('admin/systemaddons*')?'active':''); ?>" id="20">
                <a href="<?php echo e(URL::to('/admin/systemaddons')); ?>" aria-expanded="false">
                    <i class="fa fa-puzzle-piece"></i><span class="nav-text"><?php echo e(trans('labels.addons_manager')); ?></span>
                </a>
            </li>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('21',$modules)==true?'':'dn-imp' : ''); ?> <?php echo e(request()->is('admin/clear-cache*')?'active':''); ?>" id="21">
                <a href="<?php echo e(URL::to('/admin/clear-cache')); ?>" aria-expanded="false">
                    <i class="fa fa-refresh"></i><span class="nav-text"><?php echo e(trans('labels.clear_cache')); ?></span>
                </a>
            </li>
            <?php if(\App\SystemAddons::where('unique_identifier', 'otp')->first() != null && \App\SystemAddons::where('unique_identifier', 'otp')->first()->activated): ?>
            <li class="<?php echo e(Auth::user()->type != 1 ? in_array('22',$modules)==true?'':'dn-imp' : ''); ?> <?php echo e(request()->is('admin/otp-configuration*')?'active':''); ?>" id="22">
                <a href="<?php echo e(URL::to('/admin/otp-configuration')); ?>" aria-expanded="false">
                    <i class="fa fa-key"></i><span class="nav-text">OTP Configuration <span class="badge badge-danger" style="color: #fff;">Addon</span></span>
                </a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<!--********************************** Sidebar end ***********************************--><?php /**PATH D:\XAMPP\htdocs\mywinkel\resources\views/admin/theme/sidebar.blade.php ENDPATH**/ ?>