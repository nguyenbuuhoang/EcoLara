<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
 // Hiển thị danh sách sliders
 public function index()
 {
     $sliders = Slider::all();
     return view('admin.allslider', ['sliders' => $sliders]);
 }

 // Hiển thị form thêm mới slider
 public function addSlider()
 {
     return view('admin.addslider');
 }

 // Lưu slider mới vào cơ sở dữ liệu
 public function storeSlider(Request $request)
 {
     $data = $request->validate([
         'title' => 'required',
         'description' => 'nullable',
         'url' => 'nullable',
         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
         'status' => 'integer',
     ]);

     if ($request->hasFile('image')) {
         $image = $request->file('image');
         $imageName = time() . '.' . $image->getClientOriginalExtension();
         $image->move(public_path('uploads/slider_images'), $imageName);

         $data['image'] = 'slider_images/' . $imageName;
     }

     Slider::create($data);

     return redirect()->route('allslider')->with('message', 'Slider đã được tạo thành công.');
 }



 // Hiển thị form chỉnh sửa slider
 public function editSlider($id)
 {
     $slider = Slider::find($id);
     return view('admin.editslider', ['slider' => $slider]);
 }
 public function changeStatus($id)
 {
     $slider = Slider::findOrFail($id);
     $newStatus = $slider->status == 1 ? 0 : 1;
     $slider->status = $newStatus;
     $slider->save();
     return redirect()->route('allslider')->with('message', 'Trạng thái slider đã được cập nhật thành công.');
 }
 // Cập nhật thông tin slider trong cơ sở dữ liệu
 public function updateSlider(Request $request)
 {
     $data = $request->validate([
         'id' => 'required',
         'title' => 'required',
         'description' => 'nullable',
         'url' => 'nullable',
         'image' => 'nullable',
         'status' => 'integer',
     ]);

     $slider = Slider::find($data['id']);
     $slider->update($data);

     return redirect()->route('allslider')->with('message', 'Slider đã được cập nhật thành công.');
 }

 // Xóa slider khỏi cơ sở dữ liệu
 public function deleteSlider($id)
 {
     $slider = Slider::find($id);
     $slider->delete();

     return redirect()->route('allslider')->with('message', 'Slider đã được xóa thành công.');
 }
}
