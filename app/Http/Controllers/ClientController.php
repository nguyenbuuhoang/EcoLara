<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Orderdetails;
use App\Models\Product;
use App\Models\ShippingInfo;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function shop()
    {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $products = Product::latest()->get();
        $categoryProducts = $products->groupBy('product_category_name');
        return view('user.shop', compact('categories', 'subcategories', 'categoryProducts'));
    }

    public function CategoryPage($id)
    {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $category = Category::findOrFail($id);
        $products = Product::where('product_category_id', $id)->latest()->get();
        $categoryProducts = $products->groupBy('product_subcategory_name');
        return view('user.category', compact('categories', 'subcategories', 'category', 'products', 'categoryProducts'));
    }
    public function SubCategoryPage($id)
    {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subcategory = Subcategory::findOrFail($id);
        $products = Product::where('product_subcategory_id', $id)->latest()->get();
        return view('user.subcategory', compact('categories', 'subcategories', 'subcategory', 'products'));
    }
    public function ProductDetails($id)
    {
        $product = Product::findOrFail($id);
        // Lấy product_subcategory_id từ sản phẩm đã tìm thấy
        $subcategory_id = $product->product_subcategory_id;
        // Lấy các sản phẩm liên quan dựa trên product_subcategory_id
        $related_products = Product::where('product_subcategory_id', $subcategory_id)->where('id', '!=', $id)->latest()->get();
        // Loại bỏ sản phẩm hiện tại khỏi danh sách liên quan
        return view('user.productdetails', compact('product', 'related_products'));

    }

    public function AddToCart()
    {
        $userid = Auth::id();
        $cart_items = Cart::where('user_id', $userid)->get();
        return view('user.addtocart', compact('cart_items'));
    }
    public function AddProductToCart(Request $request)
    {
        $product_price = $request->price;
        $quantity = $request->quantity;
        $price = $product_price * $quantity;
        Cart::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $request->quantity,
            'price' => $price,
        ]);

        return redirect()->route('addtocart')->with('message', 'Đã thêm đơn hàng ');
    }
    public function RemoveCartItem($id)
    {
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message', 'Đã xoá đơn hàng ');
    }
    public function ShippingAddress()
    {
        return view('user.shippingaddress');
    }
    public function AddShippingInfo(Request $request)
    {
        ShippingInfo::insert([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
            'phone_number' => $request->phone_number,
            'city_name' => $request->city_name,
        ]);
        return redirect()->route('checkout');
    }
    public function CheckOut()
    {
        $userid = Auth::id();
        $cart_items = Cart::where('user_id', $userid)->get();
        $shipping_address = ShippingInfo::where('user_id', $userid)->first();
        return view('user.checkout', compact('cart_items', 'shipping_address'));
    }
    public function CancelOrder($id)
    {   $userid = Auth::id();
        Cart::findOrFail($id)->delete();
        ShippingInfo::where('user_id', $userid)->delete();
        return redirect()->route('home')->with('message', 'Đã huỷ đặt hàng ');
    }
    public function PlaceOrder()
    {
        $userid = Auth::id();
        $user = Auth::user();
        $cart_items = Cart::where('user_id', $userid)->get();
        $shipping_address = ShippingInfo::where('user_id', $userid)->first();

        $orderTotal = 0; // Tổng giá của đơn hàng
        foreach ($cart_items as $item) {
            $orderTotal += $item->quantity * $item->price;
        }
        // Tạo đơn hàng và liên kết với order_details
        $order = Order::create([
            'user_id' => $userid,
            'user_name' => $user->name,
            'shipping_phonenumber' => $shipping_address->phone_number,
            'shipping_city' => $shipping_address->city_name,
            'total_price' => $orderTotal,
        ]);
        foreach ($cart_items as $item) {
            $product = Product::find($item->product_id);

            $order->orderDetails()->create([
                'product_name' => $product->product_name,
                'quantity' => $item->quantity,
                'product_img' => $product->product_img,
                'price' => $item->price,
                'total_price' => $item->quantity * $item->price,
            ]);

            $item->delete();
        }
        ShippingInfo::where('user_id', $userid)->delete(); // Xóa thông tin giao hàng

        return redirect()->route('pendingorders')->with('message', 'Bạn đã đặt hàng thành công');
    }
    public function UserProfile()
    {
        return view('user.userprofile');
    }
    public function PendingOrder()
    {
        $userid = Auth::id();

        $pending_orders = Order::where('user_id', $userid)
            ->where('status', 'pending') // Chỉ lấy các đơn hàng có trạng thái "pending"
            ->with('orderdetails')
            ->latest()
            ->get();

        return view('user.pendingorder', compact('pending_orders'));
    }

    public function History()
    {
        $userid = Auth::id();

        $history_orders = Order::where('user_id', $userid)
            ->where('status', 'success')
            ->with('orderdetails')
            ->latest()
            ->get();

        return view('user.history', compact('history_orders'));
    }
    public function OrderDetails($id)
    {
        $userid = Auth::id();
        $order = Order::where('user_id', $userid)->findOrFail($id);
        $orderDetails = $order->orderDetails;
        return view('user.orderdetail', compact('order', 'orderDetails'));
    }

}
