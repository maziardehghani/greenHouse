@extends('admin.layouts.admin')
@section('title' , 'employments items index')
@section('content')
{{--    --}}
    @if(session('msg'))
        {!! session('msg') !!}
    @endif
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-md-5">
            <div class="d-flex justify-content-between mb-4">
                <h5 class="font-weight-bold">استخدام ها  <span class="badge badge-primary">{{count($employment_items)}}</span> </h5>
                <a class="btn btn-sm btn-outline-primary" href="{{route('admin.exams.create')}}">
                    <i class="fa fa-plus"></i>
                    ایجاد آزمون جدید
                </a>
            </div>

            <div>
                <table class="table table-bordered table-striped text-center">

                    <thead>
                    <tr>
                        <th>عدد</th>
                        <th>نام</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employment_items as $item)

                        <tr>
                            <th>
                                {{$loop->index+1}}
                            </th>
                            <th>
                                {{$item->title}}
                            </th>
                            <th class="{{$item->getRawOriginal('is_active') ? 'text-success' : 'text-danger'}} font-weight-bold h5" >
                                {{$item->is_active}}
                            </th>
                            <th>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-info dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        عملیات
                                    </button>
                                    <div class="dropdown-menu">

                                        <a href="{{route('admin.exams.show', $item->id)}}"
                                           class="dropdown-item text-right"> نمایش آزمون</a>
                                        <a href="{{route('admin.exams.edit', $item->id)}}"
                                           class="dropdown-item text-right">ویرایش آزمون</a>
                                    </div>
                                </div>

                            </th>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-5">
            </div>
        </div>
        <div class="d-flex justify-content-center mt-5">
            {{ $employment_items->render() }}
        </div>
    </div>


    @endsection
