@extends('layouts.frontend.master')

@section('title', 'Checkout')

@section('css')
<style>
    .payment-method{
        margin-top: 20px;
        margin-bottom: 10px;
    }

    .payment-method label{
        font-weight: 400;
    }

    .payment-method span{
        padding-right: 30px;
    }

    input[type='radio']{
        vertical-align: middle;
        margin-top: -3px;
    }

    #cart_items .cart_info .table.table-condensed.total-result span {
        color: #FE980F;
        font-weight: 400;
        font-size: 16px;
    }

    input{
        background: #F0F0E9;
        border: 0 none;
        padding: 10px;
        width: 100%;
        font-weight: 300;
        outline: none;
    }

    textarea{
        outline: none;
        border: none;
        padding: 10px;
    }
</style>
@endsection

@section('content')
<form action="{{ url('checkout') }}" method="POST" enctype="multipart/form-data">
@csrf
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">Checkout</li>
                </ol>
            </div>

            <div class="alert alert-warning">
                <p>
                    <i class="fa fa-exclamation-circle"></i>&nbsp;
                    Please Use Register And Checkout to Easily Get Access to Your Order History.
                </p>
            </div>

            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="shopper-info">
                            <div class="review-payment">
                                <h2 style="margin-top: 0;">Shopper Information</h2>
                            </div>

                            <div class="custom-mb-10">
                                <input type="text" name="name"  placeholder="Username" value="{{ $user->name }}">
                                <span class="custom-fs-12 text-danger" style="color: #ED1C24">{{ $errors->first('name') }}</span>
                            </div>

                            <div class="custom-mb-10">
                                <input type="email" name="email" placeholder="Email Address" value="{{ $user->email }}">
                                <span class="custom-fs-12 text-danger" style="color: #ED1C24">{{ $errors->first('email') }}</span>
                            </div>
                            
                            <div class="custom-mb-10">
                                <input type="text" name="phone" placeholder="Phone" value="{{ $user->phone }}">
                                <span class="custom-fs-12 text-danger" style="color: #ED1C24">{{ $errors->first('phone') }}</span>
                            </div>

                            <div class="custom-mb-10">
                                <textarea name="address" id="" cols="30" rows="5" placeholder="Address">{{ $user->address }}</textarea> 
                                <span class="custom-fs-12 text-danger" style="color: #ED1C24">{{ $errors->first('address') }}</span>
                            </div>

                            <button type="submit" class="btn btn-primary">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="review-payment">
                <h2>Review Your Order</h2>
            </div>

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu text-center">
                            <td colspan="2">ITEM</td>
                            <td class="price">PRICE</td>
                            <td class="quantity">QUANTITY</td>
                            <td class="total">TOTAL</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total_price = 0 @endphp
                        @foreach($cart as $key => $item)
                        @php $total_price += $item['price'] * $item['qty'] @endphp
                        <tr class="cart-item-list">
                            <input type="hidden" class="product_id" value="{{ $item['id'] }}">

                            <td class="cart_product text-center">
                                @if($item['image'])
                                    <img src="{{ asset('storage/product/'.$item['image']) }}" width="75">
                                @else
                                    <img src="{{ asset('img/'.Str::slug($item['name']).'.png') }}" width="75">
                                @endif
                            </td>
                            <td class="cart_description text-center">
                                <h4>{{ $item['name'] }}</h4>
                            </td>
                            <td class="cart_price text-center">
                                <p style="margin-bottom: 0;">
                                    <span>{{ number_format($item['qty'] * $item['price']) }}</span>
                                    <small style="font-size: 14px;">MMK</small>
                                </p>
                            </td>
                            <td class="cart_quantity text-center">
                                <p style="font-size: 17px; font-weight: 400; margin-bottom: 0;">
                                    {{ $item['qty'] }}
                                </p>
                            </td>
                            <td class="cart_total text-center">
                                <p class="cart_total_price mb-0">
                                    <span class="sub-total" style="font-size: 18px;">
                                        {{ number_format($item['qty'] * $item['price']) }}
                                    </span>
                                    <small style="font-size: 14px;">MMK</small>
                                </p>
                            </td>
                        </tr>
                        @endforeach
                        <input type="hidden" name="total_amt" value="{{ $total_price }}">
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2" style="padding-right: 140px;" class="total-result-td">
                                <table class="table table-condensed total-result" style="font-size: 16px;">
                                    <tr class="text-right">
                                        <td>Cart Sub Total</td>
                                        <td>
                                            {{ number_format($total_price) }}
                                            <small>MMK</small>
                                        </td>
                                    </tr>
                                    <tr class="text-right shipping-cost">
                                        <td>Shipping Cost</td>
                                        <td>Free</td>										
                                    </tr>
                                    <tr class="text-right">
                                        <td style="color: #FE980F;">Grand Total</td>
                                        <td>
                                            <span>{{ number_format($total_price) }}</span> 
                                            <small style="color: #FE980F;">MMK</small>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </section>
</form>
@endsection