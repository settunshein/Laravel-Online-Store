@extends('layouts.backend.master')

@section('role-active', 'sidebar-active')

@section('title') {{ isset($role) ? 'Edit Role' : 'Create Role' }} @endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6>Role Management</h6>
</div>

<form action="{{ isset($role) ? route('admin.role.update', $role->id) : route('admin.role.store') }}" method="POST"
enctype="multipart/form-data">
@csrf
@isset($role) @method('PATCH') @endisset

<div class="row">
    <div class="col-md-12 mb-5">
        <div class="card rounded-0 mb-4">
            <div class="card-header">
                <div class=" d-flex justify-content-between align-items-center">
                    <p class="mb-0 py-1 card-ttl">
                        @isset($role)Edit Role Form @else Create Role Form @endisset
                    </p>
                    <a href="javascript:;" class="btn btn-sm btn-outline-dark rounded-0" onclick="history.back()">
                        <i class="fas fa-arrow-circle-left"></i>&nbsp;
                        B A C K
                    </a>
                </div>
            </div><!-- End of card-header -->

            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Role Name <b class="text-danger">*</b></label>
                        <input type="text" class="form-control form-control-sm rounded-0 @error('name') is-invalid @enderror" 
                        name="name" value="{{ isset($role) ? @old('name', $role->name) : @old('name') }}">
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>
                </div>
            </div><!-- End of card-body -->
        </div>

        <div class="card rounded-0">
            <div class="card-header">
                <div class=" d-flex justify-content-between align-items-center">
                    <p class="mb-0 py-1 card-ttl">
                        Permissions <b class="text-danger">*</b> 
                        <small class="text-danger ml-2">{{ $errors->first('permissions') }}</small>
                    </p>
                </div>
            </div><!-- End of card-header -->

            <div class="card-body">
                <div class="form-row">

                    @foreach($dataList as $data)
                    <div class="col-3 mb-4">
                        <p class="module-ttl custom-mb-12">
                            <span>
                                <i class="fas fa-sync custom-mr-5"></i>
                            </span>
                            {{ $data['module'] }}
                            <hr class="module-ttl-divider mt-0">
                        </p>
                        @foreach($data['permissions'] as $permission)
                        <div class="form-check mb-3 permissions-list-blk">
                            <input class="form-check-input" type="checkbox" 
                            value="{{ $permission['id'] }}" id="{{$permission['id']}}" name="permissions[]"
                            @isset($role) {{ $role->hasPermissionTo($permission['name']) ? 'checked' : '' }} @endisset>
                            <label class="form-check-label" for="{{$permission['id']}}">
                                {{ $permission['name'] }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    @endforeach

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-outline-dark float-right rounded-0">
                    <i class="fa fa-edit"></i>&nbsp;
                    @isset($role) Update @else Create @endisset
                </button>
            </div>
        </div>
    </div>
</div>

</form>
@endsection