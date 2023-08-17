<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Index(){
        $orders = Order::latest()->get();
        return view ('admin.allorder',compact('orders'));
    }
    public function PendingOrder(){
        $pending_orders=Order::where('status','pending')->latest()->get();
        return view ('admin.pendingorder',compact('pending_orders'));
    }
    public function approveOrder($id) {
        $order = Order::findOrFail($id);
        $order->status = 'success';
        $order->save();
        return redirect('admin/dashboard');
    }
    public function OrderDetails($id) {
        $order = Order::findOrFail($id);
        $orderDetails = $order->orderDetails;
        return view('admin.orderdetail', compact('order', 'orderDetails'));
    }

}
