@extends('admin.layouts.admin')
@section('title' , 'employments items create')
@section('script')
    <script>
        $('#exam_date_btn').MdPersianDateTimePicker({
            targetTextSelector: '#exam_date',
            englishNumber:true,
            enableTimePicker: true,
            textFormat: 'yyyy-MM-dd HH:mm:ss',
        });
        $('#image').change(function () {

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
                ایجاد بنر
            </h5>
        </div>
        <hr>
        @include('admin.sections.errors')
        <form action="{{route('admin.banners.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-3 mt-4">
                    <label for="title"> عنوان بنر</label>
                    <input class="form-control" id="link" name="link" type="text" >
                </div>
                <div class="form-group col-md-3 mt-4">
                    <label for="is_active">وضعیت </label>
                    <select class="form-control" id="is_active" name="is_active" >
                        <option value="1">فعال</option>
                        <option value="0">غیر فعال</option>
                    </select>
                </div>

                <div class="col-md-12 mt-4">
                    <hr>
                    <p>تصویر</p>
                </div>
                <div class="form-group col-md-3 mt-4">
                    <label for="image"> انتخاب تصویر :</label>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="image">
                        <label class="custom-file-label" for="image"> انتخاب فایل </label>
                    </div>
                </div>
            </div>
            <button class="btn btn btn-outline-primary mt-5" type="submit"> ثبت </button>
            <a href="{{route('admin.banners.index')}}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
        </form>
    </div>
</div>
    @endsection
