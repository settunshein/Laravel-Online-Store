@extends('layouts.backend.master')

@section('user-active', 'sidebar-active')

@section('title', 'Customer List')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6>Customer Management</h6>
</div>

<div class="row">
    <div class="table-responsive mb-5">
        <div class="col-md-12">
            <div class="card rounded-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0 py-1 card-ttl">
                            Customer List Table
                        </p>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered customerListTable">
                        <thead>
                            <tr class="text-center">
                                <th class="no-search no-sort">#</th>
                                <th>Image</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Register Date</th>
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
<script src="{{ asset('backend/js/user.js') }}"></script>
@endsection