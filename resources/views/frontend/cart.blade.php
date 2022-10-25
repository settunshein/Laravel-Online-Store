@extends('layouts.frontend.master')

@section('cart-active', 'active')

@section('css')
<style>
    #toast-container > div { 
        width: 365px !important; 
    }
</style>
@endsection

@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{ url('/') }}">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu text-center">
                        <td colspan="2">ITEM</td>
                        <td class="price">PRICE</td>
                        <td class="quantity">QUANTITY</td>
                        <td class="total">TOTAL</td>
                        <td>
                            <a class="clear-cart" href="{{ route('cart.delete') }}" style="color: #fff; text-decoration: underline;">
                                <i class="far fa-trash-alt"></i>&nbsp;
                                CLEAR CART
                            </a>
                        </td>
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
                                    <img src="{{ asset('storage/product/'.$item['image']) }}" width="65">
                                @else
                                    <img src="{{ asset('img/'.Str::slug($item['name']).'.png') }}" width="65">
                                @endif
                            </td>
                            <td class="cart_description text-center">
                                <h4 style="margin-top: 0; font-size: 16px;">{{ $item['name'] }}</h4>
                            </td>
                            <td class="cart_price text-center">
                                <p style="margin-bottom: 0;">
                                    <span>{{ number_format($item['price']) }}</span>
                                    <small style="font-size: 13.5px;">MMK</small>
                                </p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button" style="display: flex; justify-content: center;">
                                    <a class="cart_quantity_down update-cart" href="javascript:;"> &minus; </a>
                                    <input class="cart_quantity_input qty" type="text" name="quantity" value="{{ $item['qty'] }}"
                                    autocomplete="off" size="2" readonly>
                                    <a class="cart_quantity_up update-cart" href="javascript:;"> &plus; </a>
                                </div>
                            </td>
                            <td class="cart_total text-center">
                                <p class="cart_total_price" style="margin-bottom: 0;">
                                    <span class="sub-total" style="font-size: 18px;">{{ number_format($item['qty'] * $item['price']) }}</span>
                                    <small style="font-size: 14px;">MMK</small>
                                </p>
                            </td>
                            <td class="cart_delete text-center">
                                <a class="cart_quantity_delete" href="{{ route('cart.delete', $item['id']) }}">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What Would You Like to Do Next?</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum, animi cum quidem laudantium reiciendis dolorem sunt deleniti vitae cumque et eligendi culpa distinctio quod libero repellendus veritatis ad similique consequatur?
            </p>
        </div>
        <div class="row">
            <div class="col-sm-12 total-area-bx">
                <div class="total_area">
                    <ul>
                        <li>
                            Shipping Cost 
                            <span>Free</span>
                        </li>
                        <li>
                            Grand Total 
                            <span class="grand-total">
                                {{ number_format($total_price) }}
                                <small>MMK</small>
                            </span>
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="{{ url('/') }}">Continue Shopping</a>
                    @guest
                        <a href="javascript:;" class="btn btn-default check_out" style="margin-left: 8px;"
                        onclick="toastr.info('You Need to  Login First to Proceed Checkout &nbsp;<i class=\'fa fa-unlock-alt\'></i>', 'INFO', {
                            closeButton: true, 
                            progressBar: true,
                        })">
                            Checkout
                        </a>
                    @else
                        <a class="btn btn-default check_out" href="{{ url('/checkout') }}" style="margin-left: 8px;">
                            Checkout
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('.cart_quantity_down').click(function(e){
            e.preventDefault();
            let qty   = $(this).parent('.cart_quantity_button').find('.qty').val();
            let value = parseInt(qty, 10);
            value     = isNaN(value) ? 0 : value;

            if (value > 1) {
                value--;
                $(this).parent('.cart_quantity_button').find('.qty').val(value);
            }
        });

        $('.cart_quantity_up').click(function(e){
            e.preventDefault();
            let qty   = $(this).parent('.cart_quantity_button').find('.qty').val();
            let value = parseInt(qty, 10);
            value     = isNaN(value) ? 0 : value;

            if (value < 50) {
                value++;
                $(this).parent('.cart_quantity_button').find('.qty').val(value);
            }else{
                toastr.error('The Maximum Value of Order Quantity is 50 Units &nbsp;<i class="far fa-times-circle"></i>', 'WARNING', {
                    closeButton: true,
                    progressBar: true,
                    preventDuplicates: true,
                });
            }
        });

        $('.update-cart').click(function(e){
            let thisClick = $(this);

            let id  = $(this).closest('.cart-item-list').find('.product_id').val();
            let qty = $(this).closest('.cart-item-list').find('.qty').val();

            $.ajax({
                type: 'PATCH',
                url : `/cart/${id}`,
                data: { qty: qty },

                success: function(response){
                    thisClick.closest('.cart-item-list').find('.sub-total').text(response.sub_total);
                    $('.total-area-bx').load(location.href + ' .total_area');
                }
            });
        });
    })
</script>
@endsection