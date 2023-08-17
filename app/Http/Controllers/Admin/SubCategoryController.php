<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    public function Index(){
        $allsubcategories = Subcategory::latest()->get();
        return view ('admin.allsubcategory',compact('allsubcategories'));
    }
    public function AddSubCategory(){
        $categories = Category::latest()->get();
        return view ('admin.addsubcategory',compact('categories'));
    }
    public function StoreSubCategory(Request $request){
        $request->validate([
            'subcategory_name'=> 'required|unique:subcategories',
            'category_id'=>'required',
        ]);
        $category_id = $request->category_id;
        $category_name = Category::where('id',$category_id)->value('category_name');
        Subcategory::insert([
            'subcategory_name' => $request -> subcategory_name,
            'slug'=>strtolower(str_replace(' ', '-', $request->subcategory_name)),
            'category_id' => $category_id,
            'category_name' => $category_name,
        ]);
        Category::where('id',$category_id)->increment('subcategory_count',1);
        return redirect()-> route('allsubcategory')->with('message','Thêm thành công');
    }
    public function EditSubCategory($id){
        $subcategory_info=Subcategory::findOrFail($id);
        return view ('admin.editsubcategory',compact('subcategory_info'));
    }

    public function UpdateSubCategory(Request $request){
       $subcategory_id = $request->subcategory_id;
       $request->validate([
        'subcategory_name'=> 'required|unique:subcategories'
    ]);
       SubCategory::findOrFail($subcategory_id)->update([
        'subcategory_name' => $request -> subcategory_name,
        'slug'=>strtolower(str_replace(' ', '-', $request->subcategory_name))
    ]);
        return redirect()-> route('allsubcategory')->with('message','Sửa thành công');
    }
    public function DeleteSubCategory($id){
        $subcategory = Subcategory::findOrFail($id);
        $category_id = $subcategory->category_id;
        // Xoá tất cả các sản phẩm thuộc danh mục con
        $productsInSubcategory = Product::where('product_subcategory_id', $id)->get();
        foreach ($productsInSubcategory as $product) {
            $category_id = $product->product_category_id;
            $subcategory_id = $product->product_subcategory_id;

            $product->delete();
            Category::where('id', $category_id)->decrement('product_count', 1);
            Subcategory::where('id', $subcategory_id)->decrement('product_count', 1);
        }
        // Xoá danh mục con
        $subcategory->delete();
        // Giảm số lượng danh mục con trong danh mục cha tương ứng
        Category::where('id', $category_id)->decrement('subcategory_count', 1);
        return redirect()->route('allsubcategory')->with('message', 'Xoá thành công cùng với các sản phẩm liên quan');
    }

}
