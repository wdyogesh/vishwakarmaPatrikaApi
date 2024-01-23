<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
use Illuminate\Support\Facades\Validator;
class PaymentController extends Controller
{
    public function index(){
        $getpayment = Payment::get();
        return view('admin.payment.payment',compact('getpayment'));
    }
    public function managepayment($id) {
        $paymentdetails = Payment::where('id', $id)->first();
        return view('admin.payment.manage-payment', compact('paymentdetails'));
    }
    public function update(Request $request){
        $payment = Payment::find($request->id);

        if($request->hasFile('image')){
            if($payment->image != "" && file_exists('storage/app/public/admin-assets/images/about/'.$payment->image)){
                unlink('storage/app/public/admin-assets/images/about/'.$payment->image);
            }
            $img = $request->file('image');
            $image = 'payment-' . uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move('storage/app/public/admin-assets/images/about/', $image);
            $payment->image = $image;
            $payment->save();
        }
        $payment->environment =$request->environment;
        $payment->currency =$request->currency;
        $payment->test_public_key =$request->test_public_key;
        $payment->test_secret_key =$request->test_secret_key;
        $payment->live_public_key =$request->live_public_key;
        $payment->live_secret_key =$request->live_secret_key;
        $payment->encryption_key =$request->encryption_key;
        $payment->save();
        return redirect('admin/payment')->with('success', trans('messages.success'));
    }
    public function status(Request $request){
        $payment = Payment::where('id', $request->id)->update( array('is_available'=>$request->status) );
        if ($payment) {
            return 1;
        } else {
            return 0;
        }
    }
}
