@extends('admin.layouts.admin')
@section('title' , 'jobseekers index')
@section('script')
    <script>
        $('.hide-row').hide();
        $('#btn_full_info').click(function () {
            $('.hide-row').toggle();
        })
    </script>
    @endsection
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
                        <th>نام و نام خانوادگی</th>
                        <th class="bg-primary text-white"> نمره</th>
                        <th>تلفن</th>
                        <th>تاریخ تولد</th>
                        <th>ثوابق ایثار گری</th>
                        <th>وضعیت تحصیلی</th>
                        <th class="hide-row">کد ملی</th>
                        <th class="hide-row">شماره شناسنامه</th>
                        <th class="hide-row">محل صدور</th>
                        <th class="hide-row">محل تولد</th>
                        <th class="hide-row">ملیت</th>
                        <th class="hide-row">دین</th>
                        <th class="hide-row">مذهب</th>
                        <th class="hide-row">وضعیت نظام وظیفه</th>
                        <th class="hide-row">نوع معافیت</th>
                        <th class="hide-row">وضعیت تاهل</th>
                        <th class="hide-row">تعداد فرزند</th>
                        <th class="hide-row">رشته تحصیلی </th>
                        <th class="hide-row">مکان تحصیل </th>
                        <th class="hide-row">نشانی محل دقیق سکونت</th>
                        <th class="hide-row">کد پستی</th>
                        <th class="hide-row">رتبه علمی</th>
                        <th class="col-2">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($jobseekers as $item)
                        <tr>
                            <th>
                                {{$loop->index+1}}
                            </th>
                            <th>
                                <a id="btn_full_info" href="#" class="btn">  {{$item->nameFamily}} </a>
                            </th>
                            <th class="bg-primary text-white">
                                {{$item->grade}}
                            </th>
                            <th>
                                {{$item->phone}}
                            </th>
                            <th>
                                {{$item->born_date}}
                            </th>
                            <th>
                                {{$item->issar}}
                            </th>
                            <th>
                                {{$item->education}}
                            </th>
                            <th class="hide-row">
                                {{$item->code_meli}}
                            </th>
                            <th class="hide-row">
                                {{$item->shomare_shenasname}}
                            </th>
                            <th class="hide-row">
                                {{$item->sodoor_place}}
                            </th>
                            <th class="hide-row">
                                {{$item->born_place}}
                            </th>
                            <th class="hide-row">
                                {{$item->nationality}}
                            </th>
                            <th class="hide-row">
                                {{$item->religion}}
                            </th>
                            <th class="hide-row">
                                {{$item->faith}}
                            </th>
                            <th class="hide-row">
                                {{$item->military}}
                            </th>
                            <th class="hide-row">
                                {{$item->dismiss}}
                            </th>
                            <th class="hide-row">
                                {{$item->marriage}}
                            </th>
                            <th class="hide-row">
                                {{$item->child_count}}
                            </th>
                            <th class="hide-row">
                                {{$item->education}}
                            </th>
                            <th class="hide-row">
                                {{$item->education_place}}
                            </th>
                            <th class="hide-row">
                                {{$item->address}}
                            </th>
                            <th class="hide-row">
                                {{$item->code_post}}
                            </th>
                            <th class="hide-row">
                                {{$item->awards}}
                            </th>
                            <th>
                                <a href="{{route('admin.jobseekers.edit', $item->user_id)}}" type="button" class="btn btn-outline-info btn-block">
                                    تصحیح آزمون
                                </a>
                            </th>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-5">
                <a href="{{route('admin.jobseekers.index')}}" class="btn btn-dark mt-5 mr-3">بازگشت</a>

            </div>
        </div>
        <div class="d-flex justify-content-center mt-5">
            {{ $jobseekers->render() }}
        </div>
    </div>
@endsection
