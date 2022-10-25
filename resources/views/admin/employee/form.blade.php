@extends('layouts.backend.master')

@section('employee-active', 'sidebar-active')

@section('title') {{ isset($employee) ? 'Edit Employee' : 'Create Employee' }} @endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6>Employee Management</h6>
</div>

<form action="{{ isset($employee) ? route('admin.employee.update', $employee->id) : route('admin.employee.store') }}" 
method="POST" enctype="multipart/form-data">
@csrf
@isset($employee) @method('PATCH') @endisset

<div class="row">
    <div class="col-md-8 mb-5">
        <div class="card rounded-0">
            <div class="card-header">
                <div class=" d-flex justify-content-between align-items-center">
                    <p class="mb-0 py-1 card-ttl">
                        @isset($employee)Edit Employee Form @else Create Employee Form @endisset
                    </p>
                </div>
            </div><!-- End of card-header -->

            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Employee Name <b class="text-danger">*</b></label>
                        <input type="text" class="form-control form-control-sm rounded-0 @error('name') is-invalid @enderror" 
                        name="name" value="{{ isset($employee) ? @old('name', $employee->name) : @old('name') }}">
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Employee Email <b class="text-danger">*</b></label>
                        <input type="email" class="form-control form-control-sm rounded-0 @error('email') is-invalid @enderror" 
                        name="email" value="{{ isset($employee) ? @old('email', $employee->email) : @old('email') }}">
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Employee Phone <b class="text-danger">*</b></label>
                        <input type="text" class="form-control form-control-sm rounded-0 @error('phone') is-invalid @enderror" 
                        name="phone" value="{{ isset($employee) ? @old('phone', $employee->phone) : @old('phone') }}">
                        <small class="text-danger">{{ $errors->first('phone') }}</small>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Employee NRC <b class="text-danger">*</b></label>
                        <input type="text" class="form-control form-control-sm rounded-0 @error('nrc') is-invalid @enderror" 
                        name="nrc" value="{{ isset($employee) ? @old('nrc', $employee->nrc) : @old('nrc') }}">
                        <small class="text-danger">{{ $errors->first('nrc') }}</small>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Employee Role <b class="text-danger">*</b></label>
                        <select name="role" class="form-control form-control-sm rounded-0 @error('role') is-invalid @enderror">
                            <option disabled selected>Select Role</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}"
                            @isset($employee) {{ $employee->hasRole($role->name)  ? 'selected' : '' }} @endisset>
                                {{ ucwords($role->name) }}
                            </option>
                            @endforeach
                        </select>
                        <small class="text-danger">{{ $errors->first('nrc') }}</small>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Gender <b class="text-danger">*</b></label>
                        <select name="gender" class="form-control form-control-sm rounded-0 @error('gender') is-invalid @enderror">
                            @php $genderList = ['male', 'female']; @endphp
                            <option disabled selected>Select Gender</option>
                            @foreach($genderList as $gender)
                            <option value="{{ $gender }}" 
                            @isset($employee)
                            {{ $gender == $employee->gender ? 'selected' : '' }}
                            @endisset>
                                {{ ucwords($gender) }}
                            </option>
                            @endforeach
                        </select>
                        <small class="text-danger">{{ $errors->first('gender') }}</small>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>Date of Birth <b class="text-danger">*</b></label>
                        <input type="date" class="form-control form-control-sm rounded-0 @error('dob') is-invalid @enderror" 
                        name="dob" value="{{ isset($employee) ? @old('dob', $employee->dob) : @old('dob') }}">
                        <small class="text-danger">{{ $errors->first('dob') }}</small>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Date of Joined <b class="text-danger">*</b></label>
                        <input type="date" class="form-control form-control-sm rounded-0 @error('doj') is-invalid @enderror" 
                        name="doj" value="{{ isset($employee) ? @old('doj', $employee->doj) : @old('doj') }}">
                        <small class="text-danger">{{ $errors->first('doj') }}</small>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <label>Password <b class="text-danger">*</b></label>
                        <input type="password" class="form-control form-control-sm rounded-0 @error('password') is-invalid @enderror" 
                        name="password" placeholder="* * * * * * * *">
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Address <b class="text-danger">*</b></label>
                        <textarea name="address" rows="5" class="form-control form-control-sm rounded-0">{{ isset($employee) ? old('address', $employee->address) : old('address') }}</textarea>
                        <small class="text-danger">{{ $errors->first('address') }}</small>
                    </div>
                </div>
            </div><!-- End of card-body -->
        </div>
    </div>

    <div class="col-md-4 mb-5">
        <div class="card rounded-0">
            <div class="card-header">
                <div class=" d-flex justify-content-between align-items-center">
                    <p class="mb-0 py-1 card-ttl">
                        Employee Profile Image
                    </p>
                    <a href="javascript:;" class="btn btn-sm btn-outline-dark rounded-0" onclick="history.back()">
                        <i class="fas fa-arrow-circle-left"></i>&nbsp;
                        B A C K
                    </a>
                </div>
            </div>

            <div class="card-body">
                <input type="file" class="dropify" name="image"
                @if(isset($employee) && $employee->image)
                    data-default-file="{{ $employee->getPostImage() }}"
                @endif>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-outline-dark rounded-0 float-right">
                    <i class="fa fa-edit"></i>&nbsp;
                    @isset($employee) Update @else Create @endisset
                </button>
            </div><!-- End of card-footer -->
        </div>
    </div>
</div>

</form>
@endsection