<?php

namespace App\Models;

use App\Models\Product;
use App\Models\OrderItem;
use App\Traits\GenerateOrderCode;
use Illuminate\Support\Facades\DB;

class Checkout
{
    use GenerateOrderCode;

    /** 
     * To get cart list
     * @return array auth user data and cart list array
     */
    public function getCheckoutData()
    {
        $user = auth()->user();
        $cart = session()->get('cart');

        return [ 'user' => $user, 'cart' => $cart ];
    }

    /**
     * To save checkout data
     * @param request $request
     * @return bol checkout data is save or not
     */
    public function  saveCheckoutData($request)
    {
        $data = $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|email',
            'phone'     => 'required',
            'address'   => 'required',
            'total_amt' => 'required',
        ]);

        if( !$data ){
            return false;
        }

        DB::beginTransaction();
        try{
            // Update User Info
            $user = User::find(auth()->id());
            $user->name    = $data['name'];
            $user->email   = $data['email'];
            $user->phone   = $data['phone'];
            $user->address = $data['address'];
            $user->save();

            // Store Order
            $order = new Order();
            $order->order_code = GenerateOrderCode::generateRandomCode();
            $order->user_id    = auth()->id();
            $order->total_amt  = $data['total_amt'];
            $order->save();

            // Store Order Items
            $cart = session()->get('cart');
            foreach($cart as $item){
                $product = Product::where('id', $item['id'])->select('id', 'price')->first();
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $product->id,
                    'price'      => $product->price,
                    'qty'        => $item['qty']
                ]);
            }
            
            DB::commit();
            session()->forget('cart');

            return true;

        }catch(\Exception $e){
            DB::rollback();

            return false;
        }
    }
}