<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;

class SliderController extends Controller
{
    protected $slider;

    public function __construct(SliderService $slider)
    {
        $this->slider = $slider;
    }

    public function create()
    {
        return view('admin.slider.add',[
           'title' => 'Thêm slider mới'

        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'thumb'=>'required',
            'url'=>'required'
        ]);
        $this->slider->insert($request);
        return redirect()->back();
    }

    public function index()
    {
        return view('admin.slider.list', [
           'title'=> 'Danh sách slider',
            'sliders'=> $this->slider->get()
        ]);
    }

    public function show(Slider $sliders)
    {
        return view('admin.slider.edit', [
            'title'=> 'Chỉnh sửa slider: '. $sliders->name,
            'slider'=> $sliders
        ]);
    }

    public function update(Request $request, Slider $sliders)
    {
        $this->validate($request,[
            'name'=>'required',
            'thumb'=>'required',
            'url'=>'required'
        ]);
        $result = $this->slider->update($request, $sliders);
        if ($result){
            return redirect('/admin/sliders/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->slider->destroy($request);
        if($result){
            return response()->json([
               'error'=>false,
                'message'=>'Xóa thành công'
            ]);
        }
        return response()->json(['error'=>true]);
    }
}
