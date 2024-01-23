<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\OtherPagesController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\RattingController;
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\Api\PromocodeController;
use App\Http\Controllers\Api\FormRegistrationLists;

use App\Http\Controllers\Api\AdminotpController;
use App\Http\Controllers\Api\CheckoutotpController;
use App\Http\Controllers\Api\UserotpController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace'=>'Api'],function (){
    // if (\App\SystemAddons::where('unique_identifier', 'otp')->first() != null && \App\SystemAddons::where('unique_identifier', 'otp')->first()->activated) {
    //     Route::post('login',[UserotpController::class,'login']);
    //     Route::post('register',[UserotpController::class,'register']);
    //     Route::post('otpverify',[UserotpController::class,'otpverify']);
    //     Route::post('editprofile',[UserotpController::class,'editprofile']);
    //     Route::post('getprofile',[UserotpController::class,'getprofile']);
    //     Route::post('changepassword',[UserotpController::class,'changepassword']);
    //     Route::post('forgotPassword',[UserotpController::class,'forgotPassword']);
    //     Route::get('restaurantslocation',[UserotpController::class,'restaurantslocation']);
    //     Route::post('resendotp',[UserotpController::class,'resendotp']);
    //     Route::post('contact',[UserotpController::class,'contact']);
    //     // order
    //     Route::post('paymentmethodlist',[CheckoutotpController::class,'paymentmethodlist']);
    //     Route::post('summary',[CheckoutotpController::class,'summary']);
    //     Route::post('order',[CheckoutotpController::class,'order']);
    //     Route::post('orderhistory',[CheckoutotpController::class,'orderhistory']);
    //     Route::post('getorderdetails',[CheckoutotpController::class,'getorderdetails']);
    //     Route::post('ordercancel',[CheckoutotpController::class,'ordercancel']);
    //     Route::post('checkdeliveryzone',[CheckoutotpController::class,'checkdeliveryzone']);
    //     //Admin/Vendor
    //     Route::get('getdrivers',[AdminotpController::class,'getdrivers']);
    //     Route::post('vendorlogin',[AdminotpController::class,'login']);
    //     Route::post('vendorhome',[AdminotpController::class,'home']);
    //     Route::post('vendororderhistory',[AdminotpController::class,'orderhistory']);
    //     Route::post('vendoreditprofile',[AdminotpController::class,'editprofile']);
    //     Route::post('vendorchangepassword',[AdminotpController::class,'changepassword']);
    //     Route::post('vendorforgotpassword',[AdminotpController::class,'forgotPassword']);
    //     Route::post('updatestatus',[AdminotpController::class,'updatestatus']);
    //     Route::post('assigndriver',[AdminotpController::class,'assigndriver']);
    // } else {
        //FormRegistratioFieldsLists
        Route::get('formFieldsList', [FormRegistrationLists::class,'formFieldsList']);
        //
        Route::post('login',[UserController::class,'login']);
        Route::post('register',[UserController::class,'register']);
        Route::post('otpverify',[UserController::class,'otpverify']);
        Route::post('editprofile',[UserController::class,'editprofile']);
        Route::post('getprofile',[UserController::class,'getprofile']);
        Route::post('changepassword',[UserController::class,'changepassword']);
        Route::post('forgotPassword',[UserController::class,'forgotPassword']);
        Route::get('restaurantslocation',[UserController::class,'restaurantslocation']);
        Route::post('resendotp',[UserController::class,'resendotp']);
        Route::post('contact',[UserController::class,'contact']);
        Route::get('getAllProfiles',[UserController::class,'getAllActiveProfiles']);
        Route::get('getAllBrides',[UserController::class,'getAllBrides']);
        Route::get('getAllGrooms',[UserController::class,'getAllGrooms']);
        Route::post('getProfileDetails', [UserController::class,'getProfileDetails']);
        // order
        Route::post('paymentmethodlist',[CheckoutController::class,'paymentmethodlist']);
        Route::post('summary',[CheckoutController::class,'summary']);
        Route::post('order',[CheckoutController::class,'order']);
        Route::post('orderhistory',[CheckoutController::class,'orderhistory']);
        Route::post('getorderdetails',[CheckoutController::class,'getorderdetails']);
        Route::post('ordercancel',[CheckoutController::class,'ordercancel']);
        Route::post('checkdeliveryzone',[CheckoutController::class,'checkdeliveryzone']);
        //Admin/Vendor
        Route::get('getdrivers',[AdminController::class,'getdrivers']);
        Route::post('vendorlogin',[AdminController::class,'login']);
        Route::post('vendorhome',[AdminController::class,'home']);
        Route::post('vendororderhistory',[AdminController::class,'orderhistory']);
        Route::post('vendoreditprofile',[AdminController::class,'editprofile']);
        Route::post('vendorchangepassword',[AdminController::class,'changepassword']);
        Route::post('vendorforgotpassword',[AdminController::class,'forgotPassword']);
        Route::post('updatestatus',[AdminController::class,'updatestatus']);
        Route::post('assigndriver',[AdminController::class,'assigndriver']);
    //}
    // promocode
    Route::get('promocodelist',[PromocodeController::class,'promocodelist']);
    Route::post('checkpromocode',[PromocodeController::class,'checkpromocode']);
    // otherpages
    Route::get('blogs',[OtherPagesController::class,'blogs'])->middleware('auth:sanctum');;
    Route::get('ourteam',[OtherPagesController::class,'ourteam']);
    Route::get('tutorial',[OtherPagesController::class,'tutorial']);
    Route::get('faq',[OtherPagesController::class,'faq']);
    Route::get('gallery',[OtherPagesController::class,'gallery']);
    Route::get('aboutus', [OtherPagesController::class,'aboutus']);
    // cmspages
    Route::get('cmspages',[OtherPagesController::class,'cmspages']);
    // home
    Route::post('isopenclose',[HomeController::class,'isopenclose']);
    Route::post('home',[HomeController::class,'newhome']);
    Route::post('booktable',[HomeController::class,'booktable']);
    // ratting
    Route::post('ratting',[RattingController::class,'ratting']);
    Route::get('rattinglist',[RattingController::class,'rattinglist']);
    // item || favorite
    Route::post('searchitem',[ItemController::class,'searchitem']);
    Route::post('itemdetails',[ItemController::class,'itemdetails']);
    Route::post('categoryitems',[ItemController::class,'category_items']);
    Route::post('managefavorite',[ItemController::class,'managefavorite']);
    Route::post('favoritelist',[ItemController::class,'favoritelist']);
    // user --> wallet
    Route::post('/isnotification',[UserController::class,'isnotification']);
    Route::post('/addwallet',[WalletController::class,'addwallet']);
    Route::post('/wallettransactions',[WalletController::class,'transactions']);
    // cart
    Route::post('addtocart',[CartController::class,'addtocart']);
    Route::post('qtyupdate',[CartController::class,'qtyupdate']);
    Route::post('getcart',[CartController::class,'getcart']);
    Route::post('deletecartitem',[CartController::class,'deletecartitem']);
    // address
    Route::post('getaddress',[AddressController::class,'getaddress']);
    Route::post('addaddress',[AddressController::class,'addaddress']);
    Route::post('updateaddress',[AddressController::class,'updateaddress']);
    Route::post('deleteaddress',[AddressController::class,'deleteaddress']);
    //Driver
    Route::post('driverlogin',[DriverController::class,'login']);
    Route::post('driverongoingorder',[DriverController::class,'ongoingorder']);
    Route::post('driverorder',[DriverController::class,'orderhistory']);
    Route::post('driverorderdetails',[DriverController::class,'getorderdetails']);
    Route::post('delivered',[DriverController::class,'delivered']);
    Route::post('drivergetprofile',[DriverController::class,'getprofile']);
    Route::post('drivereditprofile',[DriverController::class,'editprofile']);
    Route::post('driverchangepassword',[DriverController::class,'changepassword']);
    Route::post('driverforgotPassword',[DriverController::class,'forgotPassword']);
});
