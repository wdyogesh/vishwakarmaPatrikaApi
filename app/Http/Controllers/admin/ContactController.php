<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function index(){
        $getcontact = Contact::orderByDesc('id')->get();
        return view('admin.contact.contact',compact('getcontact'));
    }
}
