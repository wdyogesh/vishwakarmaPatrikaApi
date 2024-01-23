<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\helper;
use App\Models\User;
use App\Models\PartnerPreference;
use App\Models\Transaction;
use App\Models\About;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Faker\Extension\Helper as ExtensionHelper;
use Symfony\Component\Console\Helper\Helper as HelperHelper;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if($request->userId == ""){
            return response()->json(["status"=>0,"message"=>trans('messages.email_required')],200);
        }
        if($request->password == ""){
            return response()->json(["status"=>0,"message"=>trans('messages.password_required')],200);
        }
        $checkuser = User::where('user_id', $request->userId)->first();
        if (!empty($checkuser)) {
            if ($checkuser->is_verified == '1') {
                if ($checkuser->is_admin_verified == '1') {
                    // $checkuser->token = $request['token'];
                    // $checkuser->save();
                    $token = $checkuser->createToken($checkuser->name.'-AuthToken')->plainTextToken; // token genration logic
                    $userprofile = $this->getProfilesDetails($checkuser->id);
                    $partner_preference = $this->getPartnerPreference($userprofile['user_id']);
                    return response()->json(['status' => 1, 'message' => trans('messages.success'), 'data' => ['profile' => $userprofile, 'partner_preference' => $partner_preference], 'Authorization_token' => 'Bearer '.$token], 200);
                } else {
                    return response()->json(['status' => 0, 'message' => 'User is not activated. please contact admin, + 91 - 9685944503'], 200);
                }
            } else {
                $otp = rand(100000, 999999);
                $verification = helper::verificationemail($request->email, $otp);
                if ($verification == 1) {
                    $checkuser->otp = $otp;
                    $checkuser->save();
                    return response()->json(['status' => 2, 'message' => trans('messages.unverified'), 'email' => $checkuser->email], 200);
                } else {
                    return response()->json(['status' => 0, 'message' => trans('messages.email_error')], 200);
                }
                return response()->json(['status' => 0, 'message' => trans('messages.email_pass_invalid')], 200);
            }
        } else {
            return response()->json(['status' => 0, 'message' => trans('messages.email_pass_invalid')], 200);
        }
    }

    public function otpverify(Request $request )
    {
        if($request->email == ""){
            return response()->json(["status"=>0,"message"=>trans('messages.email_required')],200);
        }
        if($request->otp == ""){
            return response()->json(["status"=>0,"message"=>trans('messages.otp_required')],200);
        }
        if($request->token == ""){
            return response()->json(["status"=>0,"message"=>trans('messages.token_required')],200);
        }
        $checkuser=User::where('email',$request->email)->first();
        if (!empty($checkuser)) {
            if ($checkuser->otp == $request->otp) {
                $checkuser->otp = null;
                $checkuser->is_verified = 1;
                $checkuser->token = $request->token;
                $checkuser->save();
                $userprofile = $this->getuserprofileobject($checkuser->id);
                return response()->json(['status'=>1,'message'=>trans('messages.success'),'data'=>$userprofile],200);
            } else {
                return response()->json(["status"=>0,"message"=>trans('messages.invalid_otp')],200);
            }
        } else {
            return response()->json(["status"=>0,"message"=>trans('messages.invalid_email')],200);
        }
    }

    public function resendotp(Request $request)
    {
        if($request->email == ""){
            return response()->json(["status"=>0,"message"=>trans('messages.email_required')],200);
        }
        $checkuser=User::where('email',$request->email)->first();
        if (!empty($checkuser)) {
            $otp = rand ( 100000 , 999999 );
            $verification = helper::verificationemail($request->email,$otp);
            if($verification == 1){
                $checkuser->otp = $otp;
                $checkuser->is_verified = 2;
                $checkuser->save();
                return response()->json(['status'=>1,'message'=>trans('messages.email_sent'),'otp'=>$otp],200);
            }else{
                return response()->json(['status'=>0,'message'=>trans('messages.email_error')],200);
            }
        } else {
            return response()->json(["status"=>0,"message"=>trans('messages.invalid_email')],200);
        }
    }

    public function getprofile(Request $request )
    {
        if($request->user_id == ""){
            return response()->json(["status"=>0,"message"=>trans('messages.user_required')],200);
        }
        $checkuser = User::find($request->user_id);
        if(!empty($checkuser)){
            $userprofile = $this->getuserprofileobject($checkuser->id);
            return response()->json(['status'=>1,'message'=>trans('messages.success'),'data'=>$userprofile],200);
        }else{
            return response()->json(['status'=>0,'message'=>trans('messages.invalid_user')],200);
        }
    }

    public function editprofile(Request $request )
    {
        if($request->user_id == ""){
            return response()->json(["status"=>0,"message"=>trans('messages.user_required')],200);
        }
        $checkuser = User::find($request->user_id);
        if(!empty($checkuser)) {
            if($request->name == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.name_required')],200);
            }
            if($request->hasFile('image')){
                if($checkuser->profile_image != "unknown.png" && file_exists('storage/app/public/admin-assets/images/profile/'.$checkuser->profile_image)){
                    unlink('storage/app/public/admin-assets/images/profile/'.$checkuser->profile_image);
                }
                $image = 'profile-' . uniqid() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move('storage/app/public/admin-assets/images/profile', $image);
                $checkuser->profile_image = $image;
                $checkuser->save();
            }
            $checkuser->name = $request->name;
            $checkuser->save();
            $userprofile = $this->getuserprofileobject($checkuser->id);
            return response()->json(['status'=>1,'message'=>trans('messages.success'),'data'=>$userprofile],200);
        }else{
            return response()->json(['status'=>0,'message'=>trans('messages.invalid_user')],200);
        }
    }

    public function changepassword(Request $request)
    {
        if($request->user_id == ""){
            return response()->json(["status"=>0,"message"=>trans('messages.user_required')],200);
        }
        if($request->old_password == ""){
            return response()->json(["status"=>0,"message"=>trans('messages.old_password_required')],200);
        }
        if($request->new_password == ""){
            return response()->json(["status"=>0,"message"=>trans('messages.new_password_required')],200);
        }
        if($request->old_password == $request->new_password){
            return response()->json(['status'=>0,'message'=>trans('messages.new_password_diffrent')],200);
        }
        $checkuser = User::find($request->user_id);
        if(!empty($checkuser)){
            if(Hash::check($request->old_password,$checkuser->password)){
                $checkuser->password = Hash::make($request->new_password);
                $checkuser->save();
                return response()->json(['status'=>1,'message'=>trans('messages.update')],200);
            }else{
                return response()->json(['status'=>0,'message'=>trans('messages.old_password_invalid')],200);
            }
        }else{
            return response()->json(['status'=>0,'message'=>trans('messages.invalid_user')],200);
        }
    }
    public function forgotPassword(Request $request)
    {
        if($request->email == ""){
            return response()->json(["status"=>0,"message"=>trans('messages.email_required')],200);
        }
        $checkuser = User::where('email',$request['email'])->where('type',2)->first();
        if(empty($checkuser)){
            return response()->json(['status'=>0,'message'=>trans('messages.invalid_email')],200);
        } elseif ($checkuser->google_id != "" || $checkuser->facebook_id != "") {
            return response()->json(['status'=>0,'message'=>trans('messages.social_login')],200);
        } else {
            $password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 8 );
            $pass = Helper::send_pass($checkuser->email, $checkuser->name, $password);
            if($pass == 1){
                $checkuser->password = Hash::make($password);
                $checkuser->save();
                return response()->json(['status'=>1,'message'=>trans('messages.password_sent')],200);
            }else{
                return response()->json(['status'=>0,'message'=>trans('messages.email_error')],200);
            }
        }
    }
    public function restaurantslocation(Request $request)
    {
        $trucklocation=User::select('lat','lang')->where('type','1')->first();
        if(!empty($trucklocation)){
            return response()->json(['status'=>1,'message'=>trans('messages.success'),'data'=>$trucklocation],200);
        }else{
            return response()->json(['status'=>0,'message'=>trans('messages.no_data')],200);
        }
    }
    public function isnotification(Request $request)
    {
        if($request->user_id == ""){
            return response()->json(["status"=>0,"message"=>trans('messages.user_required')],200);
        }
        $checkuser = User::where('id',$request->user_id)->where('is_available','1')->first();
        if(!empty($checkuser)){
            if($request->has('notification_status') && $request->notification_status != ""){
                $checkuser->is_notification = $request->notification_status;
                $checkuser->save();
            }
            if($request->has('mail_status') && $request->mail_status != ""){
                $checkuser->is_mail = $request->mail_status;
                $checkuser->save();
            }
            return response()->json(['status'=>1,'message'=>trans('messages.success'),"notification_status"=>$checkuser->is_notification,"mail_status"=>$checkuser->is_mail],200);
        }else{
            return response()->json(['status'=>0,'message'=>trans('messages.invalid_user')],200);
        }
    }
    public function contact(Request $request)
    {
        if($request->firstname == ""){
            return response()->json(["status"=>0,"message"=>trans('messages.first_name_required')],200);
        }
        if($request->lastname == ""){
            return response()->json(["status"=>0,"message"=>trans('messages.last_name_required')],200);
        }
        if($request->email == ""){
            return response()->json(["status"=>0,"message"=>trans('messages.email_required')],200);
        }
        if($request->message == ""){
            return response()->json(["status"=>0,"message"=>trans('messages.message_required')],200);
        }
        $contact = new Contact;
        $contact->firstname = $request->firstname;
        $contact->lastname = $request->lastname;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        return response()->json(['status'=>1,'message'=>trans('messages.success')],200);
    }

    /**
     * Register new user to register for vishwakarmaPatrika
     * Added new field  Email
     */
    public function register(Request $request)
    {
        //static Data
        // $referral_code = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz'), 0, 10);
        $otp = rand ( 100000 , 999999 );
        // check if user is there
        $checkemail=User::where('email',$request->email)->first();
        $checkmobile=User::where('mobile',$request->mobile)->first();
        $checkUserId=User::where('mobile',$request->user_id)->first();
        if ($request->email) {
            if($request->name == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.name_required')],200);
            }
            if($request->gotra == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.gotra_required')],200);
            }
            if($request->gender == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.gender_required')],200);
            }
            if($request->dob == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.dob_required')],200);
            }
            if($request->birthTime == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.birthTime_required')],200);
            }
            if($request->birthPlace == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.birth_place_required')],200);
            }
            if($request->manglik == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.manglik_required')],200);
            }
            if($request->height_f == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.height_f_required')],200);
            }
            if($request->height_i == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.height_i_required')],200);
            }
            if($request->maritalStatus == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.maritalStatus_required')],200);
            }
            if($request->education == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.education_required')],200);
            }
            if($request->occupation == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.occupation_required')],200);
            }
            if($request->hobbies == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.hobbies_required')],200);
            }
            if($request->fatherName == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.fatherName_required')],200);
            }
            if($request->motherName == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.motherName_required')],200);
            }
            if($request->b_married == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.b_married_required')],200);
            }
            if($request->b_unmarried == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.b_unmarried_required')],200);
            }
            if($request->s_married == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.s_married_required')],200);
            }
            if($request->s_unmarried == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.s_unmarried_required')],200);
            }
            if($request->email == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.email_required')],200);
            }
            if($request->mobile == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.mobile_required')],200);
            }
            if($request->address == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.address_required')],200);
            }
            if($request->state == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.state_required')],200);
            }
            if($request->location == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.location_required')],200);
            }
            if($request->city == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.city_required')],200);
            }
            if($request->password == ""){
                return response()->json(["status"=>0,"message"=>trans('messages.password_required')],200);
            }
            if ($request->profileBy == "") {
                return response()->json(["status"=>0,"message"=>trans('messages.profileBy_required')],200);
            }
            if ($request->about_us == "") {
                return response()->json(["status"=>0,"message"=>trans('messages.about_us_required')],200);
            }
            // update image here
            if ($request->file('image') == "") {
                return response()->json(["status"=>0,"message"=>trans('messages.image_required')],200);
            }
            // check email and mobile
            if(!empty($checkemail)){
                return response()->json(['status'=>0,'message'=>trans('messages.email_exist')],200);
            }
            if(!empty($checkmobile)){
                return response()->json(['status'=>0,'message'=>trans('messages.mobile_exist')],200);
            }
            if(!empty($checkUserId)) {
                return response()->json(['status'=>0,'message'=>trans('messages.userId_exist')],200);
            }

            // Genrate the userId
            $userId = strtoupper(substr($request->name, 0, 3)).substr($request->mobile, 6, 4);
            // image process upload file and convert into multiple size from here
            if ($request->hasFile('image')) {
                $image = $otp.'profile-' . $userId . '.' . $request->image->getClientOriginalExtension();
                $request->image->move('storage/app/public/profile_picture', $image);
                // after upload image add watermark andresize
                Helper::addwatermark($image);
            }
            // send email
            $verification = helper::verificationemail($request->email, $otp);
            if ($verification == 0 || 1) {
                $user = new User;
                // insert the user details into the database
                $user->name = $request->name;
                $user->user_id = $userId;
                $user->gotra = $request->gotra;
                $user->gender = $request->gender;
                $user->dob = $request->dob;
                $user->birthTime = $request->birthTime;
                $user->manglik = $request->manglik;
                $user->height_f = $request->height_f;
                $user->height_i = $request->height_i;
                $user->marital_status = $request->maritalStatus;
                $user->profileBy = $request->profileBy;
                $user->education = $request->education;
                $user->education_details = $request->education_details;
                $user->occupation = $request->occupation;
                $user->occupation_details = $request->occupation_details;
                $user->hobbies = $request->hobbies;
                $user->fatherName = $request->fatherName;
                $user->father_Occupation = $request->father_Occupation;
                $user->MotherName = $request->motherName;
                $user->mother_Occupation = $request->mother_Occupation;
                $user->b_married = $request->b_married;
                $user->b_unmarried = $request->b_unmarried;
                $user->s_married = $request->s_married;
                $user->s_unmarried = $request->s_unmarried;
                $user->mobile = $request->mobile;
                $user->mobile_2 = $request->mobile_2;
                $user->email = $request->email;
                $user->address = $request->address ? $request->address : '';
                $user->state = $request->state;
                $user->location = $request->location;
                $user->city = $request->city;
                $user->password = $request->password;
                $user->is_verified = 1; // Update here Email configured the update with 0
                $user->is_admin_verified = 1; // Update here once email is registration the update with
                $user->is_available = $request->is_available ? $request->is_available : '';
                $user->date_time = date("Y-m-d H:i:s");
                $user->about_us = $request->about_us;
                $user->payment = $request->payment ? $request->payment : '';
                $user->fileToUpload = $image;
                $user->otp = $otp;
                $user->save();
                if ($user-> is_admin_verified == 0) {
                    return response()->json(['status' => 1, 'message' => 'Your Profile registred Successfully, please contact to admin, + 91 - 9685944503'], 200);
                }
                $userprofile = $this->getProfilesDetails($user->id);
                $partner_preference = $this->getPartnerPreference($userprofile['user_id']);
                return response()->json(['status' => 1, 'message' => trans('messages.success'), 'data' => ['profile' => $userprofile, 'partner_preference' => $partner_preference]], 200);
            } else {
                return response()->json(['status' => 0, 'message' => trans('messages.email_error')], 200);
            }
        }
    }
    public function getuserprofileobject($id)
    {
        // NOTE ::- This function is used at multiple places in this controller and also in front->HomeController
        $arr = array(
            'id'=>"",
            'name'=>"",
            'mobile'=>"",
            'email'=>"",
            'login_type'=>"",
            'wallet'=>"",
            'is_notification'=>"",
            'is_mail'=>"",
            'referral_code'=>"",
            'profile_image'=>""
        );
        $checkuser = User::where('id',$id)->first();
        if(!empty($checkuser)){
            $arr = array(
                'id'=>$checkuser->id,
                'name'=>$checkuser->name,
                'mobile'=>$checkuser->mobile,
                'email'=>$checkuser->email,
                'login_type'=>$checkuser->login_type,
                'wallet'=>$checkuser->wallet,
                'is_notification'=>$checkuser->is_notification == "" ? "" : "$checkuser->is_notification",
                'is_mail'=>$checkuser->is_mail == "" ? "" : "$checkuser->is_mail",
                'referral_code'=>$checkuser->referral_code == "" ? "" : $checkuser->referral_code,
                'profile_image'=>Helper::image_path($checkuser->profile_image)
            );
        }
        return $arr;
    }

    /**
     * this function will return the partner prefrence from here
     * this is for partner preference objects
     */
    public function getPartnerPreference($userId) {
        return PartnerPreference::select()->where('user_id', $userId)->get();
    }

    /**
     * function will retun the profiles lists
     * yogesh Vishwakarma
     */
    public function getProfilesDetails($id)
    {
        $arr = [];
        // NOTE ::- This function is used at multiple places in this controller and also in front->HomeController
        $checkuser = User::where('id', $id)->first();
        if (!empty($checkuser)) {
            $arr = array(
                'id' => $checkuser->id,
                'name' => $checkuser->name,
                'user_id' => $checkuser->user_id,
                'gotra' => $checkuser->gotra,
                'gender' => $checkuser->gender,
                'dob' => $checkuser->dob,
                'birthTime' => $checkuser->birthTime,
                'manglik' => $checkuser->manglik,
                'height'=> $checkuser->height_f .' : '. $checkuser->height_i,
                'height_f' => $checkuser->height_f,
                'height_i' => $checkuser->height_i,
                'marital_status' => $checkuser->marital_status,
                'profileBy' => $checkuser->profileBy,
                'fileToUpload' => $checkuser->fileToUpload,
                'education' => $checkuser->education,
                'education_details' => $checkuser->education_details,
                'occupation' => $checkuser->occupation,
                'occupation_details' => $checkuser->occupation_details,
                'hobbies' => $checkuser->hobbies,
                'fatherName' => $checkuser->fatherName,
                'father_Occupation' => $checkuser->father_Occupation,
                'MotherName' => $checkuser->MotherName,
                'mother_Occupation' => $checkuser->mother_Occupation,
                'b_married' => $checkuser->b_married,
                'b_unmarried' => $checkuser->b_unmarried,
                's_married' => $checkuser->s_married,
                's_unmarried' => $checkuser->s_unmarried,
                'mobile' => $checkuser->mobile,
                'mobile_2' => $checkuser->mobile_2,
                'email' => $checkuser->email,
                'address' => $checkuser->address,
                'state' => $checkuser->state,
                'location' => $checkuser->location,
                'city' => $checkuser->city,
                'pass1' => $checkuser->pass1,
                'id_conform' => $checkuser->id_conform,
                'date_time' => $checkuser->date_time,
                'about_us' => $checkuser->about_us,
                'payment' => $checkuser->payment,
                'txn_id' => $checkuser->txn_id ? $checkuser->txn_id : null,
                'payment_date' => $checkuser->payment_date ? $checkuser->payment_date : null,
                'age' => Carbon::parse($checkuser->age)->age,
                'dateOfBirth' => Carbon::parse($checkuser->dateOfBirth)->format('d-M-Y'),
                'profile_image' => Helper::user_profile_img_path($checkuser->fileToUpload),
                'image_thumbImagePath' => Helper::user_profile_img_path($checkuser->fileToUpload)
            );
        }
        return $arr;
    }

    /**
     * This methos will return the lists of all registred users Activated and admin varified
     */
    public function getAllActiveProfiles()
    {
        // NOTE ::- This function is used at multiple places in this controller and also in front->HomeController
        $dataListing = User::select('id', 'name', 'user_id',
        'gotra', 'gender', 'dob', 'birthTime', 'manglik', 'height_f',
        'height_i', 'marital_status', 'profileBy', 'fileToUpload',
        'education', 'education_details', 'occupation', 'occupation_details',
        'hobbies', 'fatherName', 'father_Occupation', 'MotherName',
        'state', 'location', 'city', \DB::raw("CONCAT('".url('/storage/app/public/profile_picture/350')."/', fileToUpload) AS image_url"))
        ->where('is_verified', 1)
        ->where('is_admin_verified', 1)
        ->get();
        $dataListing->transform(function ($dataListing) {
            // Assuming 'dob' is the column containing the date of birth
            $dataListing->age = Carbon::parse($dataListing->dob)->age;
            return $dataListing;
        });
        return response()->json(['status'=>1,'message'=>trans('messages.success'),'data'=>$dataListing],200);
    }

    /**
     * This methos will return all the brides form the datbase
     */
    public function getAllBrides()
    {
        // NOTE ::- This function is used at multiple places in this controller and also in front->HomeController
        $dataListing = User::select('id', 'name', 'user_id',
        'gotra', 'gender', 'dob', 'birthTime', 'manglik', 'height_f',
        'height_i', 'marital_status', 'profileBy', 'fileToUpload',
        'education', 'education_details', 'occupation', 'occupation_details',
        'hobbies', 'fatherName', 'father_Occupation', 'MotherName', // \DB::raw("CONCAT('".Carbon::parse('dob')->age."/', dob) AS image_url"),
        'state', 'location', 'city', \DB::raw("CONCAT('".url('/storage/app/public/profile_picture/350')."/', fileToUpload) AS image_url"))
        ->where('is_verified', 1)
        ->where('is_admin_verified', 1)
        ->where('gender', 'F')
        ->get();

        $dataListing->transform(function ($dataListing) {
            // Assuming 'dob' is the column containing the date of birth
            $dataListing->age = Carbon::parse($dataListing->dob)->age;
            return $dataListing;
        });
        return response()->json(['status'=>1,'message'=>trans('messages.success'),'data'=>$dataListing],200);
    }

    /**
     * This methos will return all the grooms form the datbase
     */
    public function getAllGrooms()
    {
        // NOTE ::- This function is used at multiple places in this controller and also in front->HomeController
        $dataListing = User::select('id', 'name', 'user_id',
        'gotra', 'gender', 'dob', 'birthTime', 'manglik', 'height_f',
        'height_i', 'marital_status', 'profileBy', 'fileToUpload',
        'education', 'education_details', 'occupation', 'occupation_details',
        'hobbies', 'fatherName', 'father_Occupation', 'MotherName',
        'state', 'location', 'city', \DB::raw("CONCAT('".url('/storage/app/public/profile_picture/350')."/', fileToUpload) AS image_url"))
        ->where('is_verified', 1)
        ->where('is_admin_verified', 1)
        ->where('gender', 'M')
        ->get();
        $dataListing->transform(function ($dataListing) {
            // Assuming 'dob' is the column containing the date of birth
            $dataListing->age = Carbon::parse($dataListing->dob)->age;
            return $dataListing;
        });
        return response()->json(['status'=>1,'message'=>trans('messages.success'),'data'=>$dataListing],200);
    }

    /**
     * This methos will return all the grooms form the datbase
     */
    public function getProfileDetails(Request $reuest) {
        $checkUserPaidMember = User::where('id', $reuest->loggedUserId)->first();
        $checkuser = User::where('id', $reuest->id)->first();
        if (!empty($checkuser)) {
            $users = array(
                'id' => $checkuser->id,
                'name' => $checkuser->name,
                'user_id' => $checkuser->user_id,
                'gotra' => $checkuser->gotra,
                'gender' => $checkuser->gender,
                'dob' => $checkuser->dob,
                'birthTime' => $checkuser->birthTime,
                'manglik' => $checkuser->manglik,
                'height'=> $checkuser->height_f .' : '. $checkuser->height_i,
                'height_f' => $checkuser->height_f,
                'height_i' => $checkuser->height_i,
                'marital_status' => $checkuser->marital_status,
                'profileBy' => $checkuser->profileBy,
                'fileToUpload' => $checkuser->fileToUpload,
                'education' => $checkuser->education,
                'education_details' => $checkuser->education_details,
                'occupation' => $checkuser->occupation,
                'occupation_details' => $checkuser->occupation_details,
                'hobbies' => $checkuser->hobbies,
                'fatherName' => $checkuser->fatherName,
                'father_Occupation' => $checkuser->father_Occupation,
                'MotherName' => $checkuser->MotherName,
                'mother_Occupation' => $checkuser->mother_Occupation,
                'b_married' => $checkuser->b_married,
                'b_unmarried' => $checkuser->b_unmarried,
                's_married' => $checkuser->s_married,
                's_unmarried' => $checkuser->s_unmarried,
                'address' => $checkuser->address,
                'state' => $checkuser->state,
                'location' => $checkuser->location,
                'city' => $checkuser->city,
                'pass1' => $checkuser->pass1,
                'id_conform' => $checkuser->id_conform,
                'date_time' => $checkuser->date_time,
                'about_us' => $checkuser->about_us,
                'payment' => $checkuser->payment,
                'txn_id' => $checkuser->txn_id ? $checkuser->txn_id : null,
                'payment_date' => $checkuser->payment_date ? $checkuser->payment_date : null,
                'age' => Carbon::parse($checkuser->dob)->age,
                'dateOfBirth' => Carbon::parse($checkuser->dateOfBirth)->format('d-M-Y'),
                'profile_image' => Helper::user_profile_img_path($checkuser->fileToUpload),
                'image_thumbImagePath' => Helper::user_profile_img_path($checkuser->fileToUpload)
            );
            if ($checkUserPaidMember->payment == 1) {
                $users['mobile'] = $checkuser->mobile;
                $users['mobile_2'] = $checkuser->mobile_2;
                $users['email'] = $checkuser->email;
                $users['mobile'] = $checkuser->mobile;
            }
        }
        return response()->json(['status'=>1,'message'=>trans('messages.success'),'data'=>$users],200);
    }

}
