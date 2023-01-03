@extends('admin.layouts.admin')
@section('title' , 'employments items show')
@section('script')
    <script>
    </script>
@endsection
@section('content')
    @if(session('msg'))
        {!! session('msg') !!}
    @endif
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4 p-md-5 ">
            <div class="mb-4">
                <h5 class="font-weight-bold">
                    نمایش استخدام
                </h5>
            </div>
            <hr>
                <div class="form-row">
                    <div class="form-group col-md-3 mt-4">
                        <label for="title"> عنوان شغل</label>
                        <input class="form-control" id="title" name="title" type="text" value="{{$employment_items->title}}" disabled>
                    </div>
                    <div class="form-group col-md-3 mt-4">
                        <label for="parent">گرایش به</label>
                        <input class="form-control" id="title" name="title" type="text" value="{{$employment_items->parent_id==0 ? 'سردسته' : $employment_items->parent->title}}" disabled>

                    </div>
                    @if($employment_items->parent_id!=0)
                    <div class="form-group col-md-3 mt-4">
                        <label> تاریخ شروع آزمون </label>
                        <div class="input-group">
                            <div class="input-group-prepend order-2">
                            <span class="input-group-text" id="exam_date_btn">
                                <i class="ti-alarm-clock"></i>
                            </span>
                            </div>
                            <input type="text" class="form-control" id="exam_date" name="exam_date"   value="{{$employment_items->exam_date ? verta($employment_items->exam_date) : '-'}}" disabled>
                        </div>
                    </div>
                    @endif
                    @if($employment_items->parent_id!=0)
                    <div class="form-group col-md-3 mt-4">
                        <label for="name">زمان آزمون به دقیقه </label>
                        <input class="form-control" id="exam_time" name="exam_time" value="{{$employment_items->exam_time ? $employment_items->exam_time : '-' }}" type="text" disabled >
                    </div>
                    @endif
                    <div class="form-group col-md-3 mt-4">
                        <label for="is_active">وضعیت</label>
                        <input class="form-control {{$employment_items->getRawOriginal('is_active')?'text-success' : 'text-danger'}}" id="is_active" name="is_active" value="{{$employment_items->is_active}}" type="text" disabled >
                    </div>
                    @if($employment_items->parent_id==0)
                    <div class="form-group col-md-12 mt-4">
                        <label for="explain">توضیحات</label>
                        <textarea class="form-control" id="explain" name="explain" disabled>{{$employment_items->explain}}</textarea>
                    </div>
                    @endif

                    {{-- Images --}}
                    @if($employment_items->parent_id == 0)
                        <div class="col-md-12 mt-4">
                            <hr>
                            <p>تصویر شغل</p>
                        </div>
                    <div class="col-md-12">
                        <hr>
                        <p>تصویر  : </p>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="{{ url(env('Image_employment_items_path') . $employment_items->image)}}">
                        </div>
                    </div>

                </div>
            @endif
        </div>
    </div>
    <a href="{{route('admin.employments.index')}}" class="btn btn-dark mt-5 mr-3">بازگشت</a>

@endsection
