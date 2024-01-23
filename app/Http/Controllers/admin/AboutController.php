<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Validator;
class AboutController extends Controller
{
    public function index(){
        $getsettings = About::first();
        return view('admin.cms.settings',compact('getsettings')); 
    }
    public function settings_update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'address'=>'required',
            'lat'=>'required',
            'lang'=>'required',
            'max_order_qty'=>'required',
            'min_order_amount'=>'required',
            'max_order_amount'=>'required',
            'map'=>'required',
            'firebase'=>'required',
            'referral_amount'=>'required',
            // 'email'=>'required',
            // 'mobile'=>'required',
            // 'currency'=>'required',
            // 'currency_position'=>'required',
            // 'fb'=>'required',
            // 'youtube'=>'required',
            // 'insta'=>'required',
            // 'android'=>'required',
            // 'ios'=>'required',
            // 'copyright'=>'required',
            // 'title'=>'required',
            // 'short_title'=>'required',
            // 'og_title'=>'required',
            // 'about_content'=>'required',
            // 'og_description'=>'required',
            // 'delivery_charge'=>'required',
            // 'timezone'=>'required',
        ],[
            "address.required"=>trans('messages.address_required'),
            "lat.required"=>trans('messages.lat_required'),
            "lang.required"=>trans('messages.lang_required'),
            "max_order_qty.required"=>trans('messages.max_order_qty_required'),
            "min_order_amount.required"=>trans('messages.min_order_amount_required'),
            "max_order_amount.required"=>trans('messages.max_order_amount_required'),
            "map.required"=>trans('messages.map_required'),
            "firebase.required"=>trans('messages.firebase_required'),
            "referral_amount.required"=>trans('messages.referral_amount_required'),
            // "email.required"=>trans('messages.email_required'),
            // "mobile.required"=>trans('messages.mobile_required'),
            // "currency.required"=>trans('messages.currency_required'),
            // "currency_position.required"=>trans('messages.currency_position_required'),
            // "fb.required"=>trans('messages.link_required'),
            // "youtube.required"=>trans('messages.link_required'),
            // "insta.required"=>trans('messages.link_required'),
            // "android.required"=>trans('messages.link_required'),
            // "ios.required"=>trans('messages.link_required'),
            // "copyright.required"=>trans('messages.copyright_required'),
            // "title.required"=>trans('messages.title_required'),
            // "short_title.required"=>trans('messages.short_title_required'),
            // "og_title.required"=>trans('messages.og_title_required'),
            // "about_content.required"=>trans('messages.about_content_required'),
            // "og_description.required"=>trans('messages.og_description_required'),
            // "delivery_charge.required"=>trans('messages.delivery_charge_required'),
            // "timezone.required"=>trans('messages.timezone_required'),
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            // if(isset($request->image)){
            //     if($request->hasFile('image')){
            //         $image = $request->file('image');
            //         $image = 'about-' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            //         $request->image->move('storage/app/public/admin-assets/images/about', $image);
            //         $about = About::first();
            //         if(empty($about)){
            //             $about = new About();
            //         }else{
            //             if(file_exists('storage/app/public/admin-assets/images/about/'.$about->image)){
            //                 unlink('storage/app/public/admin-assets/images/about/'.$about->image);
            //             }
            //         }
            //         $about->image= $image;
            //         $about->save();
            //     }
            // }
            if(isset($request->footer_logo)){
                if($request->hasFile('footer_logo')){
                    $footer_logo = $request->file('footer_logo');
                    $footer_logo = 'footer-' . uniqid() . '.' . $request->footer_logo->getClientOriginalExtension();
                    $request->footer_logo->move('storage/app/public/admin-assets/images/about', $footer_logo);
                    $about = About::first();
                    if(empty($about)){
                        $about = new About();
                    }else{
                        if(file_exists('storage/app/public/admin-assets/images/about/'.$about->footer_logo)){
                            unlink('storage/app/public/admin-assets/images/about/'.$about->footer_logo);
                        }
                    }
                    $about->footer_logo= $footer_logo;
                    $about->save();
                }            
            }
            if(isset($request->favicon)){
                if($request->hasFile('favicon')){
                    $favicon = $request->file('favicon');
                    $favicon = 'favicon-' . uniqid() . '.' . $request->favicon->getClientOriginalExtension();
                    $request->favicon->move('storage/app/public/admin-assets/images/about', $favicon);
                    $about = About::first();
                    if(empty($about)){
                        $about = new About();
                    }else{
                        if(file_exists('storage/app/public/admin-assets/images/about/'.$about->favicon)){
                            unlink('storage/app/public/admin-assets/images/about/'.$about->favicon);
                        }
                    }
                    $about->favicon= $favicon;
                    $about->save();
                }            
            }
            if(isset($request->logo)){
                if($request->hasFile('logo')){
                    $logo = $request->file('logo');
                    $logo = 'logo-' . uniqid() . '.' . $request->logo->getClientOriginalExtension();
                    $request->logo->move('storage/app/public/admin-assets/images/about', $logo);
                    $about = About::first();
                    if(empty($about)){
                        $about = new About();
                    }else{
                        if(file_exists('storage/app/public/admin-assets/images/about/'.$about->logo)){
                            unlink('storage/app/public/admin-assets/images/about/'.$about->logo);
                        }
                    }
                    $about->logo= $logo;
                    $about->save();
                }            
            }
            if(isset($request->og_image)){
                if($request->hasFile('og_image')){
                    $og_image = $request->file('og_image');
                    $og_image = 'og_image-' . uniqid() . '.' . $request->og_image->getClientOriginalExtension();
                    $request->og_image->move('storage/app/public/admin-assets/images/about', $og_image);
                    $about = About::first();
                    if(empty($about)){
                        $about = new About();
                    }else{
                        if(file_exists('storage/app/public/admin-assets/images/about/'.$about->og_image)){
                            unlink('storage/app/public/admin-assets/images/about/'.$about->og_image);
                        }
                    }
                    $about->og_image= $og_image;
                    $about->save();
                }            
            }
            if(isset($request->mobile_app_image)){
                if($request->hasFile('mobile_app_image')){
                    $mobile_app_image = $request->file('mobile_app_image');
                    $mobile_app_image = 'mobile_app_image-' . uniqid() . '.' . $request->mobile_app_image->getClientOriginalExtension();
                    $request->mobile_app_image->move('storage/app/public/admin-assets/images/about', $mobile_app_image);
                    $about = About::first();
                    if(empty($about)){
                        $about = new About();
                    }else{
                        if(file_exists('storage/app/public/admin-assets/images/about/'.$about->mobile_app_image)){
                            unlink('storage/app/public/admin-assets/images/about/'.$about->mobile_app_image);
                        }
                    }
                    $about->mobile_app_image= $mobile_app_image;
                    $about->save();
                }            
            }
            if(isset($request->app_bottom_image)){
                if($request->hasFile('app_bottom_image')){
                    $app_bottom_image = $request->file('app_bottom_image');
                    $app_bottom_image = 'app_bottom_image-' . uniqid() . '.' . $request->app_bottom_image->getClientOriginalExtension();
                    $request->app_bottom_image->move('storage/app/public/admin-assets/images/about', $app_bottom_image);
                    $about = About::first();
                    if(empty($about)){
                        $about = new About();
                    }else{
                        if(file_exists('storage/app/public/admin-assets/images/about/'.$about->app_bottom_image)){
                            unlink('storage/app/public/admin-assets/images/about/'.$about->app_bottom_image);
                        }
                    }
                    $about->app_bottom_image= $app_bottom_image;
                    $about->save();
                }            
            }
            $about = About::first();
            if(empty($about)){
                $about = new About();
            }
            $about->address = $request->address;
            $about->lat = $request->lat;
            $about->lang = $request->lang;
            $about->max_order_qty = $request->max_order_qty;
            $about->min_order_amount = $request->min_order_amount;
            $about->max_order_amount = $request->max_order_amount;
            $about->map = $request->map;
            $about->firebase = $request->firebase;
            $about->referral_amount = $request->referral_amount;

            $about->email = $request->email;
            $about->mobile = $request->mobile;
            $about->currency = $request->currency;
            $about->currency_position = $request->currency_position;
            $about->delivery_charge = $request->delivery_charge;
            $about->timezone = $request->timezone;
            $about->about_content = $request->about_content;
            $about->fb = $request->fb;
            $about->youtube = $request->youtube;
            $about->insta = $request->insta;
            $about->android = $request->android;
            $about->ios = $request->ios;
            $about->copyright = $request->copyright;
            $about->title = $request->title;
            $about->short_title = $request->short_title;
            $about->og_title = $request->og_title;
            $about->og_description = $request->og_description;
            $about->mobile_app_title = $request->mobile_app_title;
            $about->mobile_app_description = $request->mobile_app_description;
            $about->save();
            return redirect('admin/settings')->with('success', trans('messages.success'));
        }
    }
}