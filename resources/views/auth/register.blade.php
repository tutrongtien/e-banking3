@extends('layouts.master')

@section('script')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/new.css') }}">
    <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/new.js') }}"></script>
@stop

@section('content')
    <div class="container">
        <form class="well form-horizontal" action="/register_user" method="post" id="register_form">
                {{ csrf_field() }}
                <fieldset>

                <!-- Form Name -->
                <legend>Ðang kí tài kho?n</legend>

                <!-- Ch?ng Minh Nhân Dân-->
                <div class="form-group{{ $errors->has('identity_card') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Ch?ng Minh Nhân Dân</label>
                    <div class="col-md-4 inputGroupContainer">
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
                    <label class="col-md-4 control-label">Ngày C?p</label>  
                    <div class="col-md-4 inputGroupContainer">
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
                    <label class="col-md-4 control-label">H? và Tên</label>  
                    <div class="col-md-4 inputGroupContainer">
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
                    <label class="col-md-4 control-label">Ngày Sinh</label>  
                    <div class="col-md-4 inputGroupContainer">
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
                    <label class="col-md-4 control-label">S? Ði?n Tho?i</label>  
                    <div class="col-md-4 inputGroupContainer">
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
                    <label class="col-md-4 control-label">Ð?a Ch?</label>  
                    <div class="col-md-4 inputGroupContainer">
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
                    <label class="col-md-4 control-label">T?nh/ Thành Ph?</label>  
                    <div class="col-md-4 inputGroupContainer">
                            <select  name="city" class="form-control"  type="text" id="city">
                                <option value="">Ch?n T?nh/ Thành Ph?</option>
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
                    <label class="col-md-4 control-label">Qu?n/ Huy?n</label>  
                    <div class="col-md-4 inputGroupContainer">
                            <select  name="district" class="form-control"  type="text" id="district">
                                <option value="">Ch?n Qu?n/ Huy?n</option>
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
                    <label class="col-md-4 control-label">Phu?ng/ Xã</label>  
                    <div class="col-md-4 inputGroupContainer">
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
                    <div class="col-md-4 inputGroupContainer">
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
                    <label class="col-md-4 control-label">Nh?p l?i Email</label>  
                    <div class="col-md-4 inputGroupContainer">
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
                    <label class="col-md-4 control-label">Công vi?c</label>  
                    <div class="col-md-4 inputGroupContainer">
                            <input  name="job" class="form-control"  type="text">
                            @if ($errors->has('job'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('job') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>

                <!-- captcha-->
                <div class="form-group{{ $errors->has('job') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label"></label>  
                    <div class="col-md-4 inputGroupContainer">
                            <div class="g-recaptcha" data-sitekey="6Lc47SkUAAAAAOIKcRs8A6XOAu8qgyEKGNIWo9il" name="g-recaptcha-response"></div>
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>

                <!-- Success message -->
                <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Ðang kí thành công. vui lòng xác nh?n email dã dang kí</div>

                <!-- Button -->
                <div class="form-group">
                  <label class="col-md-4 control-label"></label>
                  <div class="col-md-4">
                    <button type="submit" class="btn btn-warning" >G?i <span class="glyphicon glyphicon-send"></span></button>
                  </div>
                </div>

                </fieldset>
            </form>
        </div>
    </div><!-- /.container -->
@stop    