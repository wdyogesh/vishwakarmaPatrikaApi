@extends('admin.theme.default')
@section('content')
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">{{ trans('labels.dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ URL::to('admin/settings') }}">{{ trans('labels.settings') }}</a></li>
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
                            <form action="{{ URL::to('admin/settings/update') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.email') }} </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="email"
                                                    value="{{ @$getsettings->email }}"
                                                    placeholder="{{ trans('labels.email') }}">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.mobile') }} </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="mobile"
                                                    value="{{ @$getsettings->mobile }}"
                                                    placeholder="{{ trans('labels.mobile') }}">
                                                @error('mobile')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.currency') }} </label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="{{ trans('labels.currency') }}"
                                                    value="{{ @$getsettings->currency }}" class="form-control"
                                                    name="currency" id="currency">
                                                @error('currency')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.currency_position') }} </label>
                                            <div class="col-lg-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input mr-0" type="radio"
                                                        name="currency_position" id="inlineRadio1" value="1"
                                                        {{ @$getsettings->currency_position == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="inlineRadio1">{{trans('labels.left')}}</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input mr-0" type="radio"
                                                        name="currency_position" id="inlineRadio2" value="2"
                                                        {{ @$getsettings->currency_position == 2 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="inlineRadio2">{{trans('labels.right')}}</label>
                                                </div>
                                                @error('currency')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.referral_amount') }} <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text"
                                                    placeholder="{{ trans('labels.referral_amount') }}"
                                                    value="{{ @$getsettings->referral_amount }}" class="form-control"
                                                    name="referral_amount" id="referral_amount">
                                                @error('referral_amount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.max_order_qty') }} <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text"
                                                    placeholder="{{ trans('labels.max_order_qty') }}"
                                                    value="{{ @$getsettings->max_order_qty }}" class="form-control"
                                                    name="max_order_qty" id="max_order_qty">
                                                @error('max_order_qty')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.min_amount') }} <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text"
                                                    placeholder="{{ trans('labels.min_amount') }}"
                                                    value="{{ @$getsettings->min_order_amount }}" class="form-control"
                                                    name="min_order_amount" id="min_order_amount">
                                                @error('min_order_amount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.max_amount') }} <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text"
                                                    placeholder="{{ trans('labels.max_amount') }}"
                                                    value="{{ @$getsettings->max_order_amount }}" class="form-control"
                                                    name="max_order_amount" id="max_order_amount">
                                                @error('max_order_amount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.delivery_charge_per_km') }} <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text"
                                                    placeholder="{{ trans('labels.delivery_charge_per_km') }}"
                                                    value="{{ @$getsettings->delivery_charge }}" class="form-control"
                                                    name="delivery_charge" id="delivery_charge">
                                                @error('delivery_charge')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100">
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.firebase_key') }} <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="firebase"
                                                    id="firebase" value="{{ @$getsettings->firebase }}"
                                                    placeholder="{{ trans('labels.firebase_key') }}">
                                                @error('firebase')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.map_key') }} </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="map" id="map"
                                                    value="{{ @$getsettings->map }}"
                                                    placeholder="{{ trans('labels.map_key') }}">
                                                @error('map')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.timezone') }} </label>
                                            <div class="col-lg-9">
                                                <select class="form-control selectpicker" name="timezone" id="timezone"
                                                    data-live-search="true">
                                                    <option value="" selected>
                                                        {{ trans('labels.select') }}
                                                    </option>
                                                    <option value="Pacific/Midway"
                                                        {{ @$getsettings->timezone == 'Pacific/Midway' ? 'selected' : '' }}>
                                                        (GMT-11:00) Midway Island, Samoa</option>
                                                    <option value="America/Adak"
                                                        {{ @$getsettings->timezone == 'America/Adak' ? 'selected' : '' }}>
                                                        (GMT-10:00) Hawaii-Aleutian</option>
                                                    <option value="Etc/GMT+10"
                                                        {{ @$getsettings->timezone == 'Etc/GMT+10' ? 'selected' : '' }}>
                                                        (GMT-10:00) Hawaii</option>
                                                    <option value="Pacific/Marquesas"
                                                        {{ @$getsettings->timezone == 'Pacific/Marquesas' ? 'selected' : '' }}>
                                                        (GMT-09:30) Marquesas Islands</option>
                                                    <option value="Pacific/Gambier"
                                                        {{ @$getsettings->timezone == 'Pacific/Gambier' ? 'selected' : '' }}>
                                                        (GMT-09:00) Gambier Islands</option>
                                                    <option value="America/Anchorage"
                                                        {{ @$getsettings->timezone == 'America/Anchorage' ? 'selected' : '' }}>
                                                        (GMT-09:00) Alaska</option>
                                                    <option value="America/Ensenada"
                                                        {{ @$getsettings->timezone == 'America/Ensenada' ? 'selected' : '' }}>
                                                        (GMT-08:00) Tijuana, Baja California</option>
                                                    <option value="Etc/GMT+8"
                                                        {{ @$getsettings->timezone == 'Etc/GMT+8' ? 'selected' : '' }}>
                                                        (GMT-08:00) Pitcairn Islands</option>
                                                    <option value="America/Los_Angeles"
                                                        {{ @$getsettings->timezone == 'America/Los_Angeles' ? 'selected' : '' }}>
                                                        (GMT-08:00) Pacific Time (US & Canada)</option>
                                                    <option value="America/Denver"
                                                        {{ @$getsettings->timezone == 'America/Denver' ? 'selected' : '' }}>
                                                        (GMT-07:00) Mountain Time (US & Canada)</option>
                                                    <option value="America/Chihuahua"
                                                        {{ @$getsettings->timezone == 'America/Chihuahua' ? 'selected' : '' }}>
                                                        (GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                                                    <option value="America/Dawson_Creek"
                                                        {{ @$getsettings->timezone == 'America/Dawson_Creek' ? 'selected' : '' }}>
                                                        (GMT-07:00) Arizona</option>
                                                    <option value="America/Belize"
                                                        {{ @$getsettings->timezone == 'America/Belize' ? 'selected' : '' }}>
                                                        (GMT-06:00) Saskatchewan, Central America</option>
                                                    <option value="America/Cancun"
                                                        {{ @$getsettings->timezone == 'America/Cancun' ? 'selected' : '' }}>
                                                        (GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                                                    <option value="Chile/EasterIsland"
                                                        {{ @$getsettings->timezone == 'Chile/EasterIsland' ? 'selected' : '' }}>
                                                        (GMT-06:00) Easter Island</option>
                                                    <option value="America/Chicago"
                                                        {{ @$getsettings->timezone == 'America/Chicago' ? 'selected' : '' }}>
                                                        (GMT-06:00) Central Time (US & Canada)</option>
                                                    <option value="America/New_York"
                                                        {{ @$getsettings->timezone == 'America/New_York' ? 'selected' : '' }}>
                                                        (GMT-05:00) Eastern Time (US & Canada)</option>
                                                    <option value="America/Havana"
                                                        {{ @$getsettings->timezone == 'America/Havana' ? 'selected' : '' }}>
                                                        (GMT-05:00) Cuba</option>
                                                    <option value="America/Bogota"
                                                        {{ @$getsettings->timezone == 'America/Bogota' ? 'selected' : '' }}>
                                                        (GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                                                    <option value="America/Caracas"
                                                        {{ @$getsettings->timezone == 'America/Caracas' ? 'selected' : '' }}>
                                                        (GMT-04:30) Caracas</option>
                                                    <option value="America/Santiago"
                                                        {{ @$getsettings->timezone == 'America/Santiago' ? 'selected' : '' }}>
                                                        (GMT-04:00) Santiago</option>
                                                    <option value="America/La_Paz"
                                                        {{ @$getsettings->timezone == 'America/La_Paz' ? 'selected' : '' }}>
                                                        (GMT-04:00) La Paz</option>
                                                    <option value="Atlantic/Stanley"
                                                        {{ @$getsettings->timezone == 'Atlantic/Stanley' ? 'selected' : '' }}>
                                                        (GMT-04:00) Faukland Islands</option>
                                                    <option value="America/Campo_Grande"
                                                        {{ @$getsettings->timezone == 'America/Campo_Grande' ? 'selected' : '' }}>
                                                        (GMT-04:00) Brazil</option>
                                                    <option value="America/Goose_Bay"
                                                        {{ @$getsettings->timezone == 'America/Goose_Bay' ? 'selected' : '' }}>
                                                        (GMT-04:00) Atlantic Time (Goose Bay)</option>
                                                    <option value="America/Glace_Bay"
                                                        {{ @$getsettings->timezone == 'America/Glace_Bay' ? 'selected' : '' }}>
                                                        (GMT-04:00) Atlantic Time (Canada)</option>
                                                    <option value="America/St_Johns"
                                                        {{ @$getsettings->timezone == 'America/St_Johns' ? 'selected' : '' }}>
                                                        (GMT-03:30) Newfoundland</option>
                                                    <option value="America/Araguaina"
                                                        {{ @$getsettings->timezone == 'America/Araguaina' ? 'selected' : '' }}>
                                                        (GMT-03:00) UTC-3</option>
                                                    <option value="America/Montevideo"
                                                        {{ @$getsettings->timezone == 'America/Montevideo' ? 'selected' : '' }}>
                                                        (GMT-03:00) Montevideo</option>
                                                    <option value="America/Miquelon"
                                                        {{ @$getsettings->timezone == 'America/Miquelon' ? 'selected' : '' }}>
                                                        (GMT-03:00) Miquelon, St. Pierre</option>
                                                    <option value="America/Godthab"
                                                        {{ @$getsettings->timezone == 'America/Godthab' ? 'selected' : '' }}>
                                                        (GMT-03:00) Greenland</option>
                                                    <option value="America/Argentina/Buenos_Aires"
                                                        {{ @$getsettings->timezone == 'America/Argentina/Buenos_Aires' ? 'selected' : '' }}>
                                                        (GMT-03:00) Buenos Aires</option>
                                                    <option value="America/Sao_Paulo"
                                                        {{ @$getsettings->timezone == 'America/Sao_Paulo' ? 'selected' : '' }}>
                                                        (GMT-03:00) Brasilia</option>
                                                    <option value="America/Noronha"
                                                        {{ @$getsettings->timezone == 'America/Noronha' ? 'selected' : '' }}>
                                                        (GMT-02:00) Mid-Atlantic</option>
                                                    <option value="Atlantic/Cape_Verde"
                                                        {{ @$getsettings->timezone == 'Atlantic/Cape_Verde' ? 'selected' : '' }}>
                                                        (GMT-01:00) Cape Verde Is.</option>
                                                    <option value="Atlantic/Azores"
                                                        {{ @$getsettings->timezone == 'Atlantic/Azores' ? 'selected' : '' }}>
                                                        (GMT-01:00) Azores</option>
                                                    <option value="Europe/Belfast"
                                                        {{ @$getsettings->timezone == 'Europe/Belfast' ? 'selected' : '' }}>
                                                        (GMT) Greenwich Mean Time : Belfast</option>
                                                    <option value="Europe/Dublin"
                                                        {{ @$getsettings->timezone == 'Europe/Dublin' ? 'selected' : '' }}>
                                                        (GMT) Greenwich Mean Time : Dublin</option>
                                                    <option value="Europe/Lisbon"
                                                        {{ @$getsettings->timezone == 'Europe/Lisbon' ? 'selected' : '' }}>
                                                        (GMT) Greenwich Mean Time : Lisbon</option>
                                                    <option value="Europe/London"
                                                        {{ @$getsettings->timezone == 'Europe/London' ? 'selected' : '' }}>
                                                        (GMT) Greenwich Mean Time : London</option>
                                                    <option value="Africa/Abidjan"
                                                        {{ @$getsettings->timezone == 'Africa/Abidjan' ? 'selected' : '' }}>
                                                        (GMT) Monrovia, Reykjavik</option>
                                                    <option value="Europe/Amsterdam"
                                                        {{ @$getsettings->timezone == 'Europe/Amsterdam' ? 'selected' : '' }}>
                                                        (GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna
                                                    </option>
                                                    <option value="Europe/Belgrade"
                                                        {{ @$getsettings->timezone == 'Europe/Belgrade' ? 'selected' : '' }}>
                                                        (GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague
                                                    </option>
                                                    <option value="Europe/Brussels"
                                                        {{ @$getsettings->timezone == 'Europe/Brussels' ? 'selected' : '' }}>
                                                        (GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                                                    <option value="Africa/Algiers"
                                                        {{ @$getsettings->timezone == 'Africa/Algiers' ? 'selected' : '' }}>
                                                        (GMT+01:00) West Central Africa</option>
                                                    <option value="Africa/Windhoek"
                                                        {{ @$getsettings->timezone == 'Africa/Windhoek' ? 'selected' : '' }}>
                                                        (GMT+01:00) Windhoek</option>
                                                    <option value="Asia/Beirut"
                                                        {{ @$getsettings->timezone == 'Asia/Beirut' ? 'selected' : '' }}>
                                                        (GMT+02:00) Beirut</option>
                                                    <option value="Africa/Cairo"
                                                        {{ @$getsettings->timezone == 'Africa/Cairo' ? 'selected' : '' }}>
                                                        (GMT+02:00) Cairo</option>
                                                    <option value="Asia/Gaza"
                                                        {{ @$getsettings->timezone == 'Asia/Gaza' ? 'selected' : '' }}>
                                                        (GMT+02:00) Gaza</option>
                                                    <option value="Africa/Blantyre"
                                                        {{ @$getsettings->timezone == 'Africa/Blantyre' ? 'selected' : '' }}>
                                                        (GMT+02:00) Harare, Pretoria</option>
                                                    <option value="Asia/Jerusalem"
                                                        {{ @$getsettings->timezone == 'Asia/Jerusalem' ? 'selected' : '' }}>
                                                        (GMT+02:00) Jerusalem</option>
                                                    <option value="Europe/Minsk"
                                                        {{ @$getsettings->timezone == 'Europe/Minsk' ? 'selected' : '' }}>
                                                        (GMT+02:00) Minsk</option>
                                                    <option value="Asia/Damascus"
                                                        {{ @$getsettings->timezone == 'Asia/Damascus' ? 'selected' : '' }}>
                                                        (GMT+02:00) Syria</option>
                                                    <option value="Europe/Moscow"
                                                        {{ @$getsettings->timezone == 'Europe/Moscow' ? 'selected' : '' }}>
                                                        (GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                                                    <option value="Africa/Addis_Ababa"
                                                        {{ @$getsettings->timezone == 'Africa/Addis_Ababa' ? 'selected' : '' }}>
                                                        (GMT+03:00) Nairobi</option>
                                                    <option value="Asia/Tehran"
                                                        {{ @$getsettings->timezone == 'Asia/Tehran' ? 'selected' : '' }}>
                                                        (GMT+03:30) Tehran</option>
                                                    <option value="Asia/Dubai"
                                                        {{ @$getsettings->timezone == 'Asia/Dubai' ? 'selected' : '' }}>
                                                        (GMT+04:00) Abu Dhabi, Muscat</option>
                                                    <option value="Asia/Yerevan"
                                                        {{ @$getsettings->timezone == 'Asia/Yerevan' ? 'selected' : '' }}>
                                                        (GMT+04:00) Yerevan</option>
                                                    <option value="Asia/Kabul"
                                                        {{ @$getsettings->timezone == 'Asia/Kabul' ? 'selected' : '' }}>
                                                        (GMT+04:30) Kabul</option>
                                                    <option value="Asia/Yekaterinburg"
                                                        {{ @$getsettings->timezone == 'Asia/Yekaterinburg' ? 'selected' : '' }}>
                                                        (GMT+05:00) Ekaterinburg</option>
                                                    <option value="Asia/Tashkent"
                                                        {{ @$getsettings->timezone == 'Asia/Tashkent' ? 'selected' : '' }}>
                                                        (GMT+05:00) Tashkent</option>
                                                    <option value="Asia/Kolkata"
                                                        {{ @$getsettings->timezone == 'Asia/Kolkata' ? 'selected' : '' }}>
                                                        (GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                                                    <option value="Asia/Katmandu"
                                                        {{ @$getsettings->timezone == 'Asia/Katmandu' ? 'selected' : '' }}>
                                                        (GMT+05:45) Kathmandu</option>
                                                    <option value="Asia/Dhaka"
                                                        {{ @$getsettings->timezone == 'Asia/Dhaka' ? 'selected' : '' }}>
                                                        (GMT+06:00) Astana, Dhaka</option>
                                                    <option value="Asia/Novosibirsk"
                                                        {{ @$getsettings->timezone == 'Asia/Novosibirsk' ? 'selected' : '' }}>
                                                        (GMT+06:00) Novosibirsk</option>
                                                    <option value="Asia/Rangoon"
                                                        {{ @$getsettings->timezone == 'Asia/Rangoon' ? 'selected' : '' }}>
                                                        (GMT+06:30) Yangon (Rangoon)</option>
                                                    <option value="Asia/Bangkok"
                                                        {{ @$getsettings->timezone == 'Asia/Bangkok' ? 'selected' : '' }}>
                                                        (GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                                                    <option value="Asia/Krasnoyarsk"
                                                        {{ @$getsettings->timezone == 'Asia/Krasnoyarsk' ? 'selected' : '' }}>
                                                        (GMT+07:00) Krasnoyarsk</option>
                                                    <option value="Asia/Hong_Kong"
                                                        {{ @$getsettings->timezone == 'Asia/Hong_Kong' ? 'selected' : '' }}>
                                                        (GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                                                    <option value="Asia/Irkutsk"
                                                        {{ @$getsettings->timezone == 'Asia/Irkutsk' ? 'selected' : '' }}>
                                                        (GMT+08:00) Irkutsk, Ulaan Bataar</option>
                                                    <option value="Australia/Perth"
                                                        {{ @$getsettings->timezone == 'Australia/Perth' ? 'selected' : '' }}>
                                                        (GMT+08:00) Perth</option>
                                                    <option value="Australia/Eucla"
                                                        {{ @$getsettings->timezone == 'Australia/Eucla' ? 'selected' : '' }}>
                                                        (GMT+08:45) Eucla</option>
                                                    <option value="Asia/Tokyo"
                                                        {{ @$getsettings->timezone == 'Asia/Tokyo' ? 'selected' : '' }}>
                                                        (GMT+09:00) Osaka, Sapporo, Tokyo</option>
                                                    <option value="Asia/Seoul"
                                                        {{ @$getsettings->timezone == 'Asia/Seoul' ? 'selected' : '' }}>
                                                        (GMT+09:00) Seoul</option>
                                                    <option value="Asia/Yakutsk"
                                                        {{ @$getsettings->timezone == 'Asia/Yakutsk' ? 'selected' : '' }}>
                                                        (GMT+09:00) Yakutsk</option>
                                                    <option value="Australia/Adelaide"
                                                        {{ @$getsettings->timezone == 'Australia/Adelaide' ? 'selected' : '' }}>
                                                        (GMT+09:30) Adelaide</option>
                                                    <option value="Australia/Darwin"
                                                        {{ @$getsettings->timezone == 'Australia/Darwin' ? 'selected' : '' }}>
                                                        (GMT+09:30) Darwin</option>
                                                    <option value="Australia/Brisbane"
                                                        {{ @$getsettings->timezone == 'Australia/Brisbane' ? 'selected' : '' }}>
                                                        (GMT+10:00) Brisbane</option>
                                                    <option value="Australia/Hobart"
                                                        {{ @$getsettings->timezone == 'Australia/Hobart' ? 'selected' : '' }}>
                                                        (GMT+10:00) Hobart</option>
                                                    <option value="Asia/Vladivostok"
                                                        {{ @$getsettings->timezone == 'Asia/Vladivostok' ? 'selected' : '' }}>
                                                        (GMT+10:00) Vladivostok</option>
                                                    <option value="Australia/Lord_Howe"
                                                        {{ @$getsettings->timezone == 'Australia/Lord_Howe' ? 'selected' : '' }}>
                                                        (GMT+10:30) Lord Howe Island</option>
                                                    <option value="Etc/GMT-11"
                                                        {{ @$getsettings->timezone == 'Etc/GMT-11' ? 'selected' : '' }}>
                                                        (GMT+11:00) Solomon Is., New Caledonia</option>
                                                    <option value="Asia/Magadan"
                                                        {{ @$getsettings->timezone == 'Asia/Magadan' ? 'selected' : '' }}>
                                                        (GMT+11:00) Magadan</option>
                                                    <option value="Pacific/Norfolk"
                                                        {{ @$getsettings->timezone == 'Pacific/Norfolk' ? 'selected' : '' }}>
                                                        (GMT+11:30) Norfolk Island</option>
                                                    <option value="Asia/Anadyr"
                                                        {{ @$getsettings->timezone == 'Asia/Anadyr' ? 'selected' : '' }}>
                                                        (GMT+12:00) Anadyr, Kamchatka</option>
                                                    <option value="Pacific/Auckland"
                                                        {{ @$getsettings->timezone == 'Pacific/Auckland' ? 'selected' : '' }}>
                                                        (GMT+12:00) Auckland, Wellington</option>
                                                    <option value="Etc/GMT-12"
                                                        {{ @$getsettings->timezone == 'Etc/GMT-12' ? 'selected' : '' }}>
                                                        (GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                                                    <option value="Pacific/Chatham"
                                                        {{ @$getsettings->timezone == 'Pacific/Chatham' ? 'selected' : '' }}>
                                                        (GMT+12:45) Chatham Islands</option>
                                                    <option value="Pacific/Tongatapu"
                                                        {{ @$getsettings->timezone == 'Pacific/Tongatapu' ? 'selected' : '' }}>
                                                        (GMT+13:00) Nuku'alofa</option>
                                                    <option value="Pacific/Kiritimati"
                                                        {{ @$getsettings->timezone == 'Pacific/Kiritimati' ? 'selected' : '' }}>
                                                        (GMT+14:00) Kiritimati</option>
                                                </select>
                                                @error('timezone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100">
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.facebook_link') }}</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="fb" id="fb"
                                                    value="{{ @$getsettings->fb }}"
                                                    placeholder="{{ trans('labels.facebook_link') }}">
                                                @error('fb')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.youtube_link') }}</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="youtube" id="youtube"
                                                    value="{{ @$getsettings->youtube }}"
                                                    placeholder="{{ trans('labels.youtube_link') }}">
                                                @error('youtube')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.instagram_link') }}</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="insta" id="insta"
                                                    value="{{ @$getsettings->insta }}"
                                                    placeholder="{{ trans('labels.instagram_link') }}">
                                                @error('insta')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>



                                    <div class="w-100">
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.ios_app_link') }}</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="ios" id="ios"
                                                    value="{{ @$getsettings->ios }}"
                                                    placeholder="{{ trans('labels.ios_app_link') }}">
                                                @error('ios')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.android_app_link') }}</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="android" id="android"
                                                    value="{{ @$getsettings->android }}"
                                                    placeholder="{{ trans('labels.android_app_link') }}">
                                                @error('android')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.mobile_app_description') }}</label>
                                            <div class="col-lg-9">
                                                <textarea class="form-control" name="mobile_app_description"
                                                    placeholder="{{ trans('labels.mobile_app_description') }}" id="mobile_app_description" rows="5">{{ @$getsettings->mobile_app_description }}</textarea>
                                                @error('og_description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.mobile_app_title') }}</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control"
                                                    placeholder="{{ trans('labels.mobile_app_title') }}"
                                                    name="mobile_app_title" id="mobile_app_title"
                                                    value="{{ @$getsettings->mobile_app_title }}">
                                                @error('mobile_app_title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.mobile_app_image') }}
                                                {{ trans('labels.only_website') }}</label>
                                            <div class="col-lg-9">
                                                <input type="file" class="form-control" name="mobile_app_image"
                                                    id="mobile_app_image">
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span><br>
                                                @enderror
                                                <img src='{{ Helper::image_path(@$getsettings->mobile_app_image) }}'
                                                    class='img-fluid rounded hw-50 mt-1'>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.app_bottom_image') }}
                                                {{ trans('labels.only_mobile') }}</label>
                                            <div class="col-lg-9">
                                                <input type="file" class="form-control" name="app_bottom_image"
                                                    id="app_bottom_image">
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span><br>
                                                @enderror
                                                <img src='{{ Helper::image_path(@$getsettings->app_bottom_image) }}'
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
                                                for="">{{ trans('labels.copyright') }} {{ trans('labels.only_website') }} </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="copyright"
                                                    id="copyright" value="{{ @$getsettings->copyright }}"
                                                    placeholder="{{ trans('labels.copyright') }}">
                                                @error('copyright')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.title_for_title_bar') }} {{ trans('labels.only_website') }} <span class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="title" id="title"
                                                    value="{{ @$getsettings->title }}"
                                                    placeholder="{{ trans('labels.title_for_title_bar') }}">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.short_title') }} {{ trans('labels.only_website') }} </label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="short_title"
                                                    id="short_title" value="{{ @$getsettings->short_title }}"
                                                    placeholder="{{ trans('labels.short_title') }}">
                                                @error('short_title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100">
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.address') }} <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="address" id="address"
                                                    value="{{ @$getsettings->address }}">
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span><br>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.latitude') }} <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="{{ trans('labels.latitude') }}"
                                                    value="{{ @$getsettings->lat }}" class="form-control"
                                                    name="lat" id="lat" readonly>
                                                @error('lat')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.longitude') }} <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="{{ trans('labels.longitude') }}"
                                                    value="{{ @$getsettings->lang }}" class="form-control"
                                                    name="lang" id="lang" readonly>
                                                @error('lang')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
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
                                                for="">{{ trans('labels.og_description') }}</label>
                                            <div class="col-lg-9">
                                                <textarea class="form-control" name="og_description" placeholder="{{ trans('labels.og_description') }}"
                                                    id="og_description" rows="6">{{ @$getsettings->og_description }}</textarea>
                                                @error('og_description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.og_title') }}</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control"
                                                    placeholder="{{ trans('labels.og_title') }}" name="og_title"
                                                    id="og_title" value="{{ @$getsettings->og_title }}">
                                                @error('og_title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.og_image') }}</label>
                                            <div class="col-lg-9">
                                                <input type="file" class="form-control" name="og_image"
                                                    id="og_image">
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span><br>
                                                @enderror
                                                <img src='{{ Helper::image_path(@$getsettings->og_image) }}'
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
                                                for="">{{ trans('labels.about_content') }} </label>
                                            <div class="col-lg-11">
                                                <textarea class="form-control" name="about_content" id="ckeditor" rows="5">{{ @$getsettings->about_content }}</textarea>
                                                @error('about_content')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.about_image') }} {{ trans('labels.only_website') }} <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="file" class="form-control" name="image" id="image"
                                                    value="{{ @$getsettings->image }}"
                                                    title="{{ @$getsettings->image }}">
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span><br>
                                                @enderror
                                                <img src='{{ Helper::image_path(@$getsettings->image) }}'
                                                    class='img-fluid rounded hw-50 mt-1'>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="w-100">
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.logo') }} {{ trans('labels.only_website') }} </label>
                                            <div class="col-lg-9">
                                                <input type="file" class="form-control" name="logo"
                                                    id="logo">
                                                @error('logo')
                                                    <span class="text-danger">{{ $message }}</span><br>
                                                @enderror
                                                <img src='{{ Helper::image_path(@$getsettings->logo) }}'
                                                    class='img-fluid rounded hw-50 mt-1'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.footer_logo') }} {{ trans('labels.only_website') }} </label>
                                            <div class="col-lg-9">
                                                <input type="file" class="form-control" name="footer_logo"
                                                    id="footer_logo">
                                                @error('footer_logo')
                                                    <span class="text-danger">{{ $message }}</span><br>
                                                @enderror
                                                <img src='{{ Helper::image_path(@$getsettings->footer_logo) }}'
                                                    class='img-fluid rounded hw-50 mt-1'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-md-right text-sm-left col-form-label"
                                                for="">{{ trans('labels.Favicon') }} {{ trans('labels.only_website') }} </label>
                                            <div class="col-lg-9">
                                                <input type="file" class="form-control" name="favicon"
                                                    id="favicon">
                                                @error('favicon')
                                                    <span class="text-danger">{{ $message }}</span><br>
                                                @enderror
                                                <img src='{{ Helper::image_path(@$getsettings->favicon) }}'
                                                    class='img-fluid rounded hw-50 mt-1'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-11 m-auto">
                                        <button class="btn btn-primary"
                                            @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif>{{ trans('labels.save') }}</button>
                                        <a href="{{ url('/admin/home') }}"
                                            class="btn btn-dark">{{ trans('labels.cancel') }}</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ @Helper::appdata()->map }}&libraries=places&callback=initMap"
        async defer></script>
    <script src="{{ url('resources/views/admin/cms/settings.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('ckeditor');
    </script>
@endsection
