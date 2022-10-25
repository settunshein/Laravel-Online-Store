<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CartController extends Controller
{
    /**
     * cart model
     */
    protected $cartModel;

    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct()
    {
        $this->cartModel = new Cart();
    }

    /**
     * To get cart list
     * @return array cart list array
     */
    public function index()
    {
        $cart = $this->cartModel->getCartList();

        if( $cart ){
            return view('frontend.cart', compact('cart'));
        }

        Toastr::error('Your Cart is Empty &nbsp;<i class="fa fa-exclamation-circle"></i>', 'WARNING');

        return back();
    }

    /**
     * To save cart
     * @param object $request cart request object
     * @return response json message and cart list object
     */
    public function store(Request $request)
    {
        $result = $this->cartModel->addToCart($request);

        return response()->json(  ['message' => $result['message'], 'cart' => $result['cart']] );
    }

    /**
     * To update cart
     * @param object $request cart request object
     * @return response json 
     */
    public function update(Request $request, $cart_id)
    {
        $sub_total = $this->cartModel->updateCart($request, $cart_id);

        return response()->json( ['sub_total' => $sub_total] );
    }

    /**
     * To delete cart item or whole cart
     * @param id $id cart id
     * @return
     */
    public function delete($id = null)
    {
        if( isset($id) ){

            $cart = $this->cartModel->removeCart($id);
            Toastr::success('Your Item Removed From Cart Successfully &nbsp;<i class="far fa-check-circle"></i>', 'SUCCESS');
            if( !empty($cart) ){
                return back();
            }

            return redirect()->route('home');

        }else{
            
            $this->cartModel->clearCart();
            Toastr::success('Your Cart Cleared Successfully &nbsp;<i class="far fa-check-circle"></i>', 'SUCCESS');

            return redirect()->route('home');

        }
    }
}
