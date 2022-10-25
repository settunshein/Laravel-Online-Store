@extends('layouts.backend.master')

@section('order-active', 'sidebar-active')

@section('title', 'Order List')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6>Order Management</h6>
</div>

<div class="row">
    <div class="table-responsive mb-5">
        <div class="col-md-12">
            <div class="card rounded-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0 py-1 card-ttl">
                            Order List Table
                        </p>
                        {{--
                        <a href="" class="btn btn-sm btn-outline-dark rounded-0">
                            Create&nbsp;
                            <i class="fa fa-plus"></i>
                        </a>
                        --}}
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered orderListTable">
                        <thead>
                            <tr class="text-center">
                                <th class="no-search no-sort">#</th>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Total Amount</th>
                                <th>Address</th>
                                <th width="30px">Order Status</th>
                                <th>Created Date</th>
                                <th class="no-search no-sort" width="12%">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('backend/js/order.js') }}"></script>
@endsection

