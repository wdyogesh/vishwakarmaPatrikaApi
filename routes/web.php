<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ItemController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\AddonsController;
use App\Http\Controllers\admin\RattingController;
use App\Http\Controllers\admin\DriverController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\PincodeController;
use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\OrderotpController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\admin\PrivacyPolicyController;
use App\Http\Controllers\admin\TermsController;
use App\Http\Controllers\admin\NotificationController;
use App\Http\Controllers\admin\SystemAddonsController;
use App\Http\Controllers\admin\TimeController;
use App\Http\Controllers\admin\PromocodeController;
use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\admin\OtherPagesController;
use App\Http\Controllers\admin\ZoneController;
use App\Http\Controllers\admin\BookingsController;

// use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These routes are loaded by the RouteServiceProvider within a group which contains the "web" middleware group. Now create something great!
|
*/



//  -------------------------------   for admin  -----------------------------------------   //
Route::get('/auth', function () {
	return view('/auth');
});

Route::get('/', function () { return view('admin.auth.login'); });

Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function () {


	Route::post('check-login', [AdminController::class,'check_admin']);
	Route::get('/forgot-password', function () { return view('admin.auth.forgot_password'); });
	Route::post('send-pass', [AdminController::class,'send_pass']);
	Route::post('auth', [AdminController::class,'auth']);

	Route::group(['middleware' => 'AdminAuth' ],function(){

		// blogs
		Route::get('blogs', [OtherPagesController::class,'blogs_index']);
		Route::get('blogs/add', [OtherPagesController::class,'blogs_add']);
		Route::post('blogs/store', [OtherPagesController::class,'blogs_store']);
		Route::get('blogs-{id}', [OtherPagesController::class,'blogs_show']);
		Route::post('blogs/update-{id}', [OtherPagesController::class,'blogs_update']);
		Route::post('blogs/delete', [OtherPagesController::class,'blogs_delete']);
		// our-team
		Route::get('our-team', [OtherPagesController::class,'our_team_index']);
		Route::get('our-team/add', [OtherPagesController::class,'our_team_add']);
		Route::post('our-team/store', [OtherPagesController::class,'our_team_store']);
		Route::get('our-team-{id}', [OtherPagesController::class,'our_team_show']);
		Route::post('our-team/update-{id}', [OtherPagesController::class,'our_team_update']);
		Route::post('our-team/delete', [OtherPagesController::class,'our_team_delete']);
		// tutorial
		Route::get('tutorial', [OtherPagesController::class,'tutorial_index']);
		Route::get('tutorial/add', [OtherPagesController::class,'tutorial_add']);
		Route::post('tutorial/store', [OtherPagesController::class,'tutorial_store']);
		Route::get('tutorial-{id}', [OtherPagesController::class,'tutorial_show']);
		Route::post('tutorial/update-{id}', [OtherPagesController::class,'tutorial_update']);
		Route::post('tutorial/delete', [OtherPagesController::class,'tutorial_delete']);
		// faq
		Route::get('faq', [OtherPagesController::class,'faq_index']);
		Route::get('faq/add', [OtherPagesController::class,'faq_add']);
		Route::post('faq/store', [OtherPagesController::class,'faq_store']);
		Route::get('faq-{id}', [OtherPagesController::class,'faq_show']);
		Route::post('faq/update-{id}', [OtherPagesController::class,'faq_update']);
		Route::post('faq/delete', [OtherPagesController::class,'faq_delete']);
		// gallery
		Route::get('gallery', [OtherPagesController::class,'gallery_index']);
		Route::get('gallery/add', [OtherPagesController::class,'gallery_add']);
		Route::post('gallery/store', [OtherPagesController::class,'gallery_store']);
		Route::get('gallery-{id}', [OtherPagesController::class,'gallery_show']);
		Route::post('gallery/update-{id}', [OtherPagesController::class,'gallery_update']);
		Route::post('gallery/delete', [OtherPagesController::class,'gallery_delete']);
		// zone
		Route::get('zone', [ZoneController::class,'index']);
		Route::post('zone/store', [ZoneController::class,'store']);
		Route::post('zone/update-{id}', [ZoneController::class,'update']);
		// others
		Route::get('home', [AdminController::class,'home'])->name('dashboard');
		Route::post('changePassword', [AdminController::class,'changePassword']);
		Route::get('getorder', [AdminController::class,'getorder']);
		Route::get('clearnotification', [AdminController::class,'clearnotification']);
		Route::get('change-status', [AdminController::class,'changestatus']);
		Route::get('logout', [AdminController::class,'logout']);
		// bookings
		Route::get('bookings', [BookingsController::class,'bookings']);
		Route::post('bookings/status', [BookingsController::class,'bookingstatus']);
		// slider
		Route::get('slider', [SliderController::class,'index']);
		Route::get('slider/list', [SliderController::class,'list']);
		Route::get('slider/add', [SliderController::class,'add']);
		Route::post('slider/store', [SliderController::class,'store']);
		Route::get('slider-{id}', [SliderController::class,'show']);
		Route::post('slider/update-{id}', [SliderController::class,'update']);
		Route::post('slider/destroy', [SliderController::class,'destroy']);
		// category
		Route::get('category', [CategoryController::class,'index']);
		Route::get('category/add', [CategoryController::class,'add']);
		Route::post('category/store', [CategoryController::class,'store']);
		Route::get('category-{id}', [CategoryController::class,'show']);
		Route::post('category/update-{id}', [CategoryController::class,'update']);
		Route::post('category/status', [CategoryController::class,'status']);
		Route::post('category/delete', [CategoryController::class,'delete']);
		// sub-category
		Route::get('sub-category', [CategoryController::class,'subcategory_index']);
		Route::get('sub-category/add', [CategoryController::class,'subcategory_add']);
		Route::post('sub-category/store', [CategoryController::class,'subcategory_store']);
		Route::post('sub-category/status', [CategoryController::class,'subcategory_status']);
		Route::post('sub-category/delete', [CategoryController::class,'subcategory_delete']);
		Route::get('sub-category-{id}', [CategoryController::class,'subcategory_show']);
		Route::post('sub-category/update-{id}', [CategoryController::class,'subcategory_update']);
		// item
		Route::get('item', [ItemController::class,'index']);
		Route::get('item/add', [ItemController::class,'additem']);
		Route::post('item/store', [ItemController::class,'store']);
		Route::get('item/list', [ItemController::class,'list']);
		Route::post('item/update', [ItemController::class,'update']);
		Route::post('item/showimage', [ItemController::class,'showimage']);
		Route::post('item/updateimage', [ItemController::class,'updateimage']);
		Route::post('item/storeimages', [ItemController::class,'storeimages']);
		Route::post('item/destroyimage', [ItemController::class,'destroyimage']);
		Route::post('item/status', [ItemController::class,'status']);
		Route::post('item/featured', [ItemController::class,'featured']);
		Route::post('item/delete', [ItemController::class,'delete']);
		Route::post('item/deletevariation', [ItemController::class,'deletevariation']);
		Route::get('item-{id}', [ItemController::class,'edititem']);
		Route::get('item/subcategories', [ItemController::class,'subcategories']);
		// payment
		Route::get('payment', [PaymentController::class,'index']);
		Route::post('payment/status', [PaymentController::class,'status']);
		Route::get('payment-{id}', [PaymentController::class,'managepayment']);
		Route::post('payment/update', [PaymentController::class,'update']);
		// addons
		Route::get('addons', [AddonsController::class,'index']);
		Route::get('addons/add', [AddonsController::class,'add']);
		Route::post('addons/store', [AddonsController::class,'store']);
		Route::get('addons-{id}', [AddonsController::class,'show']);
		Route::post('addons/update-{id}', [AddonsController::class,'update']);
		Route::post('addons/status', [AddonsController::class,'status']);
		Route::post('addons/delete', [AddonsController::class,'delete']);
		Route::post('addons/getitem', [AddonsController::class,'getitem']);
		// users
		Route::get('users', [UserController::class,'index']);
		Route::post('users/store', [UserController::class,'store']);
		Route::get('users/list', [UserController::class,'list']);
		Route::post('users/show', [UserController::class,'show']);
		Route::post('users/update', [UserController::class,'update']);
		Route::post('users/status', [UserController::class,'status']);
		Route::get('users-{id}', [UserController::class,'userdetails']);
		Route::post('users/change-wallet', [UserController::class,'add_deduct']);
		Route::post('users/addmoney', [UserController::class,'addmoney']);
		Route::post('users/deductmoney', [UserController::class,'deductmoney']);

		if (\App\SystemAddons::where('unique_identifier', 'otp')->first() != null && \App\SystemAddons::where('unique_identifier', 'otp')->first()->activated) {
			Route::get('orders', [OrderotpController::class,'index']);
			Route::get('invoice/{id}', [OrderotpController::class,'invoice']);
			Route::get('print/{id}', [OrderotpController::class,'print']);
			Route::post('orders/update', [OrderotpController::class,'update']);
			Route::post('orders/assign-driver', [OrderotpController::class,'assign_driver']);
			Route::get('report', [OrderotpController::class,'get_reports']);
		} else {
			Route::get('orders', [OrderController::class,'index']);
			Route::get('invoice/{id}', [OrderController::class,'invoice']);
			Route::get('print/{id}', [OrderController::class,'print']);
			Route::post('orders/update', [OrderController::class,'update']);
			Route::post('orders/assign-driver', [OrderController::class,'assign_driver']);
			Route::get('report', [OrderController::class,'get_reports']);
		}
		Route::get('reviews', [RattingController::class,'index']);
		Route::post('reviews/destroy', [RattingController::class,'destroy']);
		// promocode
		Route::get('promocode', [PromocodeController::class,'index']);
		Route::get('promocode/add', [PromocodeController::class,'add']);
		Route::post('promocode/store', [PromocodeController::class,'store']);
		Route::get('promocode-{id}', [PromocodeController::class,'show']);
		Route::post('promocode/update-{id}', [PromocodeController::class,'update']);
		Route::post('promocode/status', [PromocodeController::class,'status']);
		// pincode
		Route::get('pincode', [PincodeController::class,'index']);
		Route::get('pincode/add', [PincodeController::class,'add']);
		Route::post('pincode/store', [PincodeController::class,'store']);
		Route::get('pincode/list', [PincodeController::class,'list']);
		Route::get('pincode-{id}', [PincodeController::class,'show']);
		Route::post('pincode/update-{id}', [PincodeController::class,'update']);
		Route::post('pincode/destroy', [PincodeController::class,'destroy']);
		Route::post('pincode/status', [PincodeController::class,'status']);
		// banner
		Route::get('banner', [BannerController::class,'index']);
		Route::get('banner/add', [BannerController::class,'add']);
		Route::get('bannersection-1', [BannerController::class,'index']);
		Route::get('bannersection-2', [BannerController::class,'index']);
		Route::get('bannersection-3', [BannerController::class,'index']);
		Route::get('bannersection-1/add', [BannerController::class,'add']);
		Route::get('bannersection-2/add', [BannerController::class,'add']);
		Route::get('bannersection-3/add', [BannerController::class,'add']);
		Route::post('banner/store', [BannerController::class,'store']);
		Route::get('banner-{id}', [BannerController::class,'show']);
		Route::post('banner/update-{id}', [BannerController::class,'update']);
		Route::post('banner/destroy', [BannerController::class,'destroy']);
		// settings
		Route::get('settings', [AboutController::class,'index']);
		Route::post('settings/update', [AboutController::class,'settings_update']);
		// contact
		Route::get('contact', [ContactController::class,'index']);
		// driver
		Route::get('driver', [DriverController::class,'index']);
		Route::get('driver/add', [DriverController::class,'add']);
		Route::post('driver/store', [DriverController::class,'store']);
		Route::get('driver-{id}', [DriverController::class,'show']);
		Route::post('driver/update-{id}', [DriverController::class,'update']);
		Route::post('driver/status', [DriverController::class,'status']);
		// time
		Route::get('time', [TimeController::class,'index']);
		Route::post('time/store', [TimeController::class,'store']);
		// privacypolicy
		Route::get('privacypolicy', [PrivacyPolicyController::class,'index']);
		Route::post('privacypolicy/update', [PrivacyPolicyController::class,'update']);
		// termscondition
		Route::get('termscondition', [TermsController::class,'index']);
		Route::post('termscondition/update', [TermsController::class,'update']);
		// notification
		Route::get('notification', [NotificationController::class,'index']);
		Route::get('notification/add', [NotificationController::class,'add']);
		Route::post('notification/store', [NotificationController::class,'store']);
		// roles
		Route::get('roles', [RolesController::class,'index']);
		Route::get('roles/add', [RolesController::class,'add']);
		Route::post('roles/store', [RolesController::class,'store']);
		Route::post('roles/status', [RolesController::class,'status']);
		Route::get('roles-{id}', [RolesController::class,'show']);
		Route::post('roles/update-{id}', [RolesController::class,'update']);
		// employee
		Route::get('employee', [UserController::class,'employee']);
		Route::get('employee/add', [UserController::class,'add_employee']);
		Route::post('employee/store', [UserController::class,'store_employee']);
		Route::post('employee/status', [UserController::class,'status_employee']);
		Route::get('employee/show-{id}', [UserController::class,'show_employee']);
		Route::post('employee/update-{id}', [UserController::class,'update_employee']);
		// clear-cache
		Route::get('clear-cache', function() {
			Artisan::call('cache:clear');
			Artisan::call('route:clear');
			Artisan::call('config:clear');
			Artisan::call('view:clear');
			return redirect()->back()->with('success', trans('messages.success'));
		});
		// systemaddons
		Route::get('systemaddons', [SystemAddonsController::class,'index']);
		Route::get('createsystem-addons', [SystemAddonsController::class,'createsystemaddons']);
		Route::post('systemaddons/store', [SystemAddonsController::class,'store']);
		Route::get('systemaddons/list', [SystemAddonsController::class,'list']);
		Route::post('systemaddons/update', [SystemAddonsController::class,'update']);
	});
});
