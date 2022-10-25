@extends('layouts.backend.master')

@section('category-active', 'sidebar-active')

@section('title', 'Customer List')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6>Category Management</h6>
</div>

<div class="row">
    <div class="table-responsive mb-5">
        <div class="col-md-12">
            <div class="card rounded-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0 py-1 card-ttl">
                            Category List Table
                        </p>
                        <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-outline-dark rounded-0">
                            Create&nbsp;
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered categoryListTable">
                        <thead>
                            <tr class="text-center">
                                <th class="no-search no-sort">#</th>
                                <th>Category Name</th>
                                <th>Created at</th>
                                <th class="no-search no-sort">Action</th>
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
<script src="{{ asset('backend/js/category.js') }}"></script>
@endsection