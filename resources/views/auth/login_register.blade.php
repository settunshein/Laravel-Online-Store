@extends('layouts.frontend.master')

@section('title', 'Login & Register')

@section('css')
<style>
    #form { 
        margin-top: 0; 
        margin-bottom: 130px; 
    }
    .or {
        background: #FE980F;
        border-radius: 40px;
        color: #FFFFFF;
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
        height: 50px;
        line-height: 50px;
        margin-top: 75px;
        text-align: center;
        width: 75px;
        align: center;
    }

    .col-sm-2 {
        display: flex;
        justify-content: center;
    }
</style>
@endsection

@section('content')
<section id="form">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{ url('/') }}">Home</a></li>
              <li class="active">Authentication</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-sm-5 ">
                <div class="login-form">
                    <h2>LOGIN</h2>
                    <form action="{{ url('/login') }}" method="POST"> 
                    @csrf
                        <div class="custom-mb-20">
                            <input type="email" name="email" placeholder="Enter Your Email Address" />
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div>
                        <div class="custom-mb-20">
                            <input type="password" name="password" placeholder="Enter Your Password" />
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-sm-2">
                <h2 class="or">OR</h2>
            </div>

            <div class="col-sm-5">
                <div class="signup-form">
                    <h2>REGISTER</h2>
                    <form action="{{ url('/register') }}" method="POST">
                    @csrf
                        <div class="custom-mb-20">
                            <input type="text" name="name" placeholder="Enter Your Name"/>
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>
                        <div class="custom-mb-20">
                            <input type="email" name="email" placeholder="Enter Your Email Address"/>
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div>
                        <div class="custom-mb-20">
                            <input type="password" name="password" placeholder="Enter Your Password"/>
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                        </div>
                        <div class="custom-mb-20">
                            <input type="password" name="password_confirmation" placeholder="Confirm Your Password"/>
                            <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                        </div>
                        <button type="submit" class="btn btn-default">REGISTER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection