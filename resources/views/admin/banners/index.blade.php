@extends('admin.layouts.admin')
@section('title' , 'employments items index')
@section('content')

    @if(session('msg'))
        {!! session('msg') !!}
    @endif
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-md-5">
            <div class="d-flex justify-content-between mb-4">
                <h5 class="font-weight-bold">بنر ها  <span class="badge badge-primary">{{count($banners)}}</span> </h5>
                <a class="btn btn-sm btn-outline-primary" href="{{route('admin.banners.create')}}">
                    <i class="fa fa-plus"></i>
                    افزودن بنر
                </a>
            </div>

            <div>
                <table class="table table-bordered table-striped text-center">

                    <thead>
                    <tr>
                        <th>عدد</th>
                        <th>نام</th>
                        <th>وضعیت</th>
                        <th>تصویر</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($banners as $item)
                        <tr>
                            <th>
                                {{$loop->index+1}}
                            </th>
                            <th>
                                {{$item->link}}
                            </th>
                            <th>
                              <span class="{{$item->getRawOriginal('is_active')?'text-success': 'text-danger'}} font-weight-bold h5"><strong>{{$item->is_active}}</strong></span>
                            </th>
                            <th class="col-md-4">
                                <div class="col-md-12">
                                    <div class="card align-items-center overlay">
                                        <a href=" {{url(env('Image_banners').$item->image)}}">
                                            <img class="card-img " src=" {{url(env('Image_banners').$item->image)}}">
                                        </a>
                                    </div>
                                </div>
                            </th>
                            <th class="col-md-2">
                                <button class="btn btn-outline-info btn-block mt-4">
                                    <a href="{{route('admin.banners.edit', $item->id)}}"> ویرایش </a>
                                </button>
                                <form action="{{route('admin.banners.destroy' , $item->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-block mt-4">
                                         حذف
                                    </button>
                                </form>
                            </th>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-5">
            {{$banners->render()}}
        </div>
    </div>


    @endsection
