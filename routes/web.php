<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubCategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
//ClientController
Route::get('/shop',[ClientController::class, 'Shop'])->name('shop');
Route::get('/category/{id}/{slug}', [ClientController::class, 'CategoryPage'])->name('category');
Route::get('/subcategory/{id}/{slug}', [ClientController::class, 'SubCategoryPage'])->name('subcategory');
Route::get('/productdetails/{id}/{slug}', [ClientController::class, 'ProductDetails'])->name('productdetails');
//Carts
Route::get('/addtocart', [ClientController::class, 'AddToCart'])->name('addtocart');
Route::post('/addproducttocart/{id}', [ClientController::class, 'AddProductToCart'])->name('addproducttocart');
Route::get('/removecartitem/{id}', [ClientController::class, 'RemoveCartItem'])->name('removecartitem');
#shipping info
Route::get('/shippingaddress', [ClientController::class, 'ShippingAddress'])->name('shippingaddress');
Route::post('/addshippinginfo', [ClientController::class, 'AddShippinginfo'])->name('addshippinginfo');
Route::get('/checkout', [ClientController::class, 'CheckOut'])->name('checkout');
Route::get('/cancelorder/{id}', [ClientController::class, 'CancelOrder'])->name('cancelorder');
Route::post('/placeorder', [ClientController::class, 'PlaceOrder'])->name('placeorder');
//profile
Route::get('/userprofile', [ClientController::class, 'UserProfile'])->name('userprofile');
Route::get('/userprofile/pendingorders', [ClientController::class, 'PendingOrder'])->name('pendingorders');
Route::get('/userprofile/history', [ClientController::class, 'History'])->name('history');
Route::get('/orderdetails/{id}', [ClientController::class, 'OrderDetails'])->name('ordertails');
Route::prefix('admin')->middleware('auth','role:admin')->group(function () {
    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'Index'])->name('dashboard');
    //Category
    Route::get('/allcategory', [CategoryController::class, 'Index'])->name('allcategory');
    Route::get('/addcategory', [CategoryController::class, 'AddCategory'])->name('addcategory');
    Route::post('/storecategory',[CategoryController::class, 'StoreCategory'])->name('storecategory');
    Route::get('/editcategory/{id}',[CategoryController::class, 'EditCategory'])->name('editcategory');
    Route::post('/updatecategory',[CategoryController::class, 'UpdateCategory'])->name('updatecategory');
    Route::get('/deletecategory/{id}',[CategoryController::class, 'DeleteCategory'])->name('deletecategory');
    //Sub-Category
    Route::get('/allsubcategory', [SubCategoryController::class, 'Index'])->name('allsubcategory');
    Route::get('/addsubcategory', [SubCategoryController::class, 'AddSubCategory'])->name('addsubcategory');
    Route::post('/storesubcategory',[SubCategoryController::class, 'StoreSubCategory'])->name('storesubcategory');
    Route::get('/editsubcategory/{id}',[SubCategoryController::class, 'EditSubCategory'])->name('editsubcategory');
    Route::post('/updatesubcategory',[SubCategoryController::class, 'UpdateSubCategory'])->name('updatesubcategory');
    Route::get('/deletesubcategory/{id}',[SubCategoryController::class, 'DeleteSubCategory'])->name('deletesubcategory');
    //Product
    Route::get('/allproduct', [ProductController::class, 'Index'])->name('allproduct');
    Route::get('/addproduct', [ProductController::class, 'AddProduct'])->name('addproduct');
    Route::post('/storeproduct',[ProductController::class, 'StoreProduct'])->name('storeproduct');
    Route::get('/editproductimg/{id}',[ProductController::class, 'EditProductImg'])->name('editproductimg');
    Route::post('/updateproductimg',[ProductController::class, 'UpdateProductImg'])->name('updateproductimg');
    Route::get('/editproduct/{id}',[ProductController::class, 'EditProduct'])->name('editproduct');
    Route::post('/updateproduct',[ProductController::class, 'UpdateProduct'])->name('updateproduct');
    Route::get('/deleteproduct/{id}',[ProductController::class, 'DeleteProduct'])->name('deleteproduct');
    //Slider
    Route::get('/allslider', [SliderController::class, 'Index'])->name('allslider');
    Route::get('/addslider', [SliderController::class, 'AddSlider'])->name('addslider');
    Route::post('/storeslider',[SliderController::class, 'StoreSlider'])->name('storeslider');;
    Route::get('/editslider/{id}',[SliderController::class, 'EditSlider'])->name('editslider');
    Route::get('/changestatus/{id}', [SliderController::class, 'changeStatus'])->name('changestatus');
    Route::post('/updateslider',[SliderController::class, 'UpdateSlider'])->name('updateslider');
    Route::get('/deleteslider/{id}',[SliderController::class, 'DeleteSlider'])->name('deleteslider');
    //Order
    Route::get('/allorder', [OrderController::class, 'Index'])->name('allorder');
    Route::get('/pendingorder', [OrderController::class, 'PendingOrder'])->name('pendingorder');
    Route::get('approveorder/{id}',[OrderController::class,'ApproveOrder'])->name('approveorder');
    Route::get('orderdetails/{id}', [OrderController::class, 'OrderDetails'])->name('orderdetails');
});
