@extends('layouts.backend.master')

@section('employee-active', 'sidebar-active')

@section('title', 'Employee Details')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6>Employee Management</h6>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="card rounded-0">
            <div class="card-body text-center py-4">
                <div class="imgBx">
                    <img src="{{ $employee->getImagePath() }}" 
                    class="img-fluid rounded-circle" width="85"/>
                </div>
                
                <div class="contentBx py-2">
                    <h5 class="font-strong mt-4 mb-4">{{ strtoupper($employee->name) }}</h5>
                    <div class="mt-4 mb-4 text-dark">
                        <span class="text-uppercase badge badge-primary px-3 py-2 custom-fs-11 rounded-0">
                            {{ strtoupper($employee->getEmployeeRole()) }}
                        </span>
                    </div>
                </div>

                <div class="socialBx">
                    <a href="javascript:;"><i class="fab fa-facebook"></i></a>
                    <a href="javascript:;"><i class="fab fa-twitter"></i></a>
                    <a href="javascript:;"><i class="fab fa-pinterest"></i></a>
                    <a href="javascript:;"><i class="fab fa-dribbble"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-9">
        <div class="card rounded-0">
            <div class="infoBx card-body pb-0">
                <div class="headingBx d-flex justify-content-between align-items-center">
                    <h6 class="font-weight-bold mb-0">
                        Personal Details Info
                    </h6>
                    <a href="javascript:;" class="btn btn-sm btn-outline-dark rounded-0" onclick="history.back()">
                        <i class="fas fa-arrow-circle-left"></i>&nbsp;
                        B A C K
                    </a>
                </div>
                
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <ul type="none">
                            <li>
                                <i class="fas fa-database"></i>
                                <label>Name</label>
                                <b>:</b>
                                <span>{{ $employee->name }}</span>
                            </li>
                            <li>
                                <i class="fas fa-database"></i>
                                <label> Email</label>
                                <b>:</b>
                                <span>{{ $employee->email }}</span>
                            </li>
                            <li>
                                <i class="fas fa-database"></i>
                                <label>NRC Number</label>
                                <b>:</b>
                                <span>{{ $employee->nrc }}</span>
                            </li>
                            <li>
                                <i class="fas fa-database"></i>
                                <label>Phone</label>
                                <b>:</b>
                                <span>{{ $employee->phone }}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <ul type="none">
                            <li>
                                <i class="fas fa-database"></i>
                                <label>Date of Birth</label>
                                <b>:</b>
                                <span>{{ date('d M, Y', strtotime($employee->dob)) }}</span>
                            </li>
                            <li>
                                <i class="fas fa-database"></i>
                                <label>Gender</label>
                                <b>:</b>
                                <span>{{ ucwords($employee->gender) }}</span>
                            </li>
                            <li>
                                <i class="fas fa-database"></i>
                                <label>Address</label>
                                <b>:</b>
                                <span>{{ ucwords($employee->address) }}</span>
                            </li>
                            <li> 
                                <i class="fas fa-database"></i>
                                <label>Date of Joined</label>
                                <b>:</b>
                                <span>{{ date('d M, Y', strtotime($employee->date_of_join)) }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection