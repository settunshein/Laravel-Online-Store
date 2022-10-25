@extends('layouts.backend.master')

@section('product-active', 'sidebar-active')

@section('title', 'Product List')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6>Product Management</h6>
</div>

<div class="row">
    <div class="table-responsive mb-5">
        <div class="col-md-12">
            <div class="card rounded-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0 py-1 card-ttl">
                            Product List Table
                        </p>
                        <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-outline-dark rounded-0">
                            Create&nbsp;
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered productListTable">
                        <thead>
                            <tr class="text-center">
                                <th class="no-search no-sort">#</th>
                                <th class="no-search no-sort">Image</th>
                                <th>Product Name</th>
                                <th>Unit Price</th>
                                <th>Stock</th>
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
<script src="{{ asset('backend/js/product.js') }}"></script>
@endsection


