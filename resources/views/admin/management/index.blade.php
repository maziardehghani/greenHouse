@extends('admin.layouts.admin')
@section('title' , 'users index')
@section('content')

    @if(session('msg'))
        {!! session('msg') !!}
    @endif
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-md-5">
            <div class="d-flex justify-content-between mb-4">
                <h5 class="font-weight-bold">لیست مدیران<span class="badge badge-primary">{{count($admin)}}</span> </h5>
            </div>

            <div>
                <table class="table table-bordered table-striped text-center">

                    <thead>
                    <tr>
                        <th>عدد</th>
                        <th>تلفن</th>
                        <th class="col-2">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($admin as $item)
                        <tr>
                            <th>
                                {{$loop->index+1}}
                            </th>
                            <th>
                                {{$item->cellphone}}
                            </th>
                            <th class="row">
                                <a href="{{route('admin.management.edit' , ['management' => $item->id])}}" class="btn btn-info text-right"> نمایش </a>
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

        </div>
    </div>


    @endsection
