@extends('layouts.backend.master')

@section('profile-active', 'sidebar-active')

@section('title', 'Profile')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6>Profile Management</h6>
</div>

<div class="row">
    <div class="table-responsive mb-5">
        <div class="col-md-12">
            <div class="card rounded-0">

                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0 py-1 card-ttl">
                            {{ ucwords(strtolower($authUser->name)) }}'s Profile
                        </p>
                        <a href="{{ route('admin.profile.index') }}" class="btn btn-sm btn-outline-dark rounded-0">
                            <i class="fas fa-arrow-circle-left"></i>&nbsp;
                            B A C K
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-row align-items-center">
                        <div class="col-3">
                            <div class="card border-0">
                                <div class="card-body text-center">
                                    <img src="{{ $authUser->getImagePath() }}" alt="{{ $authUser->name }}" class="rounded-circle"
                                    width="135px">
                                </div>
                            </div>
                        </div>
    
                        <div class="col-9 border-left">
                            <div class="card border-0">
                                <div class="card-body">
                                    <table class="table table-borderless personal-info-tbl">
                                        <tr>
                                            <td>
                                                <span class="text-center"><i class="far fa-user"></i></span>
                                                Username
                                            </td>
                                            <td>
                                                : <span>{{ $authUser->name }}</span>
                                            </td>
                                        </tr>
    
                                        <tr>
                                            <td>
                                                <span class="text-center"><i class="far fa-envelope"></i></span>
                                                Email Address
                                            </td>
                                            <td>
                                                : <span>{{ $authUser->email }}</span>
                                            </td>
                                        </tr>
    
                                        <tr>
                                            <td>
                                                <span class="text-center"><i class="fas fa-phone-alt"></i></span>
                                                Phone Number
                                            </td>
                                            <td>
                                                : <span>{{ $authUser->phone }}</span>
                                            </td>
                                        </tr>
    
                                        <tr>
                                            <td>
                                                <span class="text-center"><i class="far fa-map"></i></span>
                                                Address
                                            </td>
                                            <td>
                                                : <span>{{ $authUser->address }}</span>
                                            </td>
                                        </tr>
    
                                        <tr>
                                            <td>
                                                <span class="text-center"><i class="fas fa-history"></i></span>
                                                Joined Date
                                            </td>
                                            <td>
                                                : <span>{{ $authUser->created_at }}</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('admin.profile.edit') }}" class="btn btn-sm btn-outline-dark float-right rounded-0">
                        <i class="fa fa-edit"></i>&nbsp;
                        Edit Profile
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('backend/js/category.js') }}"></script>
@endsection