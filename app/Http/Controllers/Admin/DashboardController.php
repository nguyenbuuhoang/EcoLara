<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index(){
        $orders = Order::latest()->paginate(5);
        $todayRevenue = Order::whereDate('created_at', today())->where('status', 'success')->sum('total_price');
        $totalRevenue = Order::where('status', 'success')->sum('total_price');
        $pendingOrdersCount = Order::where('status', 'pending')->count();
        $totalOrdersCount = Order::count();
        return view('admin.dashboard', compact('orders','todayRevenue', 'totalRevenue', 'pendingOrdersCount', 'totalOrdersCount'));
    }
}


