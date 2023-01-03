@extends('admin.layouts.admin')
@section('title' , 'jobseekers')
@section('content')
<!-- Content Row -->
@if(session('msg'))
    {!! session('msg') !!}
@endif
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4 p-md-5 ">
        <div class="mb-4">
            <h5 class="font-weight-bold">
                ایجاد استخدام
            </h5>
        </div>
        <hr>
        @include('admin.sections.errors')
        <form action="{{route('admin.employments.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-3 mt-4">
                    <label for="title"> عنوان شغل</label>
                    <input class="form-control" id="title" name="title" type="text" >
                </div>
                <div class="form-group col-md-3 mt-4">
                    <label for="parent">گرایش به</label>
                    <select class="form-control" id="parent" name="parent" >
                        <option value="0">سر رشته</option>
                        @foreach($employment_item_parents as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3 mt-4">
                    <label> تاریخ شروع آزمون </label>
                    <div class="input-group">
                        <div class="input-group-prepend order-2">
                            <span class="input-group-text" id="exam_date_btn">
                                <i class="ti-alarm-clock"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="exam_date" name="exam_date"   value="">
                    </div>
                </div>
                <div class="form-group col-md-3 mt-4">
                    <label for="name">زمان آزمون به دقیقه </label>
                    <input class="form-control" id="exam_time" name="exam_time" type="text" >
                </div>
                <div class="form-group col-md-3 mt-4">
                    <label for="is_active">وضعیت </label>
                    <select class="form-control" id="is_active" name="is_active" >
                        <option value="1">فعال</option>
                        <option value="0">غیر فعال</option>
                    </select>
                </div>
                <div class="form-group col-md-12 mt-4">
                    <label for="explain">توضیحات</label>
                    <textarea class="form-control" id="explain" name="explain"></textarea>
                </div>
                <div class="col-md-12 mt-4">
                    <hr>
                    <p>تصویر شغل</p>
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
            <a href="{{route('admin.employments.index')}}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
        </form>
    </div>
</div>
    @endsection
