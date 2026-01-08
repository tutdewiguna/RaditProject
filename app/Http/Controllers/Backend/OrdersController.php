<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = new Order();
    }

    public function index()
    {
        $data['orders'] = Order::all();
        return view('Backend.Views.orders.index', $data);
    }

    public function view($id)
    {
        $data['order'] = Order::findOrFail($id);
        return view('Backend.Views.orders.view', $data);
    }

    public function delete($id)
    {
        Order::destroy($id);
        return redirect()->route('admin.orders.index');
    }
}

