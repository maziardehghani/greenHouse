@extends('admin.layouts.admin')
@section('title' , 'settings index')
@section('script')
    <script>
        $('#image').change(function () {

            var fileName = $(this).val();
            $(this).next('.custom-file-label').html(fileName);
        })

    </script>
@endsection
@section('content')

    @if(session('msg'))
        {!! session('msg') !!}
    @endif
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-md-5">
            <form action="{{route('admin.settings.update' , 1)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <table class="table table-bordered table-striped text-center">

                    <thead>
                    <tr>
                        <th>تلفن دفتر</th>
                        <th>شماره واتساپ</th>
                        <th>آدرس دفتر</th>
                        <th>ایمیل</th>
                        <th>شماره حساب</th>
                        <th>ایدی تلگرام</th>
                        <th>ایدی اینستگرام</th>
                        <th> هزینه آزمون (ريال)</th>
                        <th>لوگو</th>
                    </tr>
                    </thead>
                    <tbody>




                        @foreach($settings as $item)
                            <tr>

                                <th>
                                    <input class="form-control"  name="phone" type="text" value=" {{$item->phone}}">
                                </th>
                                <th>
                                    <input class="form-control"  name="whatsapp_number" type="text" value=" {{$item->whatsapp_number }}">
                                </th>
                                <th>
                                    <input class="form-control"  name="address" type="text" value=" {{$item->address }}">
                                </th>
                                <th>
                                    <input class="form-control"  name="email" type="text" value=" {{$item->email }}">
                                </th>
                                <th>
                                    <input class="form-control"  name="trans_code" type="text" value=" {{$item->trans_code }}">
                                </th>
                                <th>
                                    <input class="form-control"  name="telegram_id" type="text" value=" {{$item->telegram_id }}">
                                </th>
                                <th>
                                    <input class="form-control"  name="instagram_id" type="text" value="  {{$item->instagram_id }}">
                                </th>
                                <th>
                                    <input class="form-control"  name="exam_cost" type="text" value="  {{$item->exam_cost }}">
                                </th>
                                <th class="col-2">
                                    <div>
                                        <div class="card">
                                            <a href="{{url(env('logo').$item->logo)}}">
                                                <img class="card-img-top" src="{{url(env('logo').$item->logo)}}">
                                            </a>

                                        </div>
                                    </div>
                                </th>
                            </tr>


                        @endforeach
                      </tbody>
                </table>
                <div class="col-md-12 mt-4">
                    <hr>
                    <p>تصویر لوگو</p>
                </div>
                <div class="form-group col-md-3 mt-4">
                    <label for="image"> انتخاب تصویر :</label>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="image">
                        <label class="custom-file-label" for="image"> انتخاب فایل </label>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button type="submit" class="btn btn-primary text-right"> ویرایش </button>
                </div>
            </form>

        </div>
    </div>


    @endsection
