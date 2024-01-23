<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Roles;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    public function index(Request $request){
        $getroles = Roles::orderBydesc('id')->get();
        return view('admin.roles.index',compact('getroles'));
    }
    public function add(Request $request){
        return view('admin.roles.add');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'modules' => 'required',
            'modules.*' => 'required|min:1',
        ],[
            "name.required"=>trans('messages.rolename_required'),
            "modules.required"=>trans('messages.one_selection_required'),
            "modules.*.required"=>trans('messages.one_selection_required'),
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $banner = new Roles;
            $banner->name = $request->name;
            $banner->modules = implode(',',$request->modules);
            $banner->is_available = 1;
            $banner->save();
            return redirect('admin/roles')->with('success', trans('messages.success'));
        }
    }
    public function show(Request $request,$id){
        $data = Roles::find($id);
        return view('admin.roles.edit',compact('data'));
    }
    public function UPDATE(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'modules' => 'required',
            'modules.*' => 'required|min:1',
        ],[
            "name.required"=>trans('messages.rolename_required'),
            "modules.required"=>trans('messages.one_selection_required'),
            "modules.*.required"=>trans('messages.one_selection_required'),
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $banner = Roles::find($id);
            $banner->name = $request->name;
            $banner->modules = implode(',',$request->modules);
            $banner->save();
            return redirect('admin/roles')->with('success', trans('messages.success'));
        }
    }
    public function status(Request $request){
        $role=Roles::where('id', $request->id)->update(['is_available'=>$request->status]);
        if ($role) {
            return 1;
        } else {
            return 0;
        }
    }
}
