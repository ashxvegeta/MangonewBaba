<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller
{
    //

    public function AdminDashboard(){
        return view('admin.home');
    }

    public function AdminviewOrders(){

        // Logic to fetch and display admin orders
        $orders = Order::where('status','0')->get(); // Fetch all non-completed orders
        return view('admin.admin_orders', compact('orders'));
    }

    public function AdminOrderDetails($id) {
        $order = Order::findOrFail($id);
        return view('admin.order_details', compact('order'));
    }
}
