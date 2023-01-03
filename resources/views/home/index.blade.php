@extends('home.layouts.home')
@section('title' , 'hamtakeshtsepahan')
@section('content')
    @if(session('msg'))
        {!! session('msg') !!}
    @endif
        <div class="container">
            <!-- start of mini-slider -->
            <div class="mini-slider-container mb-5">
                <!-- Slider main container -->
                <div class="swiper mini-single-swiper-slider">
                    <!-- Additional required wrapper -->
{{--                    <div class="row mb-3 d-sm-block d-none">--}}
{{--                        <div class="col-12">--}}
{{--                            <!-- start of banner -->--}}
{{--                            <div class="banner-img">--}}
{{--                                <a href="#"><img src="{{url('025.gif')}}" alt="banner"></a>--}}
{{--                            </div>--}}
{{--                            <!-- end of banner -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach($banners as $banner)
                        <div class="swiper-slide">
                            <a href="#">
                                <img src="{{url(env('Image_banners').$banner->image)}}" alt="">
                            </a>
                        </div>
                            ٬@endforeach
                    </div>
                    <div class="slider-handler">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
            <!-- end of mini-slider -->
            <!-- end of box -->
            <div class="container bg-light">
                <!-- title -->
                <div class="row my-5">
                    <div class="col text-center">
                        <h1 class="text-success">درباره همتا کشت سپاهان</h1>
                        <p class="text-muted ">
                            {{$aboutUs->top_text}}
                        </p>
                    </div>
                </div>
                <div class="card mb-3">
                    <img src="{{url(env('Image_aboutUs').$aboutUs->top_image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"> {{$aboutUs->top_image_title}}</h5>
                        <p class="card-text">{{$aboutUs->top_image_text}}</p>
                        <p class="card-text"><small class="text-muted">{{verta($aboutUs->updated_at)}}</small></p>
                    </div>
                </div>
            </div>


            <hr>
            <!-- Skills -->
            <section>
                <div class="container">
                    <!-- title -->
                    <div class="row my-5">
                        <div class="col text-center">
                            <h1 class="text-success">اهداف همتا کشت سپاهان</h1>
                            <p class="text-muted">
                                تحول کشاورزی تحول ایران است
                            </p>
                        </div>
                    </div>
                    <!-- end Title -->
                    <div class="row text-center">
                        <div class="col-lg-4 col-md-4 mb-5">
                            <i class="fas fa-tree fa-5x mb-3 text-success"></i>
                            <h3 class="text-secondary">{{$aboutUs->middle_left_title}}</h3>
                            <p class="text-muted my-4">
                                {{$aboutUs->middle_left_text}}
                            </p>
                        </div>
                        <div class="col-lg-4 col-md-4 mb-5">
                            <i class="fas fa-seedling fa-5x mb-3 text-success"></i>
                            <h3 class="text-secondary">{{$aboutUs->middle_middle_title}}</h3>
                            <p class="text-muted my-4">
                                {{$aboutUs->middle_middle_text}}
                            </p>
                        </div>
                        <div class="col-lg-4 col-md-4 mb-5">
                            <i class="fas fa-spa  fa-5x mb-3 text-success"></i>
                            <h3 class="text-secondary">{{$aboutUs->middle_right_title }}</h3>
                            <p class="text-muted my-4">{{$aboutUs->middle_right_text}}

                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Skills -->
            <hr /><!-- Team -->
            <section class="bg-white">
                <div class="container">
                    <!-- title -->
                    <div class="row py-4">
                        <div class="col text-center">
                            <h1 class="text-success">ویژگی های همتا کشت سپاهان</h1>
                        </div>
                    </div>
                    <!-- end Title -->
                    <div class="row">
                        <div class="col-lg-4 mb-4 ">
                            <div class="card">
                                <img class="card-img-top" src="{{url(env('Image_aboutUs').$aboutUs->footer_left_image)}}" alt="" />
                                <div class="card-body">
                                    <h5 class="card-title text-muted">{{$aboutUs->footer_left_title}}</h5>
                                    <p class="card-text text-muted">
                                        {{$aboutUs->footer_left_text}}
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4  ">
                            <div class="card">
                                <img class="card-img-top" src="{{url(env('Image_aboutUs').$aboutUs->footer_middle_image)}}" alt="" />
                                <div class="card-body">
                                    <h5 class="card-title text-muted">{{$aboutUs->footer_middle_title}}</h5>
                                    <p class="card-text text-muted">
                                        {{$aboutUs->footer_middle_text}}
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4 ">
                            <div class="card">
                                <img class="card-img-top" src="{{url(env('Image_aboutUs').$aboutUs->footer_right_image)}}" alt="" />
                                <div class="card-body">
                                    <h5 class="card-title text-muted">{{$aboutUs->footer_right_title}}</h5>
                                    <p class="card-text text-muted">
                                        {{$aboutUs->footer_right_text}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Team -->
        </div>
@endsection
