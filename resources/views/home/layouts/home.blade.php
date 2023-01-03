
@php

    $settings = \App\Models\settings::find(1);

@endphp
    <!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#2962ff">
    <meta name="msapplication-navbutton-color" content="#2962ff">
    <meta name="apple-mobile-web-app-status-bar-style" content="#2962ff">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('home/css/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/dependencies.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/bootstrap.min.css')}}">
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">--}}
    {{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
    {{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,500,600,700,800,900&display=swap">--}}

    {{--    <link--}}
    {{--        rel="stylesheet"--}}
    {{--        href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"--}}
    {{--        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay"--}}
    {{--        crossorigin="anonymous"/>--}}
</head>

<body>

<div class="page-wrapper ">

    <!-- start of page-header -->
    <header class="page-header d-md-block  d-none">
        <!-- start of page-header-top -->

        <div style="background-color: #0f5132" class="page-header--top ">
            <div class="container">
                <div class="d-flex align-items-center justify-content-end">
                    <div class="page-header--top-left">
                        <ul class="nav nav-light justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home.contactUs')}}">تماس با ما</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">درباره ما</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <!-- end of page-header-top -->
        <!-- start of page-header-middle -->

        <div class="page-header--middle">
            <div class="container">
                <div class="row align-items-center py-4">
                    <div class="col-4">

                            <div class="user-options">
                                @auth

                                    <div class="setting-wrap">
                                        <a class="nav-link dropdown-toggle text-white setting-active" role="button" data-toggle="dropdown" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill text-dark" viewBox="0 0 16 16">
                                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                            </svg>
                                        </a>
                                        <div class="text-right dropdown-menu">
                                            <a class="text-muted dropdown-item mr-2" href="{{route('user_panel')}}"> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                                </svg>پنل کاربری
                                            </a>
                                            <a class="text-muted dropdown-item mr-2" href="{{ route('logout') }}"> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                                                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                                </svg>خروج
                                            </a>

                                        </div>
                                    </div>
                                @else
                                    <div class="auth-title mb-3"><a href="{{route('login')}}">ورود / ثبت نام</a></div>
                                @endauth

                            </div>

                    </div>
                    <div class="col-4">
                        <div class="logo-container">
                            <a href="#" class="logo">
                                <img src="{{$settings->logo ? url(env('logo').$settings->logo):''}}" class="mb-0" width="120" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-grow-1 pe-3">
                    </div>
                </div>
            </div>
        </div>
        <!-- end of page-header-middle -->
        <!-- start of page-header-bottom -->
        <div class="page-header--bottom bg-light ">
            <div class="container">
                <ul class="nav justify-content-center">
                    <li class="nav-item mega-menu-btn">
                        <a class="nav-link" href="{{route('home.index')}}"><strong>خانه</strong></a>
                    </li>
                    <li class="nav-item mega-menu-btn">
                        <a class="nav-link" href="{{route('home.employments')}}"><strong>استخدام</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home.contactUs')}}"><strong>تماس با ما</strong></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end of page-header-bottom -->
    </header>
    <!-- end of page-header -->
    <header class="page-header-responsive d-md-none">
        <div class="page-header-responsive-row mb-3">
            <div class="d-flex align-items-center">
                <div class="navigation-container">
                    <button class="toggle-navigation"></button>
                    <div class="navigation">
                        <div class="navigation-header">
                            <div class="logo-container logo-box">
                                <a href="#" class="logo">
                                    <img src="{{$settings->logo ? url(env('logo').$settings->logo):''}}" width="120" alt="">
                                    <span class="logo-text">همتا کشت سپاهان</span>
                                </a>
                            </div>
                        </div>
                        <div class="navigation-body">
                            <ul class="menu">
                                <li>
                                    <a href="{{route('home.index')}}">خانه</a>
                                </li>
                                <li>
                                    <a href="{{route('home.employments')}}">استخدام</a>
                                </li>
                                <li>
                                    <a href="#">وبلاگ</a>
                                </li>
                                <li>
                                    <a href="{{route('home.contactUs')}}">تماس با ما</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="navigation-overlay"></div>
                </div>
                <div class="logo">
                    <a href="#">
                        <img src="{{$settings->logo ? url(env('logo').$settings->logo):''}}" alt="">
                    </a>
                </div>
            </div>
            <div class="user-options">
                @auth

                    <div class="setting-wrap">
                        <a class="nav-link dropdown-toggle text-white setting-active" role="button" data-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill text-dark" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </a>
                        <div class="text-right dropdown-menu">
                            <a class="text-muted dropdown-item mr-2" href="{{route('user_panel')}}"> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                </svg>پنل کاربری
                            </a>
                            <a class="text-muted dropdown-item mr-2" href="{{ route('logout') }}"> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                </svg>خروج
                            </a>

                        </div>
                    </div>
                @else
                    <div class="auth-title mb-3"><a href="{{route('login')}}">ورود / ثبت نام</a></div>
                @endauth

            </div>
        </div>
    </header>

    <main class="page-content">
        @yield('content')
    </main>

    <hr>
    <div class="row mb-3">
        <div class="col-lg-3 col-md-4 col-6">
            <div class="widget widget-footer">
                <div class="widget-title">گلخانه همتا کشت سپاهان</div>
                <div class="widget-content widget-list">
                    <ul>
                        <li><a href="#">شرکت همتا کشت سپاهان واقع در استان اصفهان از بزرگ ترین و مجهز ترین گلخانه های کشور میباشد </a></li>


                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-6">
            <div class="widget widget-footer">
                <div class="widget-title">شماره های تماس</div>
                <div class="widget-content widget-list">
                    <ul>

                        <li><a href="#">مدیر داخلی</a></li>
                        <li><a href="#">{{$settings->phone}}</a></li>
                        <li><a href="#">شماره واتساپ</a></li>
                        <li><a href="#">{{$settings->whatsapp_number}}</a></li>
                        <li><a href="#">ایمیل</a></li>
                        <li><a href="#">{{$settings->email}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-12">
            <div class="widget widget-footer">
                <div class="widget-title">ورود به صنعت گلخانه</div>
                <div class="widget-content widget-list">
{{--                    <ul>--}}
{{--                        <li><a href="#">کشت هیدروپونیک</a></li>--}}
{{--                        <li><a href="#">هزینه ساخت گلخانه</a></li>--}}
{{--                        <li><a href="#">درآمد گلخانه</a></li>--}}
{{--                        <li><a href="#"> انواع گلخانه</a></li>--}}
{{--                        <li><a href="#">گل رز هلندی</a></li>--}}
{{--                    </ul>--}}
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-5">
            <div class="widget widget-footer mb-4">
                <div class="widget-title">لینک شبکه های اجتماعی</div>
                <div class="widget-content widget-socials">
                    <ul>
                        <li><a href="#"><i class="ri-facebook-circle-fill"></i></a></li>
                        <li><a href="{{url($settings->instagram_id)}}"><i class="ri-instagram-fill"></i></a></li>
                        <li><a href="#"><i class="ri-twitter-fill"></i></a></li>
                        <li><a href="{{url($settings->telegram_id)}}"><i class="ri-telegram-fill"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="{{asset('home/js/dependencies/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('home/js/dependencies/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('home/js/dependencies/bootstrap-slider.min.js')}}"></script>
<script src="{{asset('home/js/dependencies/jquery.countdown.min.js')}}"></script>
<script src="{{asset('home/js/dependencies/jquery.simple.timer.min.js')}}"></script>
<script src="{{asset('home/js/dependencies/iziToast.min.js')}}"></script>
<script src="{{asset('home/js/dependencies/fancybox.umd.js')}}"></script>
<script src="{{asset('home/js/dependencies/nouislider.min.js')}}"></script>
<script src="{{asset('home/js/dependencies/wNumb.js')}}"></script>
<script src="{{asset('home/js/dependencies/remodal.min.js')}}"></script>
<script src="{{asset('home/js/dependencies/select2.min.js')}}"></script>
<script src="{{asset('home/js/dependencies/simplebar.min.js')}}"></script>
<script src="{{asset('home/js/dependencies/swiper-bundle.min.js')}}"></script>
<script src="{{asset('home/js/dependencies/zoomsl.min.js')}}"></script>
<script src="{{asset('home/js/theme.js')}}"></script>
<script src="{{asset('home/js/custom.js')}}"></script>

@yield('script')
</body>

</html>
