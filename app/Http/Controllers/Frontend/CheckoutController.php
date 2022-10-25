<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CheckoutController extends Controller
{
    protected $checkoutModel;

    public function __construct()
    {
        $this->checkoutModel = new Checkout();
    }

    public function showCheckoutView(Request $request)
    {
        $data = $this->checkoutModel->getCheckoutData();

        return view('frontend.checkout')->with( ['user' => $data['user'], 'cart' => $data['cart']] );
    }

    public function submitCheckoutView(Request $request)
    {
        $result = $this->checkoutModel->saveCheckoutData($request);
        if( $result ){
            Toastr::success('Your Order Submitted Successfully!', 'SUCCESS');
            return redirect()->route('home');
        }else{
            Toastr::error('Something Wrong! Please Check Your Input Data Again!', 'ACCESS DENIED');
            //return redirect()->action('CheckoutController@showCheckoutView');
            return back();
        }
    }
}
