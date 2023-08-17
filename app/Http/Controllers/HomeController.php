<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $allproducts = Product::latest()->paginate(4);
        $sliders = Slider::where('status', 1)->latest()->get();
        return view('user.home', compact('allproducts', 'categories', 'subcategories', 'sliders'));
    }

}
