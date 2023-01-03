@extends('home.layouts.home')
@section('title' , 'contactUs')

@section('content')
    <main class="page-content">
        <div class="container">

        @if(session('msg'))
            {!! session('msg') !!}
        @endif
            <!-- start of box => contact-us -->
            <div class="ui-box bg-white">
                <div class="ui-box-title fs-5 fw-bold">تماس با ما</div>
                <div class="ui-box-content">
                    <div class="fs-7 text-secondary mb-5">برای پیگیری یا سوال درباره استخدام مشاغل و ارسال پیام بهتر است از
                        فرم
                        زیر استفاده کنید.</div>
                    <!-- start of contact-us-form -->
                    <form action="{{route('home.sendMessage')}}" method="post" class="contact-us-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <!-- start of form-element -->
                                <div class="form-element-row mb-5">
                                    <label class="label">نام و نام خانوادگی</label>
                                    <input name="name" type="text" class="form-control" placeholder="نام کامل">
                                    @error('name')
                                    <div class="text-danger">
                                        <strong>{{$message}}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <!-- end of form-element -->
                            </div>
                            <div class="col-md-6">
                                <!-- start of form-element -->
                                <div class="form-element-row mb-5">
                                    <label class="label">شماره تلفنی که با آن ثبت نام کرده اید</label>
                                    <input name="phone" type="text" class="form-control" placeholder="09xx-xxx-xxxx">
                                    @error('phone')
                                    <div class="text-danger">
                                        <strong>{{$message}}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <!-- end of form-element -->
                            </div>
                            <div class="col-12">
                                <!-- start of form-element -->
                                <div class="form-element-row mb-5">
                                    <label class="label">پیام</label>
                                    <textarea name="text" rows="5" class="form-control" placeholder="متن پیام"></textarea>
                                    @error('text')
                                    <div class="text-danger">
                                        <strong>{{$message}}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <!-- end of form-element -->
                            </div>
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-primary px-4">ثبت و ارسال</button>
                            </div>
                        </div>
                    </form>
                    <!-- end of contact-us-form -->
                </div>
            </div>
            <!-- end of box => contact-us -->
        </div>
    </main>
@endsection
