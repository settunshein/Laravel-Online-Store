@extends('layouts.backend.master')

@section('order-active', 'sidebar-active')

@section('title', 'Order Details')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6>Order Management</h6>
</div>

<div class="row mb-5">
    <div class="table-responsive">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header">
                    <div class=" d-flex justify-content-between align-items-center">
                        <p class="mb-0 py-1">
                            Order Details
                        </p>
                        <a href="{{ route('admin.order.index') }}" class="btn btn-sm btn-outline-dark rounded-0">
                            <i class="fa fa-arrow-circle-left"></i>&nbsp;
                            B A C K
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-between align-items-center mb-4">
                        <div class="col-md-6 d-flex">
                            <span class="h6">
                                <i class="fab fa-laravel mr-2"></i>Laravel Online Store
                                <span class="d-block" style="font-size: 12px; font-weight: 400;">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                </span>
                            </span>
                        </div>
                        
                        <div class="mr-3" style="margin-left: 30px;">
                            @if($order->order_status == 1)
                            <a href="javascript:;" class="btn btn-sm btn-success rounded-0">
                                <i class="far fa-check-circle"></i>&nbsp;
                                Completed
                            </a>
                            @else
                            <a href="javascript:;" class="btn btn-sm btn-danger rounded-0" style="cursor: default;">
                                <i class="fas fa-spinner"></i>&nbsp;
                                In Progress
                            </a>
                            @endif
                        </div>
                    </div><!-- End of 1st row -->
    
                    <div class="row justify-content-between mb-4">
                        <div class="col-6">
                            From
                            <address class="mb-2">
                                <strong>Laravel Store</strong><br>
                                123 Wakanda City<br>
                                Phone: +959 123123123<br>
                                Email: info@example.com
                            </address>
                            <button class="btn btn-sm btn-warning rounded-0">
                                {{ $order->order_code }}
                            </button>
                        </div>
    
                        <div class="col-6 text-right">
                            <span>To</span>
                            <address class="mb-2">
                                <strong>{{ $order->user->name }}</strong><br>
                                {{ $order->user->address }}<br>
                                Phone: {{ $order->user->phone }}<br>
                                Email: {{ $order->user->email }}
                            </address>
                            <button class="btn btn-sm btn-warning rounded-0">
                                <i class="far fa-credit-card mr-2"></i>
                                {{ $order->payment ?? 'Payment' }} 
                            </button>
                        </div>
                    </div><!-- End of 2nd Row -->
    
                    <table class="table table-bordereless">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderItems as $item)
                            <tr class="text-center">
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    @if($item->product->image)
                                        <img src="{{ asset('storage/product/'.$item->product->image) }}" width="80">
                                    @else
                                        <img src="{{ asset('img/'.Str::slug($item->product->name).'.png') }}" width="80">
                                    @endif
                                </td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ number_format($item->price) }} MMK</td>
                                <td>{{ number_format($item->price * $item->qty) }} MMK</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="text-center text-danger">
                                <th colspan="4"></th>
                                <th>
                                    Grand Total
                                </th>
                                <th>{{ number_format($order->total_amt) }} MMK</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
    
                <div class="card-footer">
                    <a href="" class="btn btn-outline-dark rounded-0 float-right px-4">
                        <i class="fas fa-print"></i>&nbsp;
                        Print
                    </a>
                </div><!-- End of card-footer -->
            </div>

        </div>
    </div>
</div>
@endsection