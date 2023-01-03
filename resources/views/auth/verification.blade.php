
@extends('home.layouts.home')
@section('title' , 'login')
@section('content')

    @if(session('msg'))
        {!! session('msg') !!}
    @endif
<div class="page-wrapper">
    <header class="page-mini-header py-4">
        <div class="d-flex justify-content-center">
            <div class="logo-container">
                <a href="#" class="logo"><img src="" width="120" alt=""></a>
            </div>
        </div>
    </header>
    <main class="page-content page-auth">
        <!-- start of auth-container -->
        <div class="auth-container">
            <div class="auth-title mb-3">تایید شماره موبایل</div>
            <!-- start of auth-box -->
            <div class="auth-box ui-box">
                <!-- start of auth-form -->
                <form action="{{route('verification')}}" method="post" class="auth-form">
                    <!-- start of form-element -->
                    <div class="form-element-row mb-3">
                        <p>
                            ما یک کد احراز هویت برای شما ارسال کردیم لدفن آن را وارد نمایید
                        </p>
                    </div>
                    <!-- end of form-element -->
                    <!-- start of form-element -->
                    <div class="form-element-row mb-3">

                            <input name="otp" type="text" maxlength="6" class="form-control">
                            <input name="_token" type="hidden" value="{!! @session('token') !!}">

                    </div>

                    <!-- end of form-element -->
                    <!-- start of verify-code-wrapper -->
                    <div class="verify-code-wrapper mt-3 mb-5">
                        <div class="d-flex align-items-center" dir="ltr">
                            <span class="text-sm">مدت زمان باقیمانده</span>
                            <span class="mx-2">|</span>
                            <div id="timer--verify-code" data-minutes-left=1></div>
                        </div>
                        <a href="#" class="send-again link">ارسال مجدد</a>
                    </div>
                    <!-- end of verify-code-wrapper -->
                    <!-- start of form-element -->
                    <div class="form-element-row mb-3">
                        <button type="submit" class="btn btn-primary">پیوستن به خانواده ما</button>
                    </div>
                    <!-- end of form-element -->
                    <!-- start of form-element -->
                    <div class="form-element-row">
                        <a href="{{route('login')}}" class="link mx-auto">ویرایش شماره موبایل <i class="ri-pencil-fill ms-1"></i></a>
                    </div>
                    <!-- end of form-element -->
                </form>
                <!-- end of auth-form -->
            </div>
            <!-- end of auth-box -->
        </div>
        <!-- end of auth-container -->
    </main>
    <footer class="page-mini-footer">
        <div class="d-flex justify-content-center py-5">
            <div class="logo-container">
                <a href="#" class="logo"><img src="" width="120" alt=""></a>
            </div>
        </div>
        <div class="copy-right bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-md-0 mb-4">
                        <div class="text-muted text-md-start text-center">کليه حقوق اين سايت متعلق به echo_designer
                            می‌باشد.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-muted text-md-end text-center">echo_designer - 2021 © Copyright</div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

    @endsection
