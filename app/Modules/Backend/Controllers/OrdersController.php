<?php

namespace Backend\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdersModel;

class OrdersController extends BaseController
{
    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = new OrdersModel();
    }

    public function index()
    {
        $data['orders'] = $this->orderModel->findAll();
        return view('Backend\Views\orders\index', $data);
    }

    public function view($id)
    {
        $data['order'] = $this->orderModel->find($id);
        return view('Backend\Views\orders\view', $data);
    }

    public function delete($id)
    {
        $this->orderModel->delete($id);
        return redirect()->to('admin/orders');
    }
}
