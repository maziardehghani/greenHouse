@extends('admin.layouts.admin')
@section('title' , 'employments items create')
@section('script')
    <script>
        $('#image').change(function () {

            var fileName = $(this).val();
            $(this).next('.custom-file-label').html(fileName);
        })
        $('#footer-left-image').change(function () {

            var fileName = $(this).val();
            $(this).next('.custom-file-label').html(fileName);
        })
        $('#footer-middle-image').change(function () {

            var fileName = $(this).val();
            $(this).next('.custom-file-label').html(fileName);
        })
        $('#footer-right-image').change(function () {

            var fileName = $(this).val();
            $(this).next('.custom-file-label').html(fileName);
        })


    </script>
@endsection
@section('content')
    <!-- Content Row -->
    @if(session('msg'))
        {!! session('msg') !!}
    @endif
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4 p-md-5 ">
            <div class="mb-4">
                <h5 class="font-weight-bold">
                    ویرایش درباره ما
                </h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{route('admin.aboutUs.update' , 1)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="container">
                    <!-- title -->
                    <div class="row my-5">
                        <div class="col text-center">

                            <h1 class="text-success">درباره نهال رویش</h1>
                            <small class="form-text ">متن بالای صفحه:</small>
                            <textarea class="form-control text-dark col-12 mt-2" name="top_text">{{$about_us->top_text}}</textarea>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <img src="{{url(env('Image_aboutUs').$about_us->top_image)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="form-group col-md-12 mt-4">
                                <small class="form-text ">عکس بالای صفحه:</small>
                                <div class="custom-file">
                                    <input type="file" name="top_image" class="custom-file-input" id="image" value="{{$about_us->top_image}}">
                                    <label class="custom-file-label text-truncate" for="image"></label>
                                </div>
                            </div>
                            <small class="form-text mt-2">عنوان زیر عکس بالای صفحه:</small>
                            <input class="form-control text-dark col-3" name="top_image_title" type="text" value="{{$about_us->top_image_title}}">

                            <small class="form-text mt-2">متن زیر عکس بالای صفحه:</small>
                            <textarea class="form-control text-dark col-12" name="top_image_text">{{$about_us->top_image_text}}</textarea>
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
                                <h1 class="text-success">اهداف نهال رویش</h1>
                                <p class="text-muted">
                                    تحول کشاورزی تحول ایران است
                                </p>
                            </div>
                        </div>
                        <!-- end Title -->
                        <div class="row text-center">
                            <div class="col-lg-4 col-md-4 mb-5">

                                <small class="form-text mt-2">عنوان سمت راست وسط صفحه:</small>
                                <input class="form-control text-dark col-12" name="middle_right_title" type="text" value="{{$about_us->middle_right_title}}">

                                <small class="form-text mt-2">متن سمت راست وسط صفحه:</small>
                                <textarea class="form-control text-dark col-12 " name="middle_right_text">{{$about_us->middle_right_text}}</textarea>

                            </div>
                            <div class="col-lg-4 col-md-4 mb-5">

                                <small class="form-text mt-2">عنوان  میانی وسط صفحه:</small>
                                <input class="form-control text-dark col-12" name="middle_middle_title" type="text" value="{{$about_us->middle_middle_title}}">

                                <small class="form-text mt-2">متن میانی وسط صفحه:</small>
                                <textarea class="form-control text-dark col-12 " name="middle_middle_text">{{$about_us->middle_middle_text}}</textarea>

                            </div>
                            <div class="col-lg-4 col-md-4 mb-5">

                                <small class="form-text mt-2">عنوان سمت چپ وسط صفحه:</small>
                                <input class="form-control text-dark col-12" name="middle_left_title" type="text" value="{{$about_us->middle_left_title}}">

                                <small class="form-text mt-2">متن سمت چپ وسط صفحه:</small>
                                <textarea class="form-control text-dark col-12" name="middle_left_text">{{$about_us->middle_left_text}}</textarea>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Skills -->
                <hr /><!-- Team -->
                <section>
                    <div class="container">
                        <!-- title -->
                        <div class="row py-4">
                            <div class="col text-center">
                                <h1 class="text-success">ویژگی های نهال رویش</h1>
                            </div>
                        </div>
                        <!-- end Title -->
                        <div class="row">
                            <div class="col-lg-4 mb-4 ">
                                <div class="card">
                                    <img class="card-img-top" src="{{url(env('Image_aboutUs').$about_us->footer_right_image)}}" alt="" />
                                    <div class="card-body">
                                        <div class="form-group col-md-12 mt-4">
                                            <small class="form-text mt-2">عکس پایین راست صفحه:</small>
                                            <div class="custom-file">
                                                <input type="file" name="footer_right_image" class="custom-file-input" id="footer-right-image" value="">
                                                <label class="custom-file-label text-truncate" for="image"></label>
                                            </div>
                                        </div>
                                        <small class="form-text mt-2">عنوان سمت راست پایین صفحه:</small>
                                        <input class="form-control text-dark col-12" name="footer_right_title" type="text" value="{{$about_us->footer_right_title}}">

                                        <small class="form-text mt-2">متن سمت راست پایین صفحه:</small>
                                        <textarea class="form-control text-dark col-12 " name="footer_right_text">    {{$about_us->footer_right_text}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-4 ">
                                <div class="card">
                                    <img class="card-img-top" src="{{url(env('Image_aboutUs').$about_us->footer_middle_image)}}" alt="" />
                                    <div class="card-body">
                                        <div class="form-group col-md-12 mt-4">
                                            <small class="form-text mt-2">عکس پایین وسط صفحه:</small>
                                            <div class="custom-file">
                                                <input type="file" name="footer_middle_image" class="custom-file-input" id="footer-middle-image" value="">
                                                <label class="custom-file-label text-truncate" for="image"></label>
                                            </div>
                                        </div>
                                        <small class="form-text mt-2">عنوان میانی پایین صفحه:</small>
                                        <input class="form-control text-dark col-12" name="footer_middle_title" type="text" value="{{$about_us->footer_middle_title}}">

                                        <small class="form-text mt-2">متن میانی پایین صفحه:</small>
                                        <textarea class="form-control text-dark col-12 " name="footer_middle_text">     {{$about_us->footer_middle_text}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-4 ">
                                <div class="card">
                                    <img class="card-img-top" src="{{url(env('Image_aboutUs').$about_us->footer_left_image)}}" alt="" />
                                    <div class="card-body">
                                        <div class="form-group col-md-12 mt-4">
                                            <small class="form-text mt-2">عکس پایین چپ صفحه:</small>
                                            <div class="custom-file">
                                                <input type="file" name="footer_left_image" class="custom-file-input" id="footer-left-image" value="">
                                                <label class="custom-file-label text-truncate" for="image"></label>
                                            </div>
                                        </div>
                                        <small class="form-text mt-2">عنوان سمت چپ پایین صفحه:</small>
                                        <input class="form-control text-dark col-12" name="footer_left_title" type="text" value="{{$about_us->footer_left_title}}">

                                        <small class="form-text mt-2">متن سمت چپ پایین صفحه:</small>
                                        <textarea class="form-control text-dark col-12 " name="footer_left_text">  {{$about_us->footer_left_text}}</textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <!-- End Team -->
                <button class="btn btn btn-outline-primary mt-5" type="submit"> ثبت </button>
             </form>
        </div>
    </div>
@endsection
