@extends('layouts.main')

@section('script')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/new.css') }}">
    <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/new.js') }}"></script>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
@stop

@section('user')

    <div class="content_info">

        <div class="title-vertical-line">
            <h2><span>Đăng kí tài khoản</span></h2>
            <p class="lead">Register and our customer, we will be happy to help.</p>
        </div>


        <div class="paddings">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <form class="well form-horizontal" action="/register_user" method="post" id="register_form" style="font-size: 90%;">
                            {{ csrf_field() }}

                            <!-- Ch?ng Minh Nhân Dân-->
                            <div class="form-group{{ $errors->has('identity_card') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Chứng Minh Nhân Dân</label>
                                <div class="col-md-7 inputGroupContainer">
                                        <input name="identity_card" class="form-control" type="number" />
                                        @if ($errors->has('identity_card'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('identity_card') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <!-- ngày c?p -->
                            <div class="form-group{{ $errors->has('date_of_identity_card') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Ngày cấp</label>  
                                <div class="col-md-7 inputGroupContainer">
                                        <input  name="date_of_identity_card" class="form-control"  type="date">
                                        @if ($errors->has('date_of_identity_card'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('date_of_identity_card') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <!-- H? và Tên-->
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Họ và tên</label>  
                                <div class="col-md-7 inputGroupContainer">
                                        <input  name="name" class="form-control"  type="text">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <!-- Ngày Sinh-->
                            <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Ngày sinh</label>  
                                <div class="col-md-7 inputGroupContainer">
                                        <input  name="date_of_birth" class="form-control"  type="date">
                                        @if ($errors->has('date_of_birth'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('date_of_birth') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <!-- S? Ði?n Tho?i-->
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Số điện thoại</label>  
                                <div class="col-md-7 inputGroupContainer">
                                        <input  name="phone" class="form-control"  type="number">
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <!-- Ð?a Ch?-->
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Địa chỉ</label>  
                                <div class="col-md-7 inputGroupContainer">
                                        <input  name="address" class="form-control"  type="text">
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <!-- T?nh/ Thành Ph?-->
                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Tỉnh/Thành Phố</label>  
                                <div class="col-md-7 inputGroupContainer">
                                        <select  name="city" class="form-control"  type="text" id="city">
                                            <option value="">Chọn Tỉnh/Thành Phố</option>
                                        </select>
                                        @if ($errors->has('city'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <!-- Qu?n/ Huy?n-->
                            <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Quận Huyện</label>  
                                <div class="col-md-7 inputGroupContainer">
                                        <select  name="district" class="form-control"  type="text" id="district">
                                            <option value="">Chọn Quận/Huyện</option>
                                        </select>
                                        @if ($errors->has('district'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('district') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <!-- Phu?ng/ Xã-->
                            <div class="form-group{{ $errors->has('ward') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Phường Xã</label>  
                                <div class="col-md-7 inputGroupContainer">
                                        <input  name="ward" class="form-control"  type="text">
                                        @if ($errors->has('ward'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ward') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <!-- Email-->
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Email</label>  
                                <div class="col-md-7 inputGroupContainer">
                                        <input  name="email" class="form-control" id="email" type="text">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <!-- Nh?p l?i Email-->
                            <div class="form-group{{ $errors->has('email_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Nhập lại Email</label>  
                                <div class="col-md-7 inputGroupContainer">
                                        <input  name="email_confirmation" class="form-control"  type="text">
                                        @if ($errors->has('email_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email_confirmation') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <!-- Công vi?c-->
                            <div class="form-group{{ $errors->has('job') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Công việc</label>  
                                <div class="col-md-7 inputGroupContainer">
                                        <input  name="job" class="form-control"  type="text">
                                        @if ($errors->has('job'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('job') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <!-- captcha-->
                            <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label"></label>  
                                <div class="col-md-7 inputGroupContainer">
                                        <div class="g-recaptcha" data-sitekey="6Lc47SkUAAAAAOIKcRs8A6XOAu8qgyEKGNIWo9il"></div>
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>                            

                            <!-- Button -->
                            <div class="form-group">
                              <label class="col-md-4 control-label"></label>
                              <div class="col-md-7">
                                <button type="submit" class="btn btn-info">Gửi <span class="glyphicon glyphicon-send" id="submit"></span></button>
                              </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-4">
                        <div class="title-subtitle">
                            <h5>Company Value</h5>
                            <h3>Who Are You</h3>
                            <p class="lead">Coop Bank is a company of the envato Foundation through its banking activities to contribute in overcoming the structural causes of poverty.</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Our Mission</h5>
                                <p>Lorem iur adipiscing elit. Ut vehicula dapibus augue nec maximustiam eleifend magna erat, quis vestibulum lacus mattis sit ametec pellentesque lorem sapien.</p>
                            </div>
                            <div class="col-md-6">
                                <h5>Responsibilty</h5>
                                <p>Lorem iur adipiscing elit. Ut vehicula dapibus augue nec maximustiam eleifend magna erat, quis vestibulum lacus mattis sit ametec pellentesque lorem sapien.</p>
                            </div>
                        </div>
                        <!-- <img src="img/gallery/1.jpg" alt="" class="img-responsive"> -->
                    </div>
                </div>  
            </div>      
        </div>

    </div>



@stop