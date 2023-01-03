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


            $("#czContainer").czMore();


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
               ایجاد شرایط استخدام
            </h5>
        </div>
        <hr>
        @include('admin.sections.errors')
        <form action="{{route('admin.employmentConditions.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-md-3 mt-4">
                <label for="employment_item_id">استخدام مورد نظر </label>
                <select class="form-control" id="employment_item_id" name="employment_item_id" >
                    @foreach($employment_item_parents as $item)
                        <option value="{{$item->id}}">{{$item->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3 mt-4">
                <label for="part_condition">بخش شرایط </label>
                <select class="form-control" id="part_condition" name="part_condition" >
                    <option value="1">شرایط کلی</option>
                    <option value="2">شرایط مورد نیاز</option>
                </select>
            </div>
            <div id="czContainer">
                <div id="first">
                    <div class="form-group col-md-12 mt-4">
                            <div class="recordset">
                                <small class="form-text text-muted">شرایط استخدام</small>
                                <input class="form-control" type="text" name="conditions[]" id="conditions" />
                            </div>
                    </div>
                </div>
            </div>

            <button class="btn btn btn-outline-primary mt-5" type="submit"> ثبت </button>
            <a href="{{route('admin.employmentConditions.index')}}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
        </form>
    </div>
</div>
    @endsection
