
@extends('home.layouts.home')
@section('title' , 'user_panel')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- start of box -->
                <div class="ui-box bg-white mb-5">
                    <div class="ui-box-content">
                        <div class="row">
                            <div class="col-md-8 order-md-1 order-2">
                                <div class="fs-5 fw-bold text-success mb-3">
                                    آزمون شما ثبت گردید
                                </div>
                                <div class="text-success mb-3">آزمون شما با وفقیت ثبت گردید برای بازگشت به صفحه اصلی کلیک کنید</div>
                                <div class="d-flex align-items-center flex-wrap">
                                    <a href="{{route('home.index')}}" class="btn btn-primary me-4">بازگشت</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of box -->
            </div>
        </div>
    </div>

@endsection
