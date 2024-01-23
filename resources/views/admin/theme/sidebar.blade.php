<!--********************************** Sidebar start ***********************************-->
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            @php $modules = explode(',',Helper::get_roles()); @endphp
            <li class="{{request()->is('admin/home*')?'active':''}}" id="1">
                <a href="{{URL::to('/admin/home')}}" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">{{trans('labels.dashboard')}}</span>
                </a>
            </li>
            @if (\App\SystemAddons::where('unique_identifier', 'pos')->first() != null && \App\SystemAddons::where('unique_identifier', 'pos')->first()->activated)
            <li class="{{Auth::user()->type != 1 ? in_array('26',$modules)==true?'':'dn-imp' : ''}}" id="26">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa fa-shopping-bag menu-icon"></i><span class="nav-text">{{trans('labels.pos')}} <span class="badge badge-danger" style="color: #fff;">Addon</span></span></a>
                <ul aria-expanded="false">
                    <li class="{{request()->is('admin/pos/items*')?'active':''}}"><a href="{{URL::to('/admin/pos/items')}}">{{trans('labels.items')}}</a></li>
                    <li class="{{request()->is('admin/pos/orders*')?'active':''}}"><a href="{{URL::to('/admin/pos/orders')}}">{{trans('labels.orders')}}</a></li>
                </ul>
            </li>
            @endif
            <li class="{{Auth::user()->type != 1 ? in_array('27',$modules)==true?'':'dn-imp' : ''}} {{request()->is('admin/bookings*')?'active':''}}" id="27">
                <a href="{{URL::to('/admin/bookings')}}" aria-expanded="false">
                    <i class="fa fa-table"></i><span class="nav-text">{{trans('labels.bookings')}}</span>
                </a>
            </li>
            <li class="{{Auth::user()->type != 1 ? in_array('2',$modules)==true?'':'dn-imp' : ''}} {{request()->is('admin/slider*')?'active':''}}" id="2">
                <a href="{{URL::to('/admin/slider')}}" aria-expanded="false">
                    <i class="fa fa-image"></i><span class="nav-text">{{trans('labels.sliders')}} {{trans('labels.only_website')}}</span>
                </a>
            </li>
            <li class="{{Auth::user()->type != 1 ? in_array('3',$modules)==true?'':'dn-imp' : ''}}" id="3">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon-menu menu-icon"></i><span class="nav-text">{{trans('labels.categories')}}</span></a>
                <ul aria-expanded="false">
                    <li class="{{request()->is('admin/category*')?'active':''}}"><a href="{{URL::to('/admin/category')}}">{{trans('labels.categories')}}</a></li>
                    <li class="{{request()->is('admin/sub-category*')?'active':''}}"><a href="{{URL::to('/admin/sub-category')}}">{{trans('labels.subcategories')}}</a></li>
                </ul>
            </li>
            <li class="{{Auth::user()->type != 1 ? in_array('4',$modules)==true?'':'dn-imp' : ''}} {{request()->is('admin/addons*')?'active':''}}" id="4">
                <a href="{{URL::to('/admin/addons')}}" aria-expanded="false">
                    <i class="fa fa-plus"></i><span class="nav-text">{{trans('labels.addons')}}</span>
                </a>
            </li>
            <li class="{{Auth::user()->type != 1 ? in_array('5',$modules)==true?'':'dn-imp' : ''}} {{request()->is('admin/item*')?'active':''}}" id="5">
                <a href="{{URL::to('/admin/item')}}" aria-expanded="false">
                    <i class="fa fa-plus"></i><span class="nav-text">{{trans('labels.items')}}</span>
                </a>
            </li>
            <li class="{{Auth::user()->type != 1 ? in_array('6',$modules)==true?'':'dn-imp' : ''}}" id="6">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa fa-bullhorn menu-icon"></i><span class="nav-text">{{trans('labels.banners')}}</span></a>
                <ul aria-expanded="false">
                    <li class="{{request()->is('admin/banner*')?'active':''}}"><a href="{{URL::to('/admin/banner')}}">{{trans('labels.banners')}}</a></li>
                    <li class="{{request()->is('admin/banner-section-1*')?'active':''}}"><a href="{{URL::to('/admin/bannersection-1')}}">{{trans('labels.section-1')}}</a></li>
                    <li class="{{request()->is('admin/banner-section-2*')?'active':''}}"><a href="{{URL::to('/admin/bannersection-2')}}">{{trans('labels.section-2')}}</a></li>
                    <li class="{{request()->is('admin/banner-section-3*')?'active':''}}"><a href="{{URL::to('/admin/bannersection-3')}}">{{trans('labels.section-3')}}</a></li>
                </ul>
            </li>
            <li class="{{Auth::user()->type != 1 ? in_array('7',$modules)==true?'':'dn-imp' : ''}} {{request()->is('admin/zone*')?'active':''}}" id="7">
                <a href="{{URL::to('/admin/zone')}}" aria-expanded="false">
                    <i class="fa fa-map" aria-hidden="true"></i><span class="nav-text">{{trans('labels.zone')}}</span>
                </a>
            </li>
            <li class="{{Auth::user()->type != 1 ? in_array('9',$modules)==true?'':'dn-imp' : ''}} {{request()->is('admin/promocode*')?'active':''}}" id="9">
                <a href="{{URL::to('/admin/promocode')}}" aria-expanded="false">
                    <i class="fa fa-tag"></i><span class="nav-text">{{trans('labels.promocodes')}}</span>
                </a>
            </li>
            <!-- <li class="{{Auth::user()->type != 1 ? in_array('10',$modules)==true?'':'dn-imp' : ''}} {{request()->is('admin/time*')?'active':''}}" id="10">
                <a href="{{URL::to('/admin/time')}}" aria-expanded="false">
                    <i class="fa fa-clock-o"></i><span class="nav-text">{{trans('labels.working_hours')}}</span>
                </a>
            </li> -->
            <li class="{{Auth::user()->type != 1 ? in_array('11',$modules)==true?'':'dn-imp' : ''}} {{request()->is('admin/payment*')?'active':''}}" id="11">
                <a href="{{URL::to('/admin/payment')}}" aria-expanded="false">
                    <i class="fa fa-usd"></i><span class="nav-text">{{trans('labels.payment_methods')}}</span>
                </a>
            </li>
            <li class="{{Auth::user()->type != 1 ? in_array('12',$modules)==true?'':'dn-imp' : ''}} {{request()->is('admin/orders*')?'active':''}}" id="12">
                <a href="{{URL::to('/admin/orders')}}" aria-expanded="false">
                    <i class="fa fa-shopping-cart"></i><span class="nav-text">{{trans('labels.orders')}}</span>
                </a>
            </li>
            <li class="{{Auth::user()->type != 1 ? in_array('14',$modules)==true?'':'dn-imp' : ''}} {{request()->is('admin/reviews*')?'active':''}}" id="14">
                <a href="{{URL::to('/admin/reviews')}}" aria-expanded="false">
                    <i class="fa fa-star"></i><span class="nav-text">{{trans('labels.reviews')}}</span>
                </a>
            </li>
            <li class="{{Auth::user()->type != 1 ? in_array('15',$modules)==true?'':'dn-imp' : ''}} {{request()->is('admin/report*')?'active':''}}" id="15">
                <a href="{{URL::to('/admin/report')}}" aria-expanded="false">
                    <i class="fa fa-bar-chart"></i><span class="nav-text">{{trans('labels.report')}}</span>
                </a>
            </li>
            <li class="{{Auth::user()->type != 1 ? in_array('16',$modules)==true?'':'dn-imp' : ''}} {{request()->is('admin/notification*')?'active':''}}" id="16">
                <a href="{{URL::to('/admin/notification')}}" aria-expanded="false">
                    <i class="fa fa-bell"></i><span class="nav-text">{{trans('labels.notification')}} {{trans('labels.only_mobile')}}</span>
                </a>
            </li>
            <li class="{{Auth::user()->type != 1 ? in_array('17',$modules)==true?'':'dn-imp' : ''}} {{request()->is('admin/contact*')?'active':''}}" id="17">
                <a href="{{URL::to('/admin/contact')}}" aria-expanded="false">
                    <i class="fa fa-envelope"></i><span class="nav-text">{{trans('labels.inquiries')}}</span>
                </a>
            </li>
            <li class="{{Auth::user()->type != 1 ? in_array('18',$modules)==true?'':'dn-imp' : ''}} {{request()->is('admin/roles*')?'active':''}}" id="18">
                <a href="{{URL::to('/admin/roles')}}" aria-expanded="false">
                    <i class="fa fa-user-secret"></i><span class="nav-text">{{trans('labels.role_management')}}</span>
                </a>
            </li>
            <li class="{{Auth::user()->type != 1 ? in_array('24',$modules)==true?'':'dn-imp' : ''}} {{request()->is('admin/employee*')?'active':''}}" id="24">
                <a href="{{URL::to('/admin/employee')}}" aria-expanded="false">
                    <i class="fa fa-users"></i><span class="nav-text">{{trans('labels.employee')}}</span>
                </a>
            </li>
            <li class="{{Auth::user()->type != 1 ? in_array('8',$modules)==true?'':'dn-imp' : ''}} {{request()->is('admin/driver*')?'active':''}}" id="8">
                <a href="{{URL::to('/admin/driver')}}" aria-expanded="false">
                    <i class="fa fa-car"></i><span class="nav-text">{{trans('labels.drivers')}}</span>
                </a>
            </li>
            <li class="{{Auth::user()->type != 1 ? in_array('13',$modules)==true?'':'dn-imp' : ''}} {{request()->is('admin/users*')?'active':''}}" id="13">
                <a href="{{URL::to('/admin/users')}}" aria-expanded="false">
                    <i class="fa fa-users"></i><span class="nav-text">{{trans('labels.users')}}</span>
                </a>
            </li>
            <li class="{{Auth::user()->type != 1 ? in_array('19',$modules)==true?'':'dn-imp' : ''}}" id="19">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon-note menu-icon"></i><span class="nav-text">{{trans('labels.cms_pages')}}</span></a>
                <ul aria-expanded="false">
                    <li class="{{request()->is('admin/privacypolicy*')?'active':''}}"><a href="{{URL::to('/admin/privacypolicy')}}">{{trans('labels.privacy_policy')}}</a></li>
                    <li class="{{request()->is('admin/termscondition*')?'active':''}}"><a href="{{URL::to('/admin/termscondition')}}">{{trans('labels.terms_conditions')}}</a></li>
                    <li class="{{request()->is('admin/settings*')?'active':''}}"><a href="{{URL::to('/admin/settings')}}">{{trans('labels.general_settings')}}</a></li>
                </ul>
            </li>
            <li class="{{Auth::user()->type != 1 ? in_array('25',$modules)==true?'':'dn-imp' : ''}}" id="25">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon-note menu-icon"></i><span class="nav-text">{{trans('labels.other_pages')}}</span></a>
                <ul aria-expanded="false">
                    <li class="{{request()->is('admin/blogs*')?'active':''}}"><a href="{{URL::to('/admin/blogs')}}">{{trans('labels.blogs')}}</a></li>
                    <li class="{{request()->is('admin/our-team*')?'active':''}}"><a href="{{URL::to('/admin/our-team')}}">{{trans('labels.our_team')}}</a></li>
                    <li class="{{request()->is('admin/tutorial*')?'active':''}}"><a href="{{URL::to('/admin/tutorial')}}">{{trans('labels.tutorial')}}</a></li>
                    <li class="{{request()->is('admin/faq*')?'active':''}}"><a href="{{URL::to('/admin/faq')}}">{{trans('labels.faq')}}</a></li>
                    <li class="{{request()->is('admin/gallery*')?'active':''}}"><a href="{{URL::to('/admin/gallery')}}">{{trans('labels.gallery')}}</a></li>
                </ul>
            </li>
            <li class="{{Auth::user()->type != 1 ? in_array('20',$modules)==true?'':'dn-imp' : ''}} {{request()->is('admin/systemaddons*')?'active':''}}" id="20">
                <a href="{{URL::to('/admin/systemaddons')}}" aria-expanded="false">
                    <i class="fa fa-puzzle-piece"></i><span class="nav-text">{{trans('labels.addons_manager')}}</span>
                </a>
            </li>
            <li class="{{Auth::user()->type != 1 ? in_array('21',$modules)==true?'':'dn-imp' : ''}} {{request()->is('admin/clear-cache*')?'active':''}}" id="21">
                <a href="{{URL::to('/admin/clear-cache')}}" aria-expanded="false">
                    <i class="fa fa-refresh"></i><span class="nav-text">{{trans('labels.clear_cache')}}</span>
                </a>
            </li>
            @if (\App\SystemAddons::where('unique_identifier', 'otp')->first() != null && \App\SystemAddons::where('unique_identifier', 'otp')->first()->activated)
            <li class="{{Auth::user()->type != 1 ? in_array('22',$modules)==true?'':'dn-imp' : ''}} {{request()->is('admin/otp-configuration*')?'active':''}}" id="22">
                <a href="{{URL::to('/admin/otp-configuration')}}" aria-expanded="false">
                    <i class="fa fa-key"></i><span class="nav-text">OTP Configuration <span class="badge badge-danger" style="color: #fff;">Addon</span></span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>
<!--********************************** Sidebar end ***********************************-->