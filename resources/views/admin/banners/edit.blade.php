@extends('admin.layouts.admin')
@section('title' , 'employments items create')
@section('script')
    <script>
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
                    ویرایش بنر
                </h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{route('admin.banners.update' , $banner->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-3 mt-4">
                        <label for="link"> عنوان بنر</label>
                        <input class="form-control" id="link" name="link" type="text" value="{{$banner->link}}" >
                    </div>


                    <div class="form-group col-md-3 mt-4">
                        <label for="is_active">وضعیت </label>
                        <select class="form-control" id="is_active" name="is_active" >
                            @if($banner->getRawOriginal('is_active')==1)
                            <option value="1" selected>فعال</option>
                            <option value="0">غیر فعال</option>
                                @else
                                <option value="1">فعال</option>
                                <option value="0" selected>غیر فعال</option>
                                @endif
                        </select>
                    </div>
                    <div class="col-md-12 mt-4">
                        <hr>
                        <p>تصویر</p>
                    </div>
                    <div class="form-group col-md-3 mt-4">
                        <label for="image"> انتخاب تصویر :</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="image" value="{{$banner->image}}">
                            <label class="custom-file-label text-truncate" for="image">{{$banner->image}}</label>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 mt-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ url(env('Image_banners') . $banner->image)}}">
                    </div>
                </div>
                <button class="btn btn btn-outline-primary mt-5" type="submit"> ثبت </button>
                <a href="{{route('admin.banners.index')}}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>
    </div>
@endsection
