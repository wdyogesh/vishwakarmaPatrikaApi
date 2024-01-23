<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\helper;
use App\Models\User;
use App\Models\Category;
use App\Models\Item;
use App\Models\Addons;
use App\Models\Ratting;
use App\Models\Banner;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Promocode;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function home(Request $request)
    {

        $getcategory = Category::where('is_available', '1')->where('is_deleted', '2')->get();
        $getitems = Item::where('item_status', '1')->where('is_deleted', '2')->get();
        $addons = Addons::where('is_available', '1')->where('is_deleted', '2')->get();
        $getpromocode = Promocode::where('is_available', 1)->get();
        $getusers = User::Where('type', '=', '2')->get();
        $getdriver = User::where('is_available', '1')->where('type', '3')->get();
        $getreview = Ratting::all();
        $getorderscount = Order::all();
        $getorderdetailscount = OrderDetails::count();
        $banners = Banner::all();
        $order_total = Order::where('status', '!=', '6')->where('status', '!=', '7')->sum('grand_total');
        $order_tax = Order::where('status', '!=', '6')->where('status', '!=', '7')->sum('tax_amount');
        $getorders = Order::with('user_info')->select('order.*')->whereDate('created_at', Carbon::today())->get();

        $topitems = Item::with('category_info', 'subcategory_info')->leftJoin('order_details', 'order_details.item_id', 'item.id')
            ->select('item.id', 'item.cat_id', 'item.subcat_id', 'item.item_name', 'item.slug', 'item.image', 'item.tax', 'item.preparation_time', DB::raw('count(order_details.item_id) as item_order_counter'))
            ->groupBy('order_details.item_id')
            ->orderByDesc('item_order_counter')
            ->having('item_order_counter','>',0)
            ->where('item.item_status', '1')->where('item.is_deleted', '2')
            ->get()->take(5);
        $topusers = User::leftJoin('order', 'order.user_id', 'users.id')
            ->select('users.id', 'users.name', 'users.email', 'users.mobile', 'profile_image', DB::raw('count(order.user_id) as user_order_counter'))
            ->groupBy('order.user_id')
            ->orderByDesc('user_order_counter')
            ->having('user_order_counter','>',0)
            ->where('users.type', '2')
            ->where('users.is_available', '1')
            ->get()->take(5);

        // ORDER-CHART-START
        $request->getyear != "" ? $year = $request->getyear : $year = date('Y');
        $order_years = Order::select(DB::raw("YEAR(created_at) as year"))->groupBy(DB::raw("YEAR(created_at)"))->orderByDesc('created_at')->get();
        $orderlabels = Order::select(DB::raw("MONTHNAME(created_at) as month_name"))->whereYear('created_at', $year)->orderBy('created_at')->groupBy(DB::raw("MONTHNAME(created_at)"))->pluck('month_name');
        $deliverydata = array();
        $pickupdata = array();
        foreach ($orderlabels as $monthname) {
            $deliverydata[] = Order::whereYear('created_at', $year)->where('order_type', 1)->orderBy('created_at')->where(DB::raw("MONTHNAME(created_at)"), $monthname)->count();
            $pickupdata[] = Order::whereYear('created_at', $year)->where('order_type', 2)->orderBy('created_at')->where(DB::raw("MONTHNAME(created_at)"), $monthname)->count();
        }
        // ORDER-CHART-END


        // USERS-CHART-START
        $request->useryear != "" ? $useryear = $request->useryear : $useryear = date('Y');
        $user_years = User::select(DB::raw("YEAR(created_at) as year"))->groupBy(DB::raw("YEAR(created_at)"))->orderByDesc('created_at')->get();
        $userslist = User::select(DB::raw("YEAR(created_at) as year"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("COUNT(id) as total_user"))
            ->whereYear('created_at', $useryear)
            ->where('type', 2)
            ->orderBy('created_at')
            ->groupBy(DB::raw("MONTHNAME(created_at)"))
            ->pluck('total_user', 'month_name');
        $userslabels = $userslist->keys();
        $userdata = $userslist->values();
        // USERS-CHART-END

        // EARNINGS-CHART-START
        $request->earningsyear != "" ? $earningsyear = $request->earningsyear : $earningsyear = date('Y');
        $earnings_years = Order::select(DB::raw("YEAR(created_at) as year"))->groupBy(DB::raw("YEAR(created_at)"))->orderByDesc('created_at')->get();
        $reviewslist = Order::select(DB::raw("YEAR(created_at) as year"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("SUM(grand_total) as grand_total"))
            ->whereYear('created_at', $earningsyear)
            ->whereNotIn('status', array(1, 6, 7))
            ->orderBy('created_at')
            ->groupBy(DB::raw("MONTHNAME(created_at)"))
            ->pluck('grand_total', 'month_name');
        $earningslabels = $reviewslist->keys();
        $earningsdata = $reviewslist->values();
        // EARNINGS-CHART-END

        if ($request->ajax()) {
            return response()->json(['orderlabels' => $orderlabels, 'deliverydata' => $deliverydata, 'pickupdata' => $pickupdata, 'userslabels' => $userslabels, 'userdata' => $userdata, 'earningslabels' => $earningslabels, 'earningsdata' => $earningsdata], 200);
        } else {
            return view('admin.dashboard.home', compact('topitems', 'topusers', 'getcategory', 'getitems', 'addons', 'getusers', 'banners', 'getreview', 'getorderscount', 'getorderdetailscount','order_total', 'order_tax', 'getpromocode', 'getorders', 'getdriver', 'order_years', 'orderlabels', 'deliverydata', 'pickupdata', 'year', 'user_years', 'userslabels', 'userdata', 'earnings_years', 'earningslabels', 'earningsdata'));
        }
    }
    public function getorder()
    {
        $todayorders = Order::with('user_info')->whereDate('created_at', Carbon::today())->where('is_notification', '=', '1')->count();
        return json_encode($todayorders);
    }
    public function clearnotification()
    {
        $update = Order::query()->update(["is_notification" => "2"]);
        return json_encode($update);
    }
    public function login()
    {
        return view('login');
    }
    public function check_admin(Request $request)
    {
        if (ini_get('allow_url_fopen')) {
            $payload = file_get_contents('https://gravityinfotech.net/api/keyverify.php?url=' . str_replace('/check-login', '', url()->current()) . '&type=login');
            $obj = json_decode($payload);
            $obj->status = '1';
            $obj->message = 'You have successfully verified your License. Please try to Login now. If any query Contact us infotechgravity@gmail.com';
            if ($obj->status == '1') {
                $validator = Validator::make($request->all(), [
                    'email' => 'required|email',
                    'password' => 'required',
                ],  [
                    'email.required' => trans('messages.enter_email'),
                    'email.email' => trans('messages.valid_email'),
                    'password.required' => trans('messages.enter_password')
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                } else {
                    if (Auth::attempt($request->only('email', 'password'))) {
                        if (Auth::user()->type == 1) {
                            return redirect()->route('dashboard');
                        } else if (Auth::user()->type == 4) {
                            if (Auth::user()->is_available == 1) {
                                return redirect()->route('dashboard');
                            } else {
                                Auth::logout();
                                return redirect()->back()->with('error', trans('messages.email_pass_invalid'));
                            }
                        } else {
                            Auth::logout();
                            return redirect()->back()->with('error', trans('messages.email_pass_invalid'));
                        }
                    } else {
                        return redirect()->back()->with('error', trans('messages.email_pass_invalid'));
                    }
                }
            } elseif ($obj->status == '3') {
                return Redirect::to('/admin')->with('error', $obj->message);
            } else {
                return Redirect::to('/auth')->with('error', $obj->message);
            }
        }
    }
    public function send_pass(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ],  [
            'email.required' => trans('messages.email_required'),
            'email.email' => trans('messages.valid_email'),
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $checkadmin = User::where('email', $request->email)->where('type', 1)->first();
            if (!empty($checkadmin)) {
                $password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8);
                $pass = Helper::send_pass($checkadmin->email, $checkadmin->name, $password);
                if ($pass == 1) {
                    $checkadmin->password = Hash::make($password);
                    $checkadmin->save();
                    return redirect('admin')->with('success', trans('messages.password_sent'));
                } else {
                    return redirect()->back()->with('error', trans('messages.email_error'));
                }
            } else {
                return redirect()->back()->with('error', trans('messages.invalid_email'));
            }
        }
    }
    public function changestatus(Request $request)
    {
        $status = User::find(Auth::user()->id);
        $status->is_online = $request->status;
        $status->save();
        return true;
    }
    public function changePassword(request $request)
    {
        if ($request->email != "" && $request->oldpassword == "") {
            $validation = Validator::make($request->all(), [
                'email' => 'required',
                'mobile' => 'required',
            ], [
                'email.required' => trans('messages.email_required'),
                'mobile.required' => trans('messages.mobile_required'),
            ]);
            $error_array = array();
            $success_output = '';
            if ($validation->fails()) {
                foreach ($validation->messages()->getMessages() as $field_name => $messages) {
                    $error_array[] = $messages;
                }
            } else {
                $setting = User::where('id', Auth::user()->id)->update(array('email' => $request->email, 'mobile' => $request->mobile));
                Session::flash('message', '<div class="alert alert-success"><strong>' . trans('messages.success') . '</strong></div>');
            }
            $output = array('error' => $error_array, 'success' => $success_output);
            return json_encode($output);
        } else {
            $validation = Validator::make($request->all(), [
                'email' => 'required',
                'mobile' => 'required',
                'oldpassword' => 'required|min:6',
                'newpassword' => 'required|min:6',
                'confirmpassword' => 'required_with:newpassword|same:newpassword|min:6',
            ], [
                'email.required' => trans('messages.email_required'),
                'mobile.required' => trans('messages.mobile_required'),
                'oldpassword.required' => trans('messages.old_password_required'),
                'newpassword.required' => trans('messages.new_password_required'),
                'confirmpassword.required' => trans('messages.confirm_password_required')
            ]);
            $error_array = array();
            $success_output = '';
            if ($validation->fails()) {
                foreach ($validation->messages()->getMessages() as $field_name => $messages) {
                    $error_array[] = $messages;
                }
            } else if ($request->oldpassword == $request->newpassword) {
                $error_array[] = trans('messages.new_password_diffrent');
            } else {
                if (Hash::check($request->oldpassword, Auth::user()->password)) {
                    $setting = User::where('id', Auth::user()->id)->update(['password' => Hash::make($request->newpassword)]);
                    Session::flash('message', '<div class="alert alert-success"><strong>' . trans('messages.success') . '</strong></div>');
                } else {
                    $error_array[] = trans('messages.old_password_invalid');
                }
            }
            $output = array('error' => $error_array, 'success' => $success_output);
            return json_encode($output);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return Redirect::to('/');
    }

    public function auth(Request $request)
    {
        if( ini_get('allow_url_fopen') ) {
            $username = str_replace(' ','',$request->envato_username);

            //$payload = file_get_contents('https://gravityinfotech.net/api/getdata.php?envato_username='.$username.'&email='.$request->email.'&purchase_key='.$request->purchase_key.'&domain='.$request->domain.'&purchase_type=Envato&version=1');

            // $obj = json_decode($payload);
            $status = 1;
            if ($status == '1') {
                return Redirect::to('/admin')->with('success', 'You have successfully verified your License. Please try to Login now. If any query Contact us wdyogesh@gmail.com');
            } else {
                return Redirect::back()->with('error');
            }
        } else {
            return Redirect::back()->with('error', "allow_url_fopen is disabled. file_get_contents would not work. ASK TO YOUR SERVER SUPPORT TO ENABLE THIS 'allow_url_fopen' AND TRY AGAIN");
        }
    }
}
