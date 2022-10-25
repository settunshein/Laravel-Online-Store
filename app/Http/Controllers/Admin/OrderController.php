<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * order model
     */
    protected $orderModel;

    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct()
    {
        $this->orderModel = new Order();
    }

    /**
     * To get order list
     * @return object order list object
     */
    public function getOrderList()
    {
        return $this->orderModel->getOrderList();
    }

    /**
     * To show order list view
     * @return view order list view
     */
    public function index()
    {
        return view('admin.order.index');
    }

    /**
     * To show order details info view
     * @return view order details info view
     */
    public function show(Order $order)
    {
        return view('admin.order.show', compact('order'));
    }

    /**
     * To delete order
     * @param object $order order object
     * @return
     */
    public function destroy(Order $order)
    {
        $this->orderModel->deleteOrder($order);
    }

    /** 
     * To update order status
     * @param request $request request object
     * @return response json with message
     */
    public function updateOrderStatus(Request $request)
    {
        $this->orderModel->updateOrderStatus($request);

        return response()->json(['message' => 'success']);
    }   
}
