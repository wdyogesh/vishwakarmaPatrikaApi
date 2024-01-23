<?php $__env->startSection('content'); ?>
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(trans('labels.dashboard')); ?></a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to('admin/settings')); ?>"><?php echo e(trans('labels.settings')); ?></a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <form action="<?php echo e(URL::to('admin/settings/update')); ?>" method="post"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.email')); ?> </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="email"
                                                    value="<?php echo e(@$getsettings->email); ?>"
                                                    placeholder="<?php echo e(trans('labels.email')); ?>">
                                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.mobile')); ?> </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="mobile"
                                                    value="<?php echo e(@$getsettings->mobile); ?>"
                                                    placeholder="<?php echo e(trans('labels.mobile')); ?>">
                                                <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.currency')); ?> </label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="<?php echo e(trans('labels.currency')); ?>"
                                                    value="<?php echo e(@$getsettings->currency); ?>" class="form-control"
                                                    name="currency" id="currency">
                                                <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.currency_position')); ?> </label>
                                            <div class="col-lg-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input mr-0" type="radio"
                                                        name="currency_position" id="inlineRadio1" value="1"
                                                        <?php echo e(@$getsettings->currency_position == 1 ? 'checked' : ''); ?>>
                                                    <label class="form-check-label" for="inlineRadio1"><?php echo e(trans('labels.left')); ?></label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input mr-0" type="radio"
                                                        name="currency_position" id="inlineRadio2" value="2"
                                                        <?php echo e(@$getsettings->currency_position == 2 ? 'checked' : ''); ?>>
                                                    <label class="form-check-label" for="inlineRadio2"><?php echo e(trans('labels.right')); ?></label>
                                                </div>
                                                <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.referral_amount')); ?> <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text"
                                                    placeholder="<?php echo e(trans('labels.referral_amount')); ?>"
                                                    value="<?php echo e(@$getsettings->referral_amount); ?>" class="form-control"
                                                    name="referral_amount" id="referral_amount">
                                                <?php $__errorArgs = ['referral_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.max_order_qty')); ?> <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text"
                                                    placeholder="<?php echo e(trans('labels.max_order_qty')); ?>"
                                                    value="<?php echo e(@$getsettings->max_order_qty); ?>" class="form-control"
                                                    name="max_order_qty" id="max_order_qty">
                                                <?php $__errorArgs = ['max_order_qty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.min_amount')); ?> <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text"
                                                    placeholder="<?php echo e(trans('labels.min_amount')); ?>"
                                                    value="<?php echo e(@$getsettings->min_order_amount); ?>" class="form-control"
                                                    name="min_order_amount" id="min_order_amount">
                                                <?php $__errorArgs = ['min_order_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.max_amount')); ?> <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text"
                                                    placeholder="<?php echo e(trans('labels.max_amount')); ?>"
                                                    value="<?php echo e(@$getsettings->max_order_amount); ?>" class="form-control"
                                                    name="max_order_amount" id="max_order_amount">
                                                <?php $__errorArgs = ['max_order_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.delivery_charge_per_km')); ?> <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text"
                                                    placeholder="<?php echo e(trans('labels.delivery_charge_per_km')); ?>"
                                                    value="<?php echo e(@$getsettings->delivery_charge); ?>" class="form-control"
                                                    name="delivery_charge" id="delivery_charge">
                                                <?php $__errorArgs = ['delivery_charge'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100">
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.firebase_key')); ?> <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="firebase"
                                                    id="firebase" value="<?php echo e(@$getsettings->firebase); ?>"
                                                    placeholder="<?php echo e(trans('labels.firebase_key')); ?>">
                                                <?php $__errorArgs = ['firebase'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.map_key')); ?> </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="map" id="map"
                                                    value="<?php echo e(@$getsettings->map); ?>"
                                                    placeholder="<?php echo e(trans('labels.map_key')); ?>">
                                                <?php $__errorArgs = ['map'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.timezone')); ?> </label>
                                            <div class="col-lg-9">
                                                <select class="form-control selectpicker" name="timezone" id="timezone"
                                                    data-live-search="true">
                                                    <option value="" selected>
                                                        <?php echo e(trans('labels.select')); ?>

                                                    </option>
                                                    <option value="Pacific/Midway"
                                                        <?php echo e(@$getsettings->timezone == 'Pacific/Midway' ? 'selected' : ''); ?>>
                                                        (GMT-11:00) Midway Island, Samoa</option>
                                                    <option value="America/Adak"
                                                        <?php echo e(@$getsettings->timezone == 'America/Adak' ? 'selected' : ''); ?>>
                                                        (GMT-10:00) Hawaii-Aleutian</option>
                                                    <option value="Etc/GMT+10"
                                                        <?php echo e(@$getsettings->timezone == 'Etc/GMT+10' ? 'selected' : ''); ?>>
                                                        (GMT-10:00) Hawaii</option>
                                                    <option value="Pacific/Marquesas"
                                                        <?php echo e(@$getsettings->timezone == 'Pacific/Marquesas' ? 'selected' : ''); ?>>
                                                        (GMT-09:30) Marquesas Islands</option>
                                                    <option value="Pacific/Gambier"
                                                        <?php echo e(@$getsettings->timezone == 'Pacific/Gambier' ? 'selected' : ''); ?>>
                                                        (GMT-09:00) Gambier Islands</option>
                                                    <option value="America/Anchorage"
                                                        <?php echo e(@$getsettings->timezone == 'America/Anchorage' ? 'selected' : ''); ?>>
                                                        (GMT-09:00) Alaska</option>
                                                    <option value="America/Ensenada"
                                                        <?php echo e(@$getsettings->timezone == 'America/Ensenada' ? 'selected' : ''); ?>>
                                                        (GMT-08:00) Tijuana, Baja California</option>
                                                    <option value="Etc/GMT+8"
                                                        <?php echo e(@$getsettings->timezone == 'Etc/GMT+8' ? 'selected' : ''); ?>>
                                                        (GMT-08:00) Pitcairn Islands</option>
                                                    <option value="America/Los_Angeles"
                                                        <?php echo e(@$getsettings->timezone == 'America/Los_Angeles' ? 'selected' : ''); ?>>
                                                        (GMT-08:00) Pacific Time (US & Canada)</option>
                                                    <option value="America/Denver"
                                                        <?php echo e(@$getsettings->timezone == 'America/Denver' ? 'selected' : ''); ?>>
                                                        (GMT-07:00) Mountain Time (US & Canada)</option>
                                                    <option value="America/Chihuahua"
                                                        <?php echo e(@$getsettings->timezone == 'America/Chihuahua' ? 'selected' : ''); ?>>
                                                        (GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                                                    <option value="America/Dawson_Creek"
                                                        <?php echo e(@$getsettings->timezone == 'America/Dawson_Creek' ? 'selected' : ''); ?>>
                                                        (GMT-07:00) Arizona</option>
                                                    <option value="America/Belize"
                                                        <?php echo e(@$getsettings->timezone == 'America/Belize' ? 'selected' : ''); ?>>
                                                        (GMT-06:00) Saskatchewan, Central America</option>
                                                    <option value="America/Cancun"
                                                        <?php echo e(@$getsettings->timezone == 'America/Cancun' ? 'selected' : ''); ?>>
                                                        (GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                                                    <option value="Chile/EasterIsland"
                                                        <?php echo e(@$getsettings->timezone == 'Chile/EasterIsland' ? 'selected' : ''); ?>>
                                                        (GMT-06:00) Easter Island</option>
                                                    <option value="America/Chicago"
                                                        <?php echo e(@$getsettings->timezone == 'America/Chicago' ? 'selected' : ''); ?>>
                                                        (GMT-06:00) Central Time (US & Canada)</option>
                                                    <option value="America/New_York"
                                                        <?php echo e(@$getsettings->timezone == 'America/New_York' ? 'selected' : ''); ?>>
                                                        (GMT-05:00) Eastern Time (US & Canada)</option>
                                                    <option value="America/Havana"
                                                        <?php echo e(@$getsettings->timezone == 'America/Havana' ? 'selected' : ''); ?>>
                                                        (GMT-05:00) Cuba</option>
                                                    <option value="America/Bogota"
                                                        <?php echo e(@$getsettings->timezone == 'America/Bogota' ? 'selected' : ''); ?>>
                                                        (GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                                                    <option value="America/Caracas"
                                                        <?php echo e(@$getsettings->timezone == 'America/Caracas' ? 'selected' : ''); ?>>
                                                        (GMT-04:30) Caracas</option>
                                                    <option value="America/Santiago"
                                                        <?php echo e(@$getsettings->timezone == 'America/Santiago' ? 'selected' : ''); ?>>
                                                        (GMT-04:00) Santiago</option>
                                                    <option value="America/La_Paz"
                                                        <?php echo e(@$getsettings->timezone == 'America/La_Paz' ? 'selected' : ''); ?>>
                                                        (GMT-04:00) La Paz</option>
                                                    <option value="Atlantic/Stanley"
                                                        <?php echo e(@$getsettings->timezone == 'Atlantic/Stanley' ? 'selected' : ''); ?>>
                                                        (GMT-04:00) Faukland Islands</option>
                                                    <option value="America/Campo_Grande"
                                                        <?php echo e(@$getsettings->timezone == 'America/Campo_Grande' ? 'selected' : ''); ?>>
                                                        (GMT-04:00) Brazil</option>
                                                    <option value="America/Goose_Bay"
                                                        <?php echo e(@$getsettings->timezone == 'America/Goose_Bay' ? 'selected' : ''); ?>>
                                                        (GMT-04:00) Atlantic Time (Goose Bay)</option>
                                                    <option value="America/Glace_Bay"
                                                        <?php echo e(@$getsettings->timezone == 'America/Glace_Bay' ? 'selected' : ''); ?>>
                                                        (GMT-04:00) Atlantic Time (Canada)</option>
                                                    <option value="America/St_Johns"
                                                        <?php echo e(@$getsettings->timezone == 'America/St_Johns' ? 'selected' : ''); ?>>
                                                        (GMT-03:30) Newfoundland</option>
                                                    <option value="America/Araguaina"
                                                        <?php echo e(@$getsettings->timezone == 'America/Araguaina' ? 'selected' : ''); ?>>
                                                        (GMT-03:00) UTC-3</option>
                                                    <option value="America/Montevideo"
                                                        <?php echo e(@$getsettings->timezone == 'America/Montevideo' ? 'selected' : ''); ?>>
                                                        (GMT-03:00) Montevideo</option>
                                                    <option value="America/Miquelon"
                                                        <?php echo e(@$getsettings->timezone == 'America/Miquelon' ? 'selected' : ''); ?>>
                                                        (GMT-03:00) Miquelon, St. Pierre</option>
                                                    <option value="America/Godthab"
                                                        <?php echo e(@$getsettings->timezone == 'America/Godthab' ? 'selected' : ''); ?>>
                                                        (GMT-03:00) Greenland</option>
                                                    <option value="America/Argentina/Buenos_Aires"
                                                        <?php echo e(@$getsettings->timezone == 'America/Argentina/Buenos_Aires' ? 'selected' : ''); ?>>
                                                        (GMT-03:00) Buenos Aires</option>
                                                    <option value="America/Sao_Paulo"
                                                        <?php echo e(@$getsettings->timezone == 'America/Sao_Paulo' ? 'selected' : ''); ?>>
                                                        (GMT-03:00) Brasilia</option>
                                                    <option value="America/Noronha"
                                                        <?php echo e(@$getsettings->timezone == 'America/Noronha' ? 'selected' : ''); ?>>
                                                        (GMT-02:00) Mid-Atlantic</option>
                                                    <option value="Atlantic/Cape_Verde"
                                                        <?php echo e(@$getsettings->timezone == 'Atlantic/Cape_Verde' ? 'selected' : ''); ?>>
                                                        (GMT-01:00) Cape Verde Is.</option>
                                                    <option value="Atlantic/Azores"
                                                        <?php echo e(@$getsettings->timezone == 'Atlantic/Azores' ? 'selected' : ''); ?>>
                                                        (GMT-01:00) Azores</option>
                                                    <option value="Europe/Belfast"
                                                        <?php echo e(@$getsettings->timezone == 'Europe/Belfast' ? 'selected' : ''); ?>>
                                                        (GMT) Greenwich Mean Time : Belfast</option>
                                                    <option value="Europe/Dublin"
                                                        <?php echo e(@$getsettings->timezone == 'Europe/Dublin' ? 'selected' : ''); ?>>
                                                        (GMT) Greenwich Mean Time : Dublin</option>
                                                    <option value="Europe/Lisbon"
                                                        <?php echo e(@$getsettings->timezone == 'Europe/Lisbon' ? 'selected' : ''); ?>>
                                                        (GMT) Greenwich Mean Time : Lisbon</option>
                                                    <option value="Europe/London"
                                                        <?php echo e(@$getsettings->timezone == 'Europe/London' ? 'selected' : ''); ?>>
                                                        (GMT) Greenwich Mean Time : London</option>
                                                    <option value="Africa/Abidjan"
                                                        <?php echo e(@$getsettings->timezone == 'Africa/Abidjan' ? 'selected' : ''); ?>>
                                                        (GMT) Monrovia, Reykjavik</option>
                                                    <option value="Europe/Amsterdam"
                                                        <?php echo e(@$getsettings->timezone == 'Europe/Amsterdam' ? 'selected' : ''); ?>>
                                                        (GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna
                                                    </option>
                                                    <option value="Europe/Belgrade"
                                                        <?php echo e(@$getsettings->timezone == 'Europe/Belgrade' ? 'selected' : ''); ?>>
                                                        (GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague
                                                    </option>
                                                    <option value="Europe/Brussels"
                                                        <?php echo e(@$getsettings->timezone == 'Europe/Brussels' ? 'selected' : ''); ?>>
                                                        (GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                                                    <option value="Africa/Algiers"
                                                        <?php echo e(@$getsettings->timezone == 'Africa/Algiers' ? 'selected' : ''); ?>>
                                                        (GMT+01:00) West Central Africa</option>
                                                    <option value="Africa/Windhoek"
                                                        <?php echo e(@$getsettings->timezone == 'Africa/Windhoek' ? 'selected' : ''); ?>>
                                                        (GMT+01:00) Windhoek</option>
                                                    <option value="Asia/Beirut"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Beirut' ? 'selected' : ''); ?>>
                                                        (GMT+02:00) Beirut</option>
                                                    <option value="Africa/Cairo"
                                                        <?php echo e(@$getsettings->timezone == 'Africa/Cairo' ? 'selected' : ''); ?>>
                                                        (GMT+02:00) Cairo</option>
                                                    <option value="Asia/Gaza"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Gaza' ? 'selected' : ''); ?>>
                                                        (GMT+02:00) Gaza</option>
                                                    <option value="Africa/Blantyre"
                                                        <?php echo e(@$getsettings->timezone == 'Africa/Blantyre' ? 'selected' : ''); ?>>
                                                        (GMT+02:00) Harare, Pretoria</option>
                                                    <option value="Asia/Jerusalem"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Jerusalem' ? 'selected' : ''); ?>>
                                                        (GMT+02:00) Jerusalem</option>
                                                    <option value="Europe/Minsk"
                                                        <?php echo e(@$getsettings->timezone == 'Europe/Minsk' ? 'selected' : ''); ?>>
                                                        (GMT+02:00) Minsk</option>
                                                    <option value="Asia/Damascus"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Damascus' ? 'selected' : ''); ?>>
                                                        (GMT+02:00) Syria</option>
                                                    <option value="Europe/Moscow"
                                                        <?php echo e(@$getsettings->timezone == 'Europe/Moscow' ? 'selected' : ''); ?>>
                                                        (GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                                                    <option value="Africa/Addis_Ababa"
                                                        <?php echo e(@$getsettings->timezone == 'Africa/Addis_Ababa' ? 'selected' : ''); ?>>
                                                        (GMT+03:00) Nairobi</option>
                                                    <option value="Asia/Tehran"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Tehran' ? 'selected' : ''); ?>>
                                                        (GMT+03:30) Tehran</option>
                                                    <option value="Asia/Dubai"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Dubai' ? 'selected' : ''); ?>>
                                                        (GMT+04:00) Abu Dhabi, Muscat</option>
                                                    <option value="Asia/Yerevan"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Yerevan' ? 'selected' : ''); ?>>
                                                        (GMT+04:00) Yerevan</option>
                                                    <option value="Asia/Kabul"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Kabul' ? 'selected' : ''); ?>>
                                                        (GMT+04:30) Kabul</option>
                                                    <option value="Asia/Yekaterinburg"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Yekaterinburg' ? 'selected' : ''); ?>>
                                                        (GMT+05:00) Ekaterinburg</option>
                                                    <option value="Asia/Tashkent"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Tashkent' ? 'selected' : ''); ?>>
                                                        (GMT+05:00) Tashkent</option>
                                                    <option value="Asia/Kolkata"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Kolkata' ? 'selected' : ''); ?>>
                                                        (GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                                                    <option value="Asia/Katmandu"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Katmandu' ? 'selected' : ''); ?>>
                                                        (GMT+05:45) Kathmandu</option>
                                                    <option value="Asia/Dhaka"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Dhaka' ? 'selected' : ''); ?>>
                                                        (GMT+06:00) Astana, Dhaka</option>
                                                    <option value="Asia/Novosibirsk"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Novosibirsk' ? 'selected' : ''); ?>>
                                                        (GMT+06:00) Novosibirsk</option>
                                                    <option value="Asia/Rangoon"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Rangoon' ? 'selected' : ''); ?>>
                                                        (GMT+06:30) Yangon (Rangoon)</option>
                                                    <option value="Asia/Bangkok"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Bangkok' ? 'selected' : ''); ?>>
                                                        (GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                                                    <option value="Asia/Krasnoyarsk"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Krasnoyarsk' ? 'selected' : ''); ?>>
                                                        (GMT+07:00) Krasnoyarsk</option>
                                                    <option value="Asia/Hong_Kong"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Hong_Kong' ? 'selected' : ''); ?>>
                                                        (GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                                                    <option value="Asia/Irkutsk"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Irkutsk' ? 'selected' : ''); ?>>
                                                        (GMT+08:00) Irkutsk, Ulaan Bataar</option>
                                                    <option value="Australia/Perth"
                                                        <?php echo e(@$getsettings->timezone == 'Australia/Perth' ? 'selected' : ''); ?>>
                                                        (GMT+08:00) Perth</option>
                                                    <option value="Australia/Eucla"
                                                        <?php echo e(@$getsettings->timezone == 'Australia/Eucla' ? 'selected' : ''); ?>>
                                                        (GMT+08:45) Eucla</option>
                                                    <option value="Asia/Tokyo"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Tokyo' ? 'selected' : ''); ?>>
                                                        (GMT+09:00) Osaka, Sapporo, Tokyo</option>
                                                    <option value="Asia/Seoul"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Seoul' ? 'selected' : ''); ?>>
                                                        (GMT+09:00) Seoul</option>
                                                    <option value="Asia/Yakutsk"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Yakutsk' ? 'selected' : ''); ?>>
                                                        (GMT+09:00) Yakutsk</option>
                                                    <option value="Australia/Adelaide"
                                                        <?php echo e(@$getsettings->timezone == 'Australia/Adelaide' ? 'selected' : ''); ?>>
                                                        (GMT+09:30) Adelaide</option>
                                                    <option value="Australia/Darwin"
                                                        <?php echo e(@$getsettings->timezone == 'Australia/Darwin' ? 'selected' : ''); ?>>
                                                        (GMT+09:30) Darwin</option>
                                                    <option value="Australia/Brisbane"
                                                        <?php echo e(@$getsettings->timezone == 'Australia/Brisbane' ? 'selected' : ''); ?>>
                                                        (GMT+10:00) Brisbane</option>
                                                    <option value="Australia/Hobart"
                                                        <?php echo e(@$getsettings->timezone == 'Australia/Hobart' ? 'selected' : ''); ?>>
                                                        (GMT+10:00) Hobart</option>
                                                    <option value="Asia/Vladivostok"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Vladivostok' ? 'selected' : ''); ?>>
                                                        (GMT+10:00) Vladivostok</option>
                                                    <option value="Australia/Lord_Howe"
                                                        <?php echo e(@$getsettings->timezone == 'Australia/Lord_Howe' ? 'selected' : ''); ?>>
                                                        (GMT+10:30) Lord Howe Island</option>
                                                    <option value="Etc/GMT-11"
                                                        <?php echo e(@$getsettings->timezone == 'Etc/GMT-11' ? 'selected' : ''); ?>>
                                                        (GMT+11:00) Solomon Is., New Caledonia</option>
                                                    <option value="Asia/Magadan"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Magadan' ? 'selected' : ''); ?>>
                                                        (GMT+11:00) Magadan</option>
                                                    <option value="Pacific/Norfolk"
                                                        <?php echo e(@$getsettings->timezone == 'Pacific/Norfolk' ? 'selected' : ''); ?>>
                                                        (GMT+11:30) Norfolk Island</option>
                                                    <option value="Asia/Anadyr"
                                                        <?php echo e(@$getsettings->timezone == 'Asia/Anadyr' ? 'selected' : ''); ?>>
                                                        (GMT+12:00) Anadyr, Kamchatka</option>
                                                    <option value="Pacific/Auckland"
                                                        <?php echo e(@$getsettings->timezone == 'Pacific/Auckland' ? 'selected' : ''); ?>>
                                                        (GMT+12:00) Auckland, Wellington</option>
                                                    <option value="Etc/GMT-12"
                                                        <?php echo e(@$getsettings->timezone == 'Etc/GMT-12' ? 'selected' : ''); ?>>
                                                        (GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                                                    <option value="Pacific/Chatham"
                                                        <?php echo e(@$getsettings->timezone == 'Pacific/Chatham' ? 'selected' : ''); ?>>
                                                        (GMT+12:45) Chatham Islands</option>
                                                    <option value="Pacific/Tongatapu"
                                                        <?php echo e(@$getsettings->timezone == 'Pacific/Tongatapu' ? 'selected' : ''); ?>>
                                                        (GMT+13:00) Nuku'alofa</option>
                                                    <option value="Pacific/Kiritimati"
                                                        <?php echo e(@$getsettings->timezone == 'Pacific/Kiritimati' ? 'selected' : ''); ?>>
                                                        (GMT+14:00) Kiritimati</option>
                                                </select>
                                                <?php $__errorArgs = ['timezone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100">
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.facebook_link')); ?></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="fb" id="fb"
                                                    value="<?php echo e(@$getsettings->fb); ?>"
                                                    placeholder="<?php echo e(trans('labels.facebook_link')); ?>">
                                                <?php $__errorArgs = ['fb'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.youtube_link')); ?></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="youtube" id="youtube"
                                                    value="<?php echo e(@$getsettings->youtube); ?>"
                                                    placeholder="<?php echo e(trans('labels.youtube_link')); ?>">
                                                <?php $__errorArgs = ['youtube'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.instagram_link')); ?></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="insta" id="insta"
                                                    value="<?php echo e(@$getsettings->insta); ?>"
                                                    placeholder="<?php echo e(trans('labels.instagram_link')); ?>">
                                                <?php $__errorArgs = ['insta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="w-100">
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.ios_app_link')); ?></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="ios" id="ios"
                                                    value="<?php echo e(@$getsettings->ios); ?>"
                                                    placeholder="<?php echo e(trans('labels.ios_app_link')); ?>">
                                                <?php $__errorArgs = ['ios'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.android_app_link')); ?></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="android" id="android"
                                                    value="<?php echo e(@$getsettings->android); ?>"
                                                    placeholder="<?php echo e(trans('labels.android_app_link')); ?>">
                                                <?php $__errorArgs = ['android'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.mobile_app_description')); ?></label>
                                            <div class="col-lg-9">
                                                <textarea class="form-control" name="mobile_app_description"
                                                    placeholder="<?php echo e(trans('labels.mobile_app_description')); ?>" id="mobile_app_description" rows="5"><?php echo e(@$getsettings->mobile_app_description); ?></textarea>
                                                <?php $__errorArgs = ['og_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.mobile_app_title')); ?></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control"
                                                    placeholder="<?php echo e(trans('labels.mobile_app_title')); ?>"
                                                    name="mobile_app_title" id="mobile_app_title"
                                                    value="<?php echo e(@$getsettings->mobile_app_title); ?>">
                                                <?php $__errorArgs = ['mobile_app_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.mobile_app_image')); ?>

                                                <?php echo e(trans('labels.only_website')); ?></label>
                                            <div class="col-lg-9">
                                                <input type="file" class="form-control" name="mobile_app_image"
                                                    id="mobile_app_image">
                                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span><br>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <img src='<?php echo e(Helper::image_path(@$getsettings->mobile_app_image)); ?>'
                                                    class='img-fluid rounded hw-50 mt-1'>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.app_bottom_image')); ?>

                                                <?php echo e(trans('labels.only_mobile')); ?></label>
                                            <div class="col-lg-9">
                                                <input type="file" class="form-control" name="app_bottom_image"
                                                    id="app_bottom_image">
                                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span><br>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <img src='<?php echo e(Helper::image_path(@$getsettings->app_bottom_image)); ?>'
                                                    class='img-fluid rounded hw-50 mt-1'>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="w-100">
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.copyright')); ?> <?php echo e(trans('labels.only_website')); ?> </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="copyright"
                                                    id="copyright" value="<?php echo e(@$getsettings->copyright); ?>"
                                                    placeholder="<?php echo e(trans('labels.copyright')); ?>">
                                                <?php $__errorArgs = ['copyright'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.title_for_title_bar')); ?> <?php echo e(trans('labels.only_website')); ?> <span class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="title" id="title"
                                                    value="<?php echo e(@$getsettings->title); ?>"
                                                    placeholder="<?php echo e(trans('labels.title_for_title_bar')); ?>">
                                                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.short_title')); ?> <?php echo e(trans('labels.only_website')); ?> </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="short_title"
                                                    id="short_title" value="<?php echo e(@$getsettings->short_title); ?>"
                                                    placeholder="<?php echo e(trans('labels.short_title')); ?>">
                                                <?php $__errorArgs = ['short_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100">
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.address')); ?> <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="address" id="address"
                                                    value="<?php echo e(@$getsettings->address); ?>">
                                                <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span><br>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.latitude')); ?> <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="<?php echo e(trans('labels.latitude')); ?>"
                                                    value="<?php echo e(@$getsettings->lat); ?>" class="form-control"
                                                    name="lat" id="lat" readonly>
                                                <?php $__errorArgs = ['lat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.longitude')); ?> <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="<?php echo e(trans('labels.longitude')); ?>"
                                                    value="<?php echo e(@$getsettings->lang); ?>" class="form-control"
                                                    name="lang" id="lang" readonly>
                                                <?php $__errorArgs = ['lang'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="mymap" style="width: 100%;height: 300px;"></div>
                                    </div>
                                    <div class="w-100">
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.og_description')); ?></label>
                                            <div class="col-lg-9">
                                                <textarea class="form-control" name="og_description" placeholder="<?php echo e(trans('labels.og_description')); ?>"
                                                    id="og_description" rows="6"><?php echo e(@$getsettings->og_description); ?></textarea>
                                                <?php $__errorArgs = ['og_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.og_title')); ?></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control"
                                                    placeholder="<?php echo e(trans('labels.og_title')); ?>" name="og_title"
                                                    id="og_title" value="<?php echo e(@$getsettings->og_title); ?>">
                                                <?php $__errorArgs = ['og_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.og_image')); ?></label>
                                            <div class="col-lg-9">
                                                <input type="file" class="form-control" name="og_image"
                                                    id="og_image">
                                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span><br>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <img src='<?php echo e(Helper::image_path(@$getsettings->og_image)); ?>'
                                                    class='img-fluid rounded hw-50 mt-1'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100">
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-lg-1 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.about_content')); ?> </label>
                                            <div class="col-lg-11">
                                                <textarea class="form-control" name="about_content" id="ckeditor" rows="5"><?php echo e(@$getsettings->about_content); ?></textarea>
                                                <?php $__errorArgs = ['about_content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="w-100">
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.logo')); ?> <?php echo e(trans('labels.only_website')); ?> </label>
                                            <div class="col-lg-9">
                                                <input type="file" class="form-control" name="logo"
                                                    id="logo">
                                                <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span><br>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <img src='<?php echo e(Helper::image_path(@$getsettings->logo)); ?>'
                                                    class='img-fluid rounded hw-50 mt-1'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.footer_logo')); ?> <?php echo e(trans('labels.only_website')); ?> </label>
                                            <div class="col-lg-9">
                                                <input type="file" class="form-control" name="footer_logo"
                                                    id="footer_logo">
                                                <?php $__errorArgs = ['footer_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span><br>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <img src='<?php echo e(Helper::image_path(@$getsettings->footer_logo)); ?>'
                                                    class='img-fluid rounded hw-50 mt-1'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for=""><?php echo e(trans('labels.Favicon')); ?> <?php echo e(trans('labels.only_website')); ?> </label>
                                            <div class="col-lg-9">
                                                <input type="file" class="form-control" name="favicon"
                                                    id="favicon">
                                                <?php $__errorArgs = ['favicon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span><br>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <img src='<?php echo e(Helper::image_path(@$getsettings->favicon)); ?>'
                                                    class='img-fluid rounded hw-50 mt-1'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-11 m-auto">
                                        <button class="btn btn-primary"
                                            <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                                        <a href="<?php echo e(url('/admin/home')); ?>"
                                            class="btn btn-dark"><?php echo e(trans('labels.cancel')); ?></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(@Helper::appdata()->map); ?>&libraries=places&callback=initMap"
        async defer></script>
    <script src="<?php echo e(url('resources/views/admin/cms/settings.js')); ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('ckeditor');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/cms/settings.blade.php ENDPATH**/ ?>