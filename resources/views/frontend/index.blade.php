@extends('layouts.frontend.master')

@section('home-active', 'active')

@section('content')
@php $slider = 'slider' @endphp

<section>
    <div class="container">
        <div class="row">
            @include('layouts.frontend.partials.category-list')
            @include('layouts.frontend.partials.product-list')
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('.add-to-cart').click(function(e){
            e.preventDefault();
            let id = $(this).data('id');

            $.ajax({
                type: 'POST',
                url : '/cart',
                data: { id : id },

                success: function(response){
                    let cart_count = Object.keys(response.cart).length;

                    if( response.message == 'success' ){
                        toastr.success('Item Added to Your Cart Successfully &nbsp;<i class="far fa-check-circle"></i>', 'SUCCESS', {
                            closeButton: true,
                            progressBar: true,
                        });
                    }else{
                        toastr.error('Item Already Exists in Your Cart &nbsp;<i class="far fa-times-circle"></i>', 'WARNING', {
                            closeButton: true,
                            progressBar: true,
                        });
                    }

                    $('.cart-count').html(cart_count);
                }
            })
        })
    });
</script>
@endsection