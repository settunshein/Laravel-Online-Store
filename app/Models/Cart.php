<?php

namespace App\Models;

use App\Models\Product;

class Cart
{
    /** 
     * To get cart list
     * @return array category list array
     */
    public function getCartList()
    {
        if( session()->has('cart') && count(session()->get('cart')) > 0 ){
            $cart = session()->get('cart');

            return $cart;
        }
    }
    
    /** 
     * To save cart data in session
     * @param object $request cart request object
     * @return array 
     */
    public function addToCart($request)
    {   
        $id      = $request->id;
        $product = Product::find($id);
        $cart    = session()->get('cart');

        if( isset($cart[$id]) ){
            return [ 'message' => 'error', 'cart' => $cart ];
        }

        $cart[$id] = $product->toArray();
        $cart[$id]['qty'] = $request['qty'] ? $request['qty'] : 1;
        session()->put('cart', $cart);

        return [ 'message' => 'success', 'cart' => $cart ];
    }

    /** 
     * To update cart qty
     * @param object $request cart request object
     * @param id $cart_id cart id
     * @return string $sub_total
     */
    public function updateCart($request, $cart_id)
    {
        $cart = session()->get('cart');
        $cart[$cart_id]['qty'] = $request['qty'];
        $tt_price  = $cart[$cart_id]['price'] * $request['qty'];
        $sub_total = number_format($tt_price);
        session()->put('cart', $cart);
        
        return $sub_total;
    }

    /** 
     * To delete cart item
     * @param id $id cart id
     * @return array $cart cart list array
     */
    public function removeCart($id)
    {
        $cart = session()->get('cart');
        unset( $cart[$id] );
        session()->put('cart', $cart);

        return $cart;
    }
    
    /** 
     * To delete cart
     * @return void
     */
    public function clearCart()
    {
        session()->forget('cart');
    }
}