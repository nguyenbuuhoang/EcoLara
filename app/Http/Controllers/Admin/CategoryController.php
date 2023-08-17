<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function Index(){
        $categories = Category::latest()->get();
        return view ('admin.allcategory',compact('categories'));
    }
    public function AddCategory(){
        return view ('admin.addcategory');
    }
    public function StoreCategory(Request $request){
        $request->validate([
            'category_name'=> 'required|unique:categories',
            'category_img' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $categoryData = [
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '-', $request->category_name))
        ];

        if ($request->hasFile('category_img')) {
            $image = $request->file('category_img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/category_img'), $imageName);

            // Lưu đường dẫn tới ảnh
            $categoryData['category_img'] = 'category_img/' . $imageName;
        }

        Category::insert($categoryData);
        return redirect()->route('allcategory')->with('message', 'Thêm thành công');
    }


    public function EditCategory($id){
        $category_info=Category::findOrFail($id);
        return view ('admin.editcategory',compact('category_info'));
    }
    public function UpdateCategory(Request $request){
       $category_id = $request->category_id;
       $request->validate([
        'category_name'=> 'required|unique:categories'
    ]);
       $category_info=Category::findOrFail($category_id)->update([
        'category_name' => $request -> category_name,
        'slug'=>strtolower(str_replace(' ', '-', $request->category_name))
    ]);
        return redirect()-> route('allcategory')->with('message','Sửa thành công');
    }
    public function DeleteCategory($id){
        $category = Category::findOrFail($id);
        // Lấy danh sách tất cả các danh mục con của danh mục cha
        $subcategoriesInCategory = Subcategory::where('category_id', $id)->get();
        // Xoá tất cả các sản phẩm thuộc danh mục cha và các danh mục con của nó
        foreach ($subcategoriesInCategory as $subcategory) {
            // Xoá tất cả các sản phẩm thuộc danh mục con
            $productsInSubcategory = Product::where('product_subcategory_id', $subcategory->id)->get();
            foreach ($productsInSubcategory as $product) {
                $category_id = $product->product_category_id;
                $subcategory_id = $product->product_subcategory_id;
                $product->delete();
                Category::where('id', $category_id)->decrement('product_count', 1);
                Subcategory::where('id', $subcategory_id)->decrement('product_count', 1);
            }
            // Xoá danh mục con
            $subcategory->delete();
        }
        // Xoá danh mục cha
        $category->delete();
        return redirect()->route('allcategory')->with('message', 'Xoá thành công cùng với danh mục con và sản phẩm liên quan');
    }


}
