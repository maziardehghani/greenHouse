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
                    ویرایش استخدام
                </h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{route('admin.employments.update' , $employment_items->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-3 mt-4">
                        <label for="title"> عنوان شغل</label>
                        <input class="form-control" id="title" name="title" type="text" value="{{$employment_items->title}}" >
                    </div>
                    @if($employment_items->parent_id !=0)

                    <div class="form-group col-md-3 mt-4">
                        <label for="parent">گرایش به</label>
                        <select class="form-control" id="parent" name="parent" >
                                <option value="0">سر رشته</option>
                            @foreach($employment_item_parents as $item)
                                @php($selected = '')
                                @if($item->id === $employment_items->parent_id)
                                    @php($selected = 'selected')
                                @endif
                                <option value="{{$item->id}}" {{$selected}} >{{$item->title}}</option>
                            @endforeach


                        </select>
                    </div>
                        @else
                        <div class="form-group col-md-3 mt-4">
                            <label for="parent">گرایش به</label>
                            <select class="form-control" id="parent" name="parent" >
                                <option value="0" selected="selected">سر رشته</option>
                                @foreach($employment_item_parents as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach

                            </select>
                        </div>
                    @endif

                    @if($employment_items->parent_id != 0)
                    <div class="form-group col-md-3 mt-4">
                        <label> تاریخ شروع آزمون </label>
                        <div class="input-group">
                            <div class="input-group-prepend order-2">
                            <span class="input-group-text" id="exam_date_btn">
                                <i class="ti-alarm-clock"></i>
                            </span>
                            </div>
                            <input type="text" class="form-control" id="exam_date" name="exam_date"   value="{{verta($employment_items->exam_date)}}">
                        </div>
                    </div>
                    <div class="form-group col-md-3 mt-4">
                        <label for="name">زمان آزمون به دقیقه </label>
                        <input class="form-control" id="exam_time" name="exam_time" type="text"  value="{{$employment_items->exam_time}}" >
                    </div>
                    @endif
                    <div class="form-group col-md-3 mt-4">
                        <label for="is_active">وضعیت </label>
                        <select class="form-control" id="is_active" name="is_active" >
                            @if($employment_items->getRawOriginal('is_active')==1)
                            <option value="1" selected>فعال</option>
                            <option value="0">غیر فعال</option>
                            @else
                                <option value="1">فعال</option>
                                <option value="0" selected>غیر فعال</option>
                            @endif
                        </select>
                    </div>
                    @if($employment_items->parent_id == 0)
                    <div class="form-group col-md-12 mt-4">
                        <label for="explain">توضیحات</label>
                        <textarea class="form-control" id="explain" name="explain" >{{$employment_items->explain}}</textarea>
                    </div>
                    @endif
                    @if($employment_items->parent_id ==0)
                    <div class="col-md-12 mt-4">
                        <hr>
                        <p>تصویر شغل</p>
                    </div>


                    <div class="form-group col-md-3 mt-4">
                        <label for="image"> انتخاب تصویر :</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="image" value="{{$employment_items->image}}">
                            <label class="custom-file-label" for="image">انتخاب فایل</label>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 mt-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ url(env('Image_employment_items_path') . $employment_items->image)}}">
                    </div>
                </div>
                @endif
                <button class="btn btn btn-outline-primary mt-5" type="submit"> ثبت </button>
                <a href="{{route('admin.employments.index')}}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>
    </div>
@endsection
