@extends('layouts.backend.master')

@section('category-active', 'sidebar-active')

@section('title', 'Profile Edit')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6>Profile Management</h6>
</div>

<form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
@csrf
    <div class="row">
        <div class="col-md-8 mb-5">
            <div class="card rounded-0">
                <div class="card-header">
                    <div class=" d-flex justify-content-between align-items-center">
                        <p class="mb-0 py-1 card-ttl">
                            Edit Profile Form
                        </p>
                    </div>
                </div><!-- End of card-header -->

                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Username</label>
                            <input type="text" class="form-control form-control-sm rounded-0 @error('name') is-invalid @enderror" 
                            name="name" value="{{ @old('name', $authUser->name) }}">
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Email Address</label>
                            <input type="text" class="form-control form-control-sm rounded-0 @error('email') is-invalid @enderror" 
                            name="email" value="{{ @old('title', $authUser->email) }}">
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label>NRC Number</label>
                            <input type="text" class="form-control form-control-sm rounded-0" value="{{ @old('nrc', $authUser->nrc) }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Phone</label>
                            <input type="text" class="form-control form-control-sm rounded-0" value="{{ @old('phone', $authUser->phone) }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Gender <b class="text-danger">*</b></label>
                            <select name="gender" class="form-control form-control-sm rounded-0 @error('gender') is-invalid @enderror">
                                @php $genderList = ['male', 'female']; @endphp
                                <option disabled selected>Select Gender</option>
                                @foreach($genderList as $gender)
                                <option value="{{ $gender }}" {{ $gender == $authUser->gender ? 'selected' : '' }}>
                                    {{ ucwords($gender) }}
                                </option>
                                @endforeach
                            </select>
                            <small class="text-danger">{{ $errors->first('gender') }}</small>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Role</label>
                            <input type="text" class="form-control form-control-sm rounded-0" value="{{ ucwords($authUser->getEmployeeRole()) }}"
                            disabled>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Date of Birth <b class="text-danger">*</b></label>
                            <input type="date" class="form-control form-control-sm rounded-0 @error('dob') is-invalid @enderror" 
                            name="dob" value="{{ @old('dob', $authUser->dob) }}">
                            <small class="text-danger">{{ $errors->first('dob') }}</small>
                        </div>
    
                        <div class="form-group col-md-6">
                            <label>Date of Joined <b class="text-danger">*</b></label>
                            <input type="date" class="form-control form-control-sm rounded-0 @error('doj') is-invalid @enderror" 
                            name="doj" value="{{ @old('doj', $authUser->doj) }}">
                            <small class="text-danger">{{ $errors->first('doj') }}</small>
                        </div>

                        <div class="form-group col-md-12">
                            <label>Address</label>
                            <textarea name="address" rows="3" class="form-control form-control-sm rounded-0">{{ old('address', $authUser->address) }}</textarea>
                            <small class="text-danger">{{ $errors->first('address') }}</small>
                        </div>
                    </div>
                </div><!-- End of card-body -->
            </div>
        </div>

        <div class="col-md-4 mb-5">
            <div class="card rounded-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0 py-1 card-ttl">
                            Profile Image
                        </p>
                        <a href="javascript:;" class="btn btn-sm btn-outline-dark rounded-0" onclick="history.back()">
                            <i class="fas fa-arrow-circle-left"></i>&nbsp;
                            B A C K
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <input type="file" class="dropify" name="image"
                    @if($authUser->image)
                        data-default-file="{{ asset('uploads/user/'.$authUser->getImagePath()) }}"
                    @endif>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-outline-dark rounded-0 float-right">
                        <i class="fa fa-edit"></i>&nbsp;
                        Update Profile
                    </button>
                </div><!-- End of card-footer -->
            </div>
        </div>
    </div>
</form>
@endsection