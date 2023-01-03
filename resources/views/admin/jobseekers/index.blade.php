@extends('admin.layouts.admin')
@section('title' , 'jobseekers index')
@section('content')

    @if(session('msg'))
        {!! session('msg') !!}
    @endif
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-md-5">
            <div>
                <table class="table table-bordered table-striped text-center">

                    <thead>
                    <tr>
                        <th>عدد</th>
                        <th>عنوان</th>
                        <th>وضعیت</th>

                        <th class="col-2">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($employment_items as $item)
                        <tr>
                            <th>
                                {{$loop->index+1}}
                            </th>
                            <th>
                                <a href="{{route('admin.jobseekers.show' , $item->id)}}">{{$item->title}}</a>
                            </th>
                            <th>
                                <span class="{{$item->getRawOriginal('is_active')?'text-success': 'text-danger'}} font-weight-bold h5"><strong>{{$item->is_active}}</strong></span>
                            </th>
                            <th class="row">
                                <form action="{{route('admin.jobseekers.destroy' , $item->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mr-2 "> حذف </button>
                                </form>
                            </th>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-5">
            </div>
        </div>
    </div>


    @endsection
