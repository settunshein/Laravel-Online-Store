<?php

namespace App\Models;

use App\Traits\ButtonBuilder;
use Yajra\DataTables\DataTables;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, ButtonBuilder;

    protected $fillable = ['user_id', 'order_code', 'payment_slip', 'payment_status', 'order_status', 'total_amt'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getCreatedAtAttribute()
    {
        return date('M d, Y', strtotime($this->attributes['created_at']));
    }

    /** 
     * To get order list
     * @return object order list object
     */
    public function getOrderList()
    {
        return DataTables::of(Order::with('user'))

        ->addColumn('customer', function($order){
            return '
                <img src="'.$order->user->getImagePath().'" class="img-fluid rounded-circle" width="65">
                <p class="mt-3 mb-0 text-dark">'.$order->user->name.'</p>
            ';
        })

        ->addColumn('email', function($order){
            return $order->user ? $order->user->email : '';
        })

        ->addColumn('phone', function($order){
            return $order->user ? $order->user->phone : '';
        })

        ->addColumn('address', function($order){
            return $order->user ? $order->user->address : '';
        })
        
        ->addColumn('action', function($order){
            return $this->generateButton($order, 'order', ['show', 'delete']);
        })

        ->editColumn('order_status', function($order){
            $is_checked = $order->order_status == 1 ? 'checked' : '';
            return '
                <input class="status-toggle" type="checkbox" data-toggle="toggle" data-size="small" data-style="android" 
                data-id="'.$order->id.'" data-on="Completed" data-off="In Progress" data-onstyle="success" data-offstyle="danger" 
                '.$is_checked.'>
            ';
        })
        
        ->editColumn('total_amt', function($order){
            return number_format($order->total_amt) . ' <small>MMK</small>';
        })

        ->rawColumns(['customer', 'order_status', 'total_amt', 'action'])
        ->make(true);
    }

    /** 
     * To delete order data
     * @param object $order order object
     * @return
     */
    public function deleteOrder($order)
    {
        $order->delete();
    }

    /** 
     * To update order status
     * @param request $request request object
     * @return
     */
    public function updateOrderStatus($request)
    {
        $data  = $request->all();
        $order = Order::where('id', $data['id'])->first();
        $order->order_status = $data['status'];
        $order->save();
    }
}
