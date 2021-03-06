<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Coaching | Home</title>


    <!--    Font Awesome Stylesheet-->
    <link rel="stylesheet" href="{{ asset('backend/fonts/fa/css/all.min.css') }}">
    <!--    Animate CSS-->
    <link rel="stylesheet" href="{{ asset('backend/css/animate.css') }}">
    <!--    Owl Carosel Stylesheets-->
    <link rel="stylesheet" href="{{ asset('backend/plugins/owl-carosel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/owl-carosel/css/owl.theme.default.css') }}">
    <!--    Magnetic Popup-->
    <link rel="stylesheet" href="{{ asset('backend/plugins/magnific-popup/css/magnific-popup.css') }}">
    <!--    Bootstrap-4.3 Stylesheet-->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/sub-dropdown.css') }}">
    <!--    Data Table CSS-->
    <link rel="stylesheet" href="{{ asset('backend/plugins/data-table/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/data-table/css/fixedHeader.bootstrap4.min.css') }}">
    <!--    Theme Stylesheet-->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/my.css') }}">
    <!--    Favicon-->
    <link rel="shortcut icon" href="{{ asset('backend/images/favicon.png" type="image/x-icon') }}">

    {{--// for toaster message--}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

</head>
<body>
<!--Header Start-->
<section>
    @if(isset($header))
        <div class="col-sm-12 text-center header pb-1">
            <h2 class="font-weight-bold p-1 m-0">{{ $header->name }}</h2>
            <h5 class="menu-bg p-2 pl-3 pr-3 mb-1">{{ $header->subTitle }}</h5>
            <p class="font-weight-bold mb-0">{{ $header->address }}</p>
            <p class="font-weight-bold mb-0">Mobile: {{ $header->mobile }}</p>
        </div>
     @else
        <div class="col-sm-12 text-center header pb-1">
            <h2 class="font-weight-bold p-1 m-0">Web Site Title</h2>
            <h5 class="menu-bg p-2 pl-3 pr-3 mb-1">Web Sub Title</h5>
            <p class="font-weight-bold mb-0">384/1, West-Nakhal-para, Dhaka-1215</p>
            <p class="font-weight-bold mb-0">Mobile: 880-1521414629</p>
        </div>
    @endif

</section>
<!--Header End-->

<!--User Avatar Start-->
<img class="avatar" src=" @if(auth()->user()->avatar) {{ asset('backend/profile-image/'.auth()->user()->avatar) }} @else {{ asset('backend/pro/avatar.png') }} @endif" alt="Avatar">
<!--User Avatar Start-->

<!--Main Menu Start-->
<nav class="navbar navbar-expand-lg menu-bg">
    <!--    <a class="navbar-brand" href="#">LOGO</a>-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="mobile-menu-icon fa fa-bars"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}"><span class="fa fa-home"></span> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Student
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class=""><a class="dropdown-item" href="{{ route('studentregister.create') }}">Student Registration</a></li>
                    <li class=""><a class="dropdown-item" href="{{ route('studentregister.index') }}">Running All students List</a></li>
                    <li class=""><a class="dropdown-item" href="{{ route('student.registration.batch-wise.student-form') }}">Batch Wise List</a></li>
                    <li class=""><a class="dropdown-item" href="{{ route('student.registration.class-wise-student-form') }}">Class Wise List</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Attendance
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class=""><a class="dropdown-item" href="{{ route('attendance.create') }}">Add Attendance</a></li>
                    <li class=""><a class="dropdown-item" href="{{ route('attendance.batch-wise-student-attendance-view-form') }}">View Attendance</a></li>
                    <li class=""><a class="dropdown-item" href="{{ route('attendance.batch-wise-student-attendance-edit-form') }}">Edit Attendance</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('photo-gallery') }}">Gallery</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Setting
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">School</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('add-school') }}" class="dropdown-item">Add School</a></li>
                            <li><a href="{{ route('school-show') }}" class="dropdown-item">School List</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Class</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('add-class') }}" class="dropdown-item">Add Class</a></li>
                            <li><a href="{{ route('class.index') }}" class="dropdown-item">Class List</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Batch</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('batch.create') }}" class="dropdown-item">Add Batch</a></li>
                            <li><a href="{{ route('batch.index') }}" class="dropdown-item">Batch List</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Student Type</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('student_types.index') }}" class="dropdown-item">Student Type List</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Exam</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('exam.create') }}" class="dropdown-item">Add Exam</a></li>
                            <li><a href="{{ route('exam.index') }}" class="dropdown-item">View Exam</a></li>
                        </ul>
                    </li>


                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#0">Slider</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('slider-create') }}" class="dropdown-item">Add Slider</a></li>
                            <li><a href="{{ route('slider-manage') }}" class="dropdown-item">Manage Slider</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">General</a>
                        <ul class="dropdown-menu">
                            @if(!isset($header))
                                <li><a href="{{ route('header-footer') }}" class="dropdown-item">Add Header & footer </a></li>
                            @endif
                             @if(isset($header))
                                <li><a href="{{ route('header-footer-manage', ['id'=>$header->id]) }}" class="dropdown-item">Manage Header & footer</a></li> {{--this id come from appService Provider you can see that--}}
                            @endif
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">User</a>
                            <ul class="dropdown-menu">
                                @if (Auth()->user()->role == 'admin')
                                    <li><a href="{{ route('user-register') }}" class="dropdown-item">Add User</a></li>
                                    <li><a href=" {{ route('user-list') }}" class="dropdown-item">User List</a></li>
                                @endif
                                    <li><a href=" {{ route('user-profile',['user'=>auth()->id()]) }}" class="dropdown-item">User Profile</a></li>
                            </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Date</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('date.add') }}" class="dropdown-item">Add Year</a></li>
                            </ul>
                    </li>

                </ul>
            </li>
        </ul>

{{--        <a class="font-weight-bold my-2 my-sm-0 mr-2 logout" href="#">Logout</a>--}}

        <a class="font-weight-bold my-2 my-sm-0 mr-2 logout" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>


        <!--        <form class="form-inline my-2 my-lg-0">-->
        <!--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
        <!--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
        <!--        </form>-->
    </div>
</nav>
<!--Main Menu End-->
