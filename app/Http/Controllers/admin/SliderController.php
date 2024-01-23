<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
class SliderController extends Controller
{
    public function index(){
        $getslider = Slider::orderByDesc('id')->get();
        return view('admin.slider.slider',compact('getslider'));
    }
    public function list(){
        $getslider = Slider::orderByDesc('id')->get();
        return view('admin.slider.slidertable',compact('getslider'));
    }
    public function add(){
        $getitem = Item::where('item_status','1')->where('is_deleted','2')->orderByDesc('id')->get();
        $getcategory = Category::where('is_available','1')->where('is_deleted','2')->orderByDesc('id')->get();
        return view('admin.slider.add',compact('getitem','getcategory'));
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ],[
            "title.required"=>trans('messages.title_required'),
            "image.required"=>trans('messages.image_required'),
            "image.image"=>trans('messages.enter_image_file'),
            "image.mimes"=>trans('messages.valid_image'),
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $image = 'slider-' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('storage/app/public/admin-assets/images/slider', $image);
            $slider = new Slider;
            $slider->image = $image;
            $slider->title = $request->title;
            $slider->description = $request->description;
            $slider->item_id = $request->item_id;
            $slider->cat_id = $request->cat_id;
            $slider->type = $request->type;
            $slider->save();
            return redirect('admin/slider')->with('success',trans('messages.success'));
        }
    }
    public function show(Request $request){
        $getslider = Slider::find($request->id);
        $getitem = Item::where('item_status','1')->where('is_deleted','2')->orderByDesc('id')->get();
        $getcategory = Category::where('is_available','1')->where('is_deleted','2')->orderByDesc('id')->get();
        return view('admin.slider.edit',compact('getslider','getitem','getcategory'));
    }
    public function update(Request $request){

        $validator = Validator::make($request->all(),[
            'title' => 'required',
        ],[
            "title.required"=>trans('messages.title_required'),
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $slider = Slider::find($request->id);
            if($request->file('image') != ""){
                $validator = Validator::make($request->all(),
                ['image' => 'image|mimes:jpeg,png,jpg',],
                ["image.image"=>trans('messages.enter_image_file'),
                "image.mimes"=>trans('messages.valid_image'),]);
                if ($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }else{
                    if(file_exists('storage/app/public/admin-assets/images/slider/'.$slider->image)){
                        unlink('storage/app/public/admin-assets/images/slider/'.$slider->image);
                    }
                    $image = 'slider-' . uniqid() . '.' . $request->image->getClientOriginalExtension();
                    $request->image->move('storage/app/public/admin-assets/images/slider', $image);
                    $slider->image = $image;
                    $slider->save();
                }
            }
            $slider->title = $request->title;
            $slider->description = $request->description;
            if ($request->type == "1") {
                $slider->type = $request->type;
                $slider->item_id = 0;
                $slider->cat_id = $request->cat_id;
            } else if ($request->type == "2") {
                $slider->type = $request->type;
                $slider->cat_id = 0;
                $slider->item_id = $request->item_id;
            }else{
                $slider->cat_id = 0;
                $slider->item_id = 0;
                $slider->type = null;
            }
            $slider->save();
            return redirect('admin/slider')->with('success',trans('messages.success'));
        }
    }
    public function destroy(Request $request)
    {
        $getslider = Slider::where('id',$request->id)->first();
        $slider=Slider::where('id', $request->id)->delete();
        if ($slider) {
            if(file_exists('storage/app/public/admin-assets/images/slider/'.$getslider->image)){
                unlink('storage/app/public/admin-assets/images/slider/'.$getslider->image);
            }
            return 1;
        } else {
            return 0;
        }
    }
}
