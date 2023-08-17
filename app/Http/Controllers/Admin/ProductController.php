<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.allproduct', compact('products'));
    }

    public function addProduct()
    {
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        return view('admin.addproduct', compact('categories', 'subcategories'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required|unique:products',
            'price' => 'required',
            'quantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'product_img' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg,webp', 'max:2048'],
        ]);


        if ($request->hasFile('product_img')) {
            $image = $request->file('product_img');
            $currentDate = now()->toDateString(); // Lấy ngày hiện tại theo định dạng 'Y-m-d'
            $uploadPath = public_path('uploads/') . $currentDate;
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move($uploadPath, $image_name);
        }

        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;
        $category = Category::find($category_id);
        $subcategory = Subcategory::find($subcategory_id);

        // Insert thông tin sản phẩm vào cơ sở dữ liệu
        Product::create([
            'product_name' => $request->product_name,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'price' => $request->price,
            'product_category_name' => $category->category_name,
            'product_subcategory_name' => $subcategory->subcategory_name,
            'product_category_id' => $category_id,
            'product_subcategory_id' => $subcategory_id,
            'product_img' => $currentDate . '/' . $image_name, // Lưu đường dẫn tương đối
            'quantity' => $request->quantity,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
        ]);

        $category->increment('product_count');
        $subcategory->increment('product_count');

        return redirect()->route('allproduct')->with('message', 'Thêm thành công');
    }

    public function editProductImg($id)
    {
        $productinfo = Product::findOrFail($id);
        return view('admin.editproductimg', compact('productinfo'));
    }

    public function updateProductImg(Request $request)
    {
        $request->validate([
            'product_img' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
        ]);
        $id = $request->id;
        if ($request->hasFile('product_img')) {
            $image = $request->file('product_img');
            $currentDate = now()->toDateString(); // Lấy ngày hiện tại theo định dạng 'Y-m-d'
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('uploads/') . $currentDate;
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $image->move($uploadPath, $image_name);
        }

        Product::findOrFail($id)->update([
            'product_img' => $currentDate . '/' . $image_name,
        ]);
        return redirect()->route('allproduct')->with('message', 'Cập nhật ảnh thành công');
    }
    public function EditProduct($id){
        $productinfo=Product::findOrFail($id);
        return view ('admin.editproduct',compact('productinfo'));
    }

    public function UpdateProduct(Request $request){
       $productid = $request->id;
       $request->validate([
        'product_name' => 'required',
        'price' => 'required',
        'quantity' => 'required',
        'product_short_des' => 'required',
        'product_long_des' => 'required',
    ]);
       Product::findOrFail($productid)->update([
        'product_name' => $request->product_name,
        'product_short_des' => $request->product_short_des,
        'product_long_des' => $request->product_long_des,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
    ]);
        return redirect()-> route('allproduct')->with('message','Sửa thành công');
    }
    public function DeleteProduct($id){
        $category_id = Product::where('id', $id)->value('product_category_id');
        $subcategory_id = Product::where('id', $id)->value('product_subcategory_id');

        $product = Product::findOrFail($id);
        // Xoá ảnh liên quan trước khi xoá sản phẩm
        $imagePath = public_path('uploads/') . $product->product_img;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $product->delete();
        Category::where('id', $category_id)->decrement('product_count', 1);
        Subcategory::where('id', $subcategory_id)->decrement('product_count', 1);

        return redirect()->route('allproduct')->with('message', 'Xoá thành công');
    }

}
