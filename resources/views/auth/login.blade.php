
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
                <div class="auth-title mb-3">ورود / ثبت نام</div>
                <!-- start of auth-box -->
                <div class="auth-box ui-box">
                    <!-- start of auth-form -->
                    <form action="{{route('login')}}" method="post" class="auth-form">
                        @csrf

                        <!-- start of form-element -->
                        <div class="form-element-row mb-5">
                            <input name="cellphone" type="text" class="form-control" placeholder="شماره همراه">
                            @error('cellphone')
                            <div class="input-error-validation text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <!-- end of form-element -->
                        <!-- start of form-element -->
                        <div class="form-element-row mb-3">
                            <button class="btn btn-primary">ادامه</button>
                        </div>
                        <!-- end of form-element -->
                        <!-- start of form-element -->
                        <div class="form-element-row">
                            <div>با ورود و یا ثبت نام در سایت شما <a  class="link">شرایط و
                                    قوانین</a> استفاده
                                از تمام سرویس های
                                سایت و <a class="link">قوانین حریم خصوصی</a> آن را می‌پذیرید.
                            </div>
                        </div>
                        <!-- end of form-element -->
                    </form>
                    <!-- end of auth-form -->
                </div>
                <!-- end of auth-box -->
            </div>
            <!-- start of auth-container -->
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
