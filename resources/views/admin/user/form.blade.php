@extends('layouts.backend.master')

@section('user-active', 'sidebar-active')

@section('title') {{ isset($user) ? 'Edit Customer' : 'Create Customer' }} @endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6>Customer Management</h6>
</div>

<form action="{{ isset($user) ? route('admin.user.update', $user->id) : route('admin.user.store') }}" method="POST"
enctype="multipart/form-data">
@csrf
@isset($user) @method('PATCH') @endisset

<div class="row">
    <div class="col-md-12 mb-5">
        <div class="card rounded-0">
            <div class="card-header">
                <div class=" d-flex justify-content-between align-items-center">
                    <p class="mb-0 py-1 card-ttl">
                        @isset($user)Edit Customer Form @else Create Customer Form @endisset
                    </p>
                    <a href="javascript:;" class="btn btn-sm btn-outline-dark rounded-0" onclick="history.back()">
                        <i class="fas fa-arrow-circle-left"></i>&nbsp;
                        B A C K
                    </a>
                </div>
            </div><!-- End of card-header -->

            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Username</label>
                        <input type="text" class="form-control form-control-sm rounded-0 @error('name') is-invalid @enderror" 
                        name="name" value="{{ isset($user) ? @old('name', $user->name) : @old('name') }}">
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Email Address</label>
                        <input type="text" class="form-control form-control-sm rounded-0 @error('logo') is-invalid @enderror" 
                        name="email" value="{{ isset($user) ? @old('name', $user->name) : @old('logo') }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Phone</label>
                        <input type="text" class="form-control form-control-sm rounded-0 @error('logo') is-invalid @enderror" 
                        name="phone" value="{{ isset($user) ? @old('name', $user->name) : @old('logo') }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Password</label>
                        <input type="text" class="form-control form-control-sm rounded-0 @error('logo') is-invalid @enderror" 
                        name="password" value="{{ isset($user) ? @old('name', $user->name) : @old('logo') }}">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Address</label>
                        <textarea name="address" rows="5" class="form-control form-control-sm rounded-0">{{ isset($user) ? old('address', $user->address) : old('address') }}</textarea>
                        <small class="text-danger">{{ $errors->first('address') }}</small>
                    </div>
                </div>
            </div><!-- End of card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-outline-dark float-right rounded-0">
                    <i class="fa fa-edit"></i>&nbsp;
                    @isset($category) Update @else Create @endisset
                </button>
            </div>

        </div>
    </div>
</div>

</form>
@endsection