<?php

namespace App\Http\Services\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class SliderService
{
     public function insert($request)
     {
         try {
             #$request->except('_token');
             Slider::create($request->input());
             Session::flash('success','Thêm slider thành công');
         }catch (\Exception $err){
             Session::flash('error','Thêm slider lỗi');
             Log::info($err->getMessage());

             return false;
         }
         return true;
     }

     public function get()
     {
         return Slider::orderByDesc('id')->paginate(15);
     }

     public function update($request, $sliders)
     {
         try {
             $sliders->fill($request->input());
             $sliders->save();
             Session::flash('success', 'Cập nhật thành công');
         } catch (\Exception $err){
             Session::flash('error', 'Cập nhật lỗi');
             Log::info($err->getMessage());
             return false;
         }

         return true;
     }

     public function destroy($request)
     {
         $slider = Slider::where('id', $request->input('id'))->first();
         if($slider){
             $path = str_replace('storage','public',$slider->thumb);
             Storage::delete($path);
             $slider->delete();
             return true;
         }
         return false;
     }

     public function show()
     {
         return Slider::where('active',1)->orderByDesc('sort_by')->get();
     }
}
