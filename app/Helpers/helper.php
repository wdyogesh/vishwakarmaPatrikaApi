<?php
namespace App\Helpers;
use Intervention\Image\Facades\Image;
use App\Models\About;
use App\Models\Roles;
use App\Models\Cart;
use App\Models\Zone;
use App\Models\Category;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\OTPConfiguration;
use Twilio\Rest\Client;

class helper
{
    public static function push_notification($token,$title,$body,$type,$order_id)
    {
        $newdata = array(
            "type" => $type,
            "order_id" => $order_id,
        );
        if($title == ""){
            $title = @helper::appdata()->website_title;
        }
        $msg = array(
            'body' =>$body,
            'title'=>$title,
            'sound'=>1/*Default sound*/
        );
        $fields = array(
            'to'           =>$token,
            'notification' =>$msg,
            'data'=> $newdata
        );
        $headers = array(
            'Authorization: key=' . @helper::appdata()->firebase,
            'Content-Type: application/json'
        );
        #Send Reponse To FireBase Server
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec ( $ch );
        curl_close ( $ch );
        return $result;
    }
    public static function image_path($image)
    {
        $path = url('/storage/app/public/admin-assets/images/not-found');
        if(Str::contains($image, 'category')){
            $path = url('/storage/app/public/admin-assets/images/category/'.$image);
        }
        if(Str::contains($image, 'profile') || Str::contains($image, 'unknown') || Str::contains($image, 'identity') ){
            $path = url('/storage/app/public/admin-assets/images/profile/'.$image);
        }
        if(Str::contains($image, 'item')){
            $path = url('/storage/app/public/admin-assets/images/item/'.$image);
        }
        if(Str::contains($image, 'banner-')){
            $path = url('/storage/app/public/admin-assets/images/banner/'.$image);
        }
        if(Str::contains($image, 'slider')){
            $path = url('/storage/app/public/admin-assets/images/slider/'.$image);
        }
        if(Str::contains($image, 'payment-') || Str::contains($image, 'app_bottom_image') || Str::contains($image, 'mobile_app_image') || Str::contains($image, 'blog') || Str::contains($image, 'veg') || Str::contains($image, 'gallery') || Str::contains($image, 'tutorial') || Str::contains($image, 'team') || Str::contains($image, 'default') || Str::contains($image, 'about') || Str::contains($image, 'footer') || Str::contains($image, 'logo') || Str::contains($image, 'favicon') || Str::contains($image, 'og_image' )){
            $path = url('/storage/app/public/admin-assets/images/about/'.$image);
        }
        return $path;
    }

    /**
     * this function will return the image path
     * Yogesh Vishwakarma
     */
    public static function user_profile_img_path($image)
    {
        $path = url('/storage/app/public/admin-assets/images/not-found');
        if(Str::contains($image, $image)){
            $path = url('/storage/app/public/profile_picture/350/'.$image);
        }
        return $path;
    }

    public static function web_image_path($image)
    {
        $path = url('/storage/app/public/admin-assets/images/not-found');
        if(Str::contains($image, 'refer') || Str::contains($image, 'nodata') || Str::contains($image, 'nexticon') || Str::contains($image, 'playstore') || Str::contains($image, 'appstore') || Str::contains($image, 'bg1') || Str::contains($image, 'bg2') || Str::contains($image, 'breadcrumb_bg') || Str::contains($image, 'section_bg') || Str::contains($image, 'footer_bg') || Str::contains($image, 'facebook') || Str::contains($image, 'google') || Str::contains($image, 'delivery') || Str::contains($image, 'takeaway') || Str::contains($image, 'cod')|| Str::contains($image, 'wallet') || Str::contains($image, 'razorpay') || Str::contains($image, 'paystack') || Str::contains($image, 'stripe')  || Str::contains($image, 'flutterwave') ){
            $path = url('/storage/app/public/web-assets/images/'.$image);
        }
        return $path;
    }
    /**
     * Function will sedn the verification code
     * Yogesh
     */
    public static function verificationemail($email, $otp){
        $data=['title'=>trans('messages.email_code'),'email'=>$email,'otp'=>$otp,'logo'=>Helper::image_path(@Helper::appdata()->logo)];
        try {
            Mail::send('Email.emailverification',$data,function($message)use($data){
                $message->from(env('MAIL_USERNAME'))->subject($data['title']);
                $message->to($data['email']);
            });
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }
    public static function send_pass($email, $name, $password){
        $data = ['title'=>trans('labels.new_password'),'email'=>$email,'name'=>$name,'password'=>$password,'logo'=>Helper::image_path(@Helper::appdata()->logo)];
        try {
            Mail::send('Email.email',$data,function($message)use($data){
                $message->from(env('MAIL_USERNAME'))->subject($data['title']);
                $message->to($data['email']);
            });
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }
    public static function referral($email,$name,$toname,$referralmessage){
        $data = ['title'=>trans('labels.referral_earning'),'email'=>$email,'name'=>$name,'toname'=>$toname,'logo'=>Helper::image_path(@Helper::appdata()->logo),'referralmessage'=>$referralmessage];
        try {
            Mail::send('Email.referral',$data,function($message)use($data){
                $message->from(env('MAIL_USERNAME'))->subject($data['title']);
                $message->to($data['email']);
            });
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }
    public static function create_order_invoice($user_email,$user_name,$order_number,$orderdata,$itemdata)
    {
        $data = ['title'=>trans('labels.order_placed'),'email'=>$user_email,'name'=>$user_name,'order_number'=>$order_number,'orderdata'=>$orderdata,'itemdata'=>$itemdata,'logo'=>Helper::image_path(@Helper::appdata()->logo)];
        try {
            Mail::send('Email.emailinvoice', $data, function ($message) use ($data) {
                $message->from(env('MAIL_USERNAME'))->subject($data['title']);
                $message->to($data['email']);
            });
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }
    public static function order_status_email($email,$name,$title,$message_text)
    {
        $data = ['email'=>$email,'name'=>$name,'title'=>$title,'message_text'=>$message_text,'logo'=>Helper::image_path(@Helper::appdata()->logo)];
        try {
            Mail::send('Email.orderemail', $data, function ($message) use ($data) {
                $message->from(env('MAIL_USERNAME'))->subject($data['title']);
                $message->to($data['email']);
            });
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }
    public static function get_roles(){
        $data = Roles::select('modules')->where('id',Auth::user()->role_id)->first();
        return @$data->modules;
    }
    public static function get_user_cart(){
        $count = 0;
        if(Auth::user()){
            $count = Cart::where('user_id',Auth::user()->id)->count();
        }
        return $count;
    }
    public static function currency_format($price){
        $price = floatval($price);
        if (@helper::appdata()->currency_position == "1") {
            return @helper::appdata()->currency.number_format($price, 2);
        }
        if (@helper::appdata()->currency_position == "2") {
            return number_format($price, 2).@helper::appdata()->currency;
        }
    }
    public static function appdata(){
        $data = About::select('*',\DB::raw("CONCAT('".url('/storage/app/public/admin-assets/images/about')."/', app_bottom_image) AS app_bottom_image_url"),\DB::raw('(case when app_bottom_image is null then 0 else 1 end) as is_app_bottom_image'))->first();
        return $data;
    }
    public static function stripe_data()
    {
        return Payment::select('environment','test_public_key','test_secret_key','live_public_key','live_secret_key','currency')->where('id','=',4)->where('is_available',1)->first();
    }
    public static function check_alert()
    {
        if(@Helper::appdata()->max_order_qty != "" && @Helper::appdata()->min_order_amount != "" && @Helper::appdata()->max_order_amount != "" && @Helper::appdata()->address != "" && @Helper::appdata()->firebase != "" && @Helper::appdata()->map != "" ){
            return 1;
        }else{
            return 0;
        }
    }
    public static function date_format($date){
        return date("j F Y",strtotime($date));
    }
    public static function date_time_format($date){
        return date("j F Y, g:i a",strtotime($date));
    }
    public static function number_format($number){
        // $number = (float)$number;
        // return number_format($number, 2, '.', '');
        return $number;
    }
    // front & App
    public static function checkzone($lat,$lang)
    {
        // used at add-update-address(Web+app) and before place-order(Web+app) time...
        $zonedata = Zone::select('id','name','coordinates')->first();
        $coordinates = str_replace(['(',')',' '],'',explode('),',@$zonedata->coordinates));
        foreach($coordinates as $value){
            $arr = explode(',',$value);
            $vertices_x[] = (float)$arr[0]; // create array of all latitude points from the polygon OR your area
            $vertices_y[] = (float)$arr[1]; // create array of all longitude points from the polygon OR your area
        }
        $points_polygon = count($vertices_x) - 1;  // number vertices - zero-based array
        $latitude_y = $lang;    // y-coordinate of the point(longitude of your test point)
        $longitude_x = $lat;  // x-coordinate of the point(latitude of your test point)
        $i = $j = $c = 0;
        for ($i = 0, $j = $points_polygon ; $i < $points_polygon; $j = $i++) {
            if ( (($vertices_y[$i]  >  $latitude_y != ($vertices_y[$j] > $latitude_y)) &&
            ($longitude_x < ($vertices_x[$j] - $vertices_x[$i]) * ($latitude_y - $vertices_y[$i]) / ($vertices_y[$j] - $vertices_y[$i]) + $vertices_x[$i]) ) )
            $c = !$c;
        }
        return $c;
    }
    public static function verificationsms($mobile, $otp){
        try {
            $getconfiguration = OTPConfiguration::where('status',1)->first();
            if(!empty($getconfiguration)){
                if ($getconfiguration->name == "twilio") {
                    $sid    = $getconfiguration->twilio_sid;
                    $token  = $getconfiguration->twilio_auth_token;
                    $twilio = new Client($sid, $token);
                    $message = $twilio->messages->create($mobile,array("from" => $getconfiguration->twilio_mobile_number,"body" => "Your Verification Code is : ".$otp) );
                }
                if ($getconfiguration->name == "msg91") {
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://api.msg91.com/api/v5/otp?template_id=".$getconfiguration->msg_template_id."&mobile=".$mobile."&authkey=".$getconfiguration->msg_authkey."",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_HTTPHEADER => array("content-type: application/json"),
                    ));
                    $response = curl_exec($curl);
                    $err = curl_error($curl);
                    curl_close($curl);
                }
                return 1;
            }
            return 0;
        } catch (\Throwable $th) {
            return 0;
        }
    }
    // front
    public static function get_categories()
    {
        return Category::select('id','category_name','slug','image')->where('is_available','=','1')->where('is_deleted','2')->get();;
    }
    public static function get_item_cart($item_id)
    {
        return Cart::where('item_id',$item_id)->where('user_id',Auth::user()->id)->sum('qty');
    }

    /**
     * This fnction will help to add watermark and resize the images and upload into diffrent folder
     * @imageName is required
     */

    public static function addwatermark($imageName)
    {
        $imagePath = Image::make('storage/app/public/profile_picture/'.$imageName)->insert('storage/app/public/water.png', 'top-left' , 5, 5);
        $imagePath->save('storage/app/public/profile_picture/'.$imageName)->destroy();

        $imgSize150 = $imagePath->resize(150, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $imgSize150->save('storage/app/public/profile_picture/150/'.$imageName);

        $imgSize350 = $imagePath->resize(350, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $imgSize350->save('storage/app/public/profile_picture/350/'.$imageName);

        $imgSize800 = $imagePath->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $imgSize800->save('storage/app/public/profile_picture/800/'.$imageName);
    }
}
