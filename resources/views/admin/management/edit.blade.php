@extends('admin.layouts.admin')
@section('title' , 'management edit')
@section('content')
    <!-- Content Row -->
    @if(session('msg'))
        {!! session('msg') !!}
    @endif
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4 p-md-5 ">
            <div class="mb-4">
                <h5 class="font-weight-bold">
                    ویرایش سطح کاربران
                </h5>
            </div>
            <hr>
            @include('admin.sections.errors')
            <form action="{{route('admin.management.update' , ['management' => $management->id])}}" method="post">
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-3 mt-4">
                        <label for="cellphone">شماره تلفن</label>
                        <input class="form-control" id="cellphone" name="cellphone" type="text"  value="{{$management->cellphone}}" >
                    </div>
                    <div class="form-group col-md-3 mt-4">
                        <label for="name">سطح</label>
                        <select name="level" class="form-control">
                            <option {{$management->level==1?'selected' : ''}} value="1">کاربر</option>
                            <option {{$management->level==2?'selected' : ''}} value="2">ادمین</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn btn-outline-primary mt-5" type="submit"> ثبت </button>
                <a href="{{route('admin.management.index')}}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>
    </div>
@endsection
