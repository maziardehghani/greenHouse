
@extends('home.layouts.home')
@section('title' , 'examInformation')
@section('content')
    @if(session('msg'))
        {!! session('msg') !!}
    @endif
<hr>
<div class="container bg-light"  >
    <div class="card text-center mb-5">

        <h6 class="card-header">
            آزمون {{$employment_item->parent->title}}
        </h6>
        <div class="card-body">
            <div class="card-title">
                کاربر گرامی <strong>{{$userInfo->name }}</strong> <strong>{{$userInfo->family }}</strong> شما میتوانید در آزمون شرکت کنید
            </div>
            <p class="card-text lead">
                زمان آزمون شما در تاریخ <span>{{verta($employment_item->exam_date)->year.'/'.verta($employment_item->exam_date)->month.'/'.verta($employment_item->exam_date)->day}}</span>در ساعت  <span>{{verta($employment_item->exam_date)->hour}}:@if(verta($employment_item->exam_date)->minute == 0){{'00'}}@else{{verta($employment_item->exam_date)->minute}}@endif</span>میباشد
            </p>
            @if(verta($employment_item->exam_date)->timestamp < verta()->timestamp && verta()->timestamp < verta($employment_item->exam_date)->timestamp+($employment_item->exam_time*60))
            <a href="{{route('home.exam')}}" class="btn btn-warning " > شرکت در آزمون </a>
                @else
                <a href="{{route('home.exam')}}" class="btn btn-warning disabled" > شرکت در آزمون </a>
                @endif
        </div>

    </div>
    <div class="card text-center mb-5">

        <div class="card-body">
            <h4 class="card-title">
                اطلاعات آزمون
            </h4>
            <p class="card-text ">
                آزمون دارای <span>{{$exam_count}}</span> سوال تستی میباشد
            </p>
            <p class="card-text ">
                مدت زمان آزمون <span>{{$employment_item->exam_time}}</span> دقیقه است
            </p>
            <p class="card-text ">
                امکان برگزاری دوباره آزمون وجود ندارد
            </p>
            <p class="card-text ">
                قبل از به پایان رسیدن زمان ازمون روی دکمه پایان بزنید
            </p>
            <p class="card-text ">
                نتایج آزمون سه روز بعد به اطلاع شرکت کنندگان میرسد
            </p>
        </div>

    </div>
</div>
@endsection
