<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>Ebanking - Your money is safe.</title>
<meta name="keywords" content="HTML5 Template">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>

<link href="{{ asset('css/main.css') }}" rel="stylesheet" media="screen">
<link href="{{ asset('css/new.css') }}" rel="stylesheet" media="screen">
<link href="{{ asset('css/skins/green/green.css') }}" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<link rel="shortcut icon" href="{{ asset('img/icons/favicon.ico') }}">

@yield('script')


    <!--==========SCRIPTS==========-->

</head>

<body data-gr-c-s-loaded="true" class="none">
    <div class="loader" id="loader">
    </div>

    <div id="layout" class="layout-semiboxed">

        <div id="fond-header" class="fond-header color-header-8 pattern-header-01"></div>


        <header id="header">
            <div class="row">

                <div class="col-md-4">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            Ebanking
                            <span>Your money is safe.</span>
                        </a>
                    </div>
                </div>


                <div class="col-md-offset-2 col-md-6">
                    <div class="info-login">                        
                        @if(Auth::guest())
                            <div class="head-info-login">
                            <p>Dịch vụ ngân hàng điện tử !!!</p>
                            <span>
                                <a href="{{ route('register') }}">Đăng ký</a>
                                <a href="{{ url('/login') }}">Đăng nhập</a>
                            </span>
                        </div>
                        @else
                        <div class="head-info-login">
                            <p>Dịch vụ ngân hàng điện tử !!!</p>
                        </div>
                        <!-- Split button -->
                        <div class="btn-group pull-right">
                          <a href="{{ url('/show') }}" class="btn btn-default">{{ Auth::user()->userInfo->name }}</a>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu btn-info">
                            <li><a class="" href="{{ url('/logout') }}">Đăng xuất</a></li>
                            @if(Auth::user()->is_admin)
                                <li><a class="" href="{{ url('/admin/index') }}">Admin</a></li>
                            @endif
                          </ul>
                        </div>
                        @endif
                    </div>

                </div>

            </div>
        </header>


        <div class="content-central">

            <nav id="menu">
                <div class="navbar yamm navbar-default">
                    <div class="container">
                        <div class="row">
                            <div class="navbar-header">
                                <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div id="navbar-collapse-1" class="navbar-collapse collapse">

                                <ul class="nav navbar-nav">

                                    <li class="dropdown">
                                        <a href="{{ url('/') }}" >
                                            Trang chủ
                                        </a>
                                        
                                    </li>


                                    <li class="dropdown">
                                        <a href="template-about.html" data-toggle="dropdown" class="dropdown-toggle">
                                            Doanh Nghiệp<b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="template-about.html"> About Us </a>
                                            </li>
                                            <li><a href="template-history.html"> History </a>
                                            </li>
                                            <li><a href="template-events.html"> Events </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="template-services-options.html" data-toggle="dropdown" class="dropdown-toggle">
                                            Dịch Vụ<b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="template-services-options.html">Chuyển Tiền trong hệ thống</a>
                                            </li>
                                            <li><a href="template-credit-simulator.html">Chuyển tiền ngoài hệ thống </a>
                                            </li>
                                        </ul>
                                    </li>


                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                            Tài Chính<b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>

                                                <div class="yamm-content">
                                                    <div class="row">
                                                        <ul class="col-md-4 list-unstyled">
                                                            <li>
                                                                <strong>
                                                                    <i class="fa fa-bicycle"></i>
                                                                    For Persons
                                                                </strong>
                                                                <span>Special For Financial institutions</span>
                                                            </li>
                                                            <li><a href="template-accounts.html"> Accounts </a>
                                                            </li>
                                                            <li><a href="template-credits.html"> Credits </a>
                                                            </li>
                                                            <li><a href="template-inversions.html"> Inversions </a>
                                                            </li>
                                                        </ul>
                                                        <ul class="col-md-4 list-unstyled">
                                                            <li>
                                                                <strong>
                                                                    <i class="fa fa-database"></i>
                                                                    For Companies
                                                                </strong>
                                                                <span>Focused for cooperatives</span>
                                                            </li>
                                                            <li><a href="template-accounts.html"> Accounts </a>
                                                            </li>
                                                            <li><a href="template-credits.html"> Credits </a>
                                                            </li>
                                                            <li><a href="template-inversions.html"> Inversions </a>
                                                            </li>
                                                        </ul>
                                                        <ul class="col-md-4 list-unstyled">
                                                            <li>
                                                                <strong>
                                                                    <i class="fa fa-hand-peace-o"></i>
                                                                    For Pymes
                                                                </strong>
                                                                <span>Employee Funds versions</span>
                                                            </li>
                                                            <li><a href="template-accounts.html"> Accounts </a>
                                                            </li>
                                                            <li><a href="template-credits.html"> Credits </a>
                                                            </li>
                                                            <li><a href="template-inversions.html"> Inversions </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <i class="fa fa-coffee big-icon"></i>
                                            </li>
                                        </ul>
                                    </li>


                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle">
                                            Tin Tức
                                        </a>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle">
                                            Liên Hệ
                                        </a>
                                    </li>

                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            

             @yield('user')

        </div>


        <footer id="footer">


            <div class="footer-down">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">

                            <ul class="nav-footer">
                                <li><a href="#">HOME</a> </li>
                                <li><a href="#">COMPANY</a>
                                </li>
                                <li><a href="#">SERVICES</a>
                                </li>
                                <li><a href="#">NEWS</a>
                                </li>
                                <li><a href="#">PORTFOLIO</a>
                                </li>
                                <li><a href="#">CONTACT</a>
                                </li>
                            </ul>

                        </div>
                        <div class="col-md-5">
                            <p>© 2017 CoopBank. All Rights Reserved. 2010 - 2017</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </footer>

    </div>

<!-- <script src="{{ asset('js/libs/jquery.js') }}"></script> -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.loader').hide();
    });
</script>

<script type="text/javascript" src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>


</body>

</html>