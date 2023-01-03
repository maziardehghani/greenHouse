
@extends('home.layouts.home')
@section('title' , 'user_panel')

@section('script')
    <script>
        $('#personal_info_sidebar').click(function () {
            $('#personal_info').toggle();
            $('#my_exams').hide();
        })
        $('#my_exams_sidebar').click(function () {
            $('#my_exams').toggle();
            $('#personal_info').hide();
        })
    </script>
    @endsection
@section('content')
    @if(session('msg'))
        {!! session('msg') !!}
    @endif

        <div class="container">
            <div class="row mb-5">
                <div class="col-xl-3 col-lg-4 col-md-5 mb-md-0 mb-4">
                    <div class="ui-sticky ui-sticky-top">
                        <div class="profile-user-info py-3 ui-box bg-white">
                            <div class="profile-detail">
                                <div class="d-flex align-items-center">
                                    <div class="profile-info">
                                        <a href="#" class="text-decoration-none text-dark fw-bold mb-2">{{$user_signUp ? $user_signUp->nameFamily :'' }}</a>
                                        <div class="text-muted fs-7 fw-bold">@if(!is_null($employment_item)){{$employment_item->parent->title}}@else{{' '}}@endif/@if(!is_null($employment_item)){{$employment_item->title}}@else {{'ثبت نام نشده'}}@endif</div>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-items-with-icon flex-column">
                                @if(!is_null($user_signUp))
                                <li class="nav-item">
                                    <a id="my_exams_sidebar"  class="nav-link" href="#"><i class="nav-link-icon ri-file-list-3-line"></i>
                                       آزمون های من
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a id="personal_info_sidebar" class="nav-link" href="#"><i class="nav-link-icon ri-user-line"></i> اطلاعات
                                       حساب</a>
                                </li>
                                @endif

                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('logout')}}"><i class="nav-link-icon ri-logout-box-r-line"></i>
                                        خروج</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                @if(!is_null($user_signUp))
                <div id="personal_info" class="col-xl-9 col-lg-8 col-md-7" style="display: none" >

                    <div class="ui-box bg-white mb-5">
                        <div class="ui-box-title">اطلاعات شخصی</div>
                        <div class="ui-box-content">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <div class="border-bottom py-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-7 fw-bold text-dark">نام و نام خانودگی </div>
                                            <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="full_name-modal"><i
                                                    class="ri-ball-pen-fill"></i></button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted">{{$user_signUp ? $user_signUp->nameFamily : 'وارد نشده'}}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="border-bottom py-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-7 fw-bold text-dark">کد ملی(ده رقمی) </div>
                                            <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="code_meli-modal"><i
                                                    class="ri-ball-pen-fill"></i></button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted">{{$user_signUp ? $user_signUp->code_meli : 'وارد نشده'}}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="border-bottom py-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-7 fw-bold text-dark">شماره شناسنامه</div>
                                            <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="shomare_shenasname-modal"><i
                                                    class="ri-ball-pen-fill"></i></button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted">{{$user_signUp ? $user_signUp->shomare_shenasname : 'وارد نشده'}}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="border-bottom py-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-7 fw-bold text-dark">محل صدور</div>
                                            <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="sodoor_place-modal"><i
                                                    class="ri-ball-pen-fill"></i></button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted">{{$user_signUp ? $user_signUp->sodoor_place : 'وارد نشده'}}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="border-bottom py-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-7 fw-bold text-dark">تاریخ تولد</div>
                                            <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="born_date-modal"><i
                                                    class="ri-ball-pen-fill"></i></button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted">{{$user_signUp ? $user_signUp->born_date : 'وارد نشده'}}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="border-bottom py-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-7 fw-bold text-dark">محل تولد</div>
                                            <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="born_place-modal"><i
                                                    class="ri-ball-pen-fill"></i></button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted">{{$user_signUp ? $user_signUp->born_place : 'وارد نشده'}}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="border-bottom py-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-7 fw-bold text-dark">ملیت</div>
                                            <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="nationality-modal"><i
                                                    class="ri-ball-pen-fill"></i></button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted">{{$user_signUp ? $user_signUp->nationality : 'وارد نشده'}}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="border-bottom py-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-7 fw-bold text-dark">دین</div>
                                            <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="religion-modal"><i
                                                    class="ri-ball-pen-fill"></i></button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted">{{$user_signUp ? $user_signUp->religion : 'وارد نشده'}}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="border-bottom py-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-7 fw-bold text-dark">مذهب</div>
                                            <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="faith-modal"><i
                                                    class="ri-ball-pen-fill"></i></button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted">{{$user_signUp ? $user_signUp->faith : 'وارد نشده'}}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="border-bottom py-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-7 fw-bold text-dark">وضعیت نظام وظیفه:</div>
                                            <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="military-modal"><i
                                                    class="ri-ball-pen-fill"></i></button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted">{{$user_signUp ? $user_signUp->military : 'وارد نشده'}}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="border-bottom py-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-7 fw-bold text-dark">نوع معافیت</div>
                                            <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="dismiss-modal"><i
                                                    class="ri-ball-pen-fill"></i></button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted">{{$user_signUp ? $user_signUp->dismiss : 'وارد نشده'}}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="border-bottom py-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-7 fw-bold text-dark">وضعیت تاهل:</div>
                                            <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="marriage-modal"><i
                                                    class="ri-ball-pen-fill"></i></button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted">{{$user_signUp ? $user_signUp->marriage : 'وارد نشده'}}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="border-bottom py-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-7 fw-bold text-dark">تعداد فرزند</div>
                                            <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="child_count-modal"><i
                                                    class="ri-ball-pen-fill"></i></button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted">{{$user_signUp ? $user_signUp->child_count : 'وارد نشده'}}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="border-bottom py-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-7 fw-bold text-dark">وضعیت تحصیلی :</div>
                                            <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="education-modal"><i
                                                    class="ri-ball-pen-fill"></i></button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted">{{$user_signUp ? $user_signUp->education : 'وارد نشده'}}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="border-bottom py-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-7 fw-bold text-dark">رشته تحصیلی :</div>
                                            <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="speciality-modal"><i
                                                    class="ri-ball-pen-fill"></i></button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted">{{$user_signUp ? $user_signUp->speciality : 'وارد نشده'}}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="border-bottom py-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-7 fw-bold text-dark">مکان تحصیل :</div>
                                            <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="education_place-modal"><i
                                                    class="ri-ball-pen-fill"></i></button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted">{{$user_signUp ? $user_signUp->education_place : 'وارد نشده'}}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="border-bottom py-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-7 fw-bold text-dark">سوابق ایثار گری</div>
                                            <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="issar-modal"><i
                                                    class="ri-ball-pen-fill"></i></button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted">{{$user_signUp ? $user_signUp->issar : 'وارد نشده'}}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="border-bottom py-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-7 fw-bold text-dark">نشانی محل دقیق سکونت</div>
                                            <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="address-modal"><i
                                                    class="ri-ball-pen-fill"></i></button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted">{{$user_signUp ? $user_signUp->address : 'وارد نشده'}}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="border-bottom py-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-7 fw-bold text-dark">کد پستی</div>
                                            <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="code_post-modal"><i
                                                    class="ri-ball-pen-fill"></i></button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted">{{$user_signUp ? $user_signUp->code_post : 'وارد نشده'}}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="border-bottom py-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-7 fw-bold text-dark">شماره تلفن همراه</div>
                                            <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="phone-modal"><i
                                                    class="ri-ball-pen-fill"></i></button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted">{{$user_signUp ? $user_signUp->phone : 'وارد نشده'}}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="border-bottom py-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-7 fw-bold text-dark">رتبه علمی</div>
                                            <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="awards-modal"><i
                                                    class="ri-ball-pen-fill"></i></button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted">{{$user_signUp ? $user_signUp->awards : 'وارد نشده'}}</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div id="my_exams" class="col-xl-9 col-lg-8 col-md-7" style="display: none">

                    <div class="card text-center mb-5">

                        <h6 class="card-header">
                            آزمون {{$employment_item ? $employment_item->parent->title : "وارد نشده" }}
                        </h6>
                        <div class="card-body">
                            <div class="card-title">
                                کاربر گرامی <strong>{{$user_signUp->name }}</strong> <strong>{{$user_signUp->family }}</strong> شما میتوانید در آزمون شرکت کنید
                            </div>
                            <p class="card-text lead">
                                زمان آزمون شما در تاریخ <span>{{verta($employment_item->exam_date)->year.'/'.verta($employment_item->exam_date)->month.'/'.verta($employment_item->exam_date)->day}}</span>در ساعت  <span>{{verta($employment_item->exam_date)->hour}}:@if(verta($employment_item->exam_date)->minute == 0){{'00'}}@else{{verta($employment_item->exam_date)->minute}}@endif</span>میباشد
                            </p>
                            @if(verta($employment_item->exam_date)->timestamp < verta()->timestamp&& verta()->timestamp < verta($employment_item->exam_date)->timestamp+($employment_item->exam_time*60))
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
                                نتایج آزمون سه روز بعد در تاریخ <span>--</span>   به اطلاع شرکت کنندگان میرسد
                            </p>
                        </div>
                    </div>
                </div>
            @endif
            </div>
        </div>
        <!-- start of personal-info-fullname-modal -->

            <div class="remodal remodal-xs" data-remodal-id="full_name-modal"
                 data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <div class="remodal-title">نام و نام خانوادگی</div>
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <form action="{{route('user_panel.update') }}" method="post">
                    @csrf

                    <input name="fieldName" type="hidden" class="form-control" value="nameFamily">

                    <div class="remodal-content">
                    <div class="form-element-row mb-3">
                        <label class="label fs-7">نام</label>
                        <input name="nameFamily" type="text" class="form-control" placeholder="نام">
                    </div>
                </div>
                <div class="remodal-footer">
                    <button type="submit" class="btn btn-sm btn-primary px-3">ثبت اطلاعات</button>
                </div>
                </form>
            </div>

        <!-- end of personal-info-fullname-modal -->

        <!-- start of personal-info-phone-number-modal -->
        <div class="remodal remodal-xs" data-remodal-id="gender-modal"
             data-remodal-options="hashTracking: false">
            <div class="remodal-header">
                <div class="remodal-title">جنسیت</div>
                <button data-remodal-action="close" class="remodal-close"></button>
            </div>
            <form action="{{route('user_panel.update') }}" method="post">
                @csrf
                <input name="fieldName" type="hidden" class="form-control" value="gender">
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <select name="gender"  class="form-control">
                        <option value="0">مرد</option>
                        <option value="1">زن</option>
                    </select>
                </div>
            </div>
            <div class="remodal-footer">
                <button class="btn btn-sm btn-primary px-3"> ثبت اطلاعات </button>
            </div>
            </form>
        </div>
        <!-- end of personal-info-phone-number-modal -->

    <!-- start of personal-info-phone-number-modal -->
    <div class="remodal remodal-xs" data-remodal-id="born_place-modal"
         data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">محل تولد</div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <form  action="{{route('user_panel.update') }}" method="post">
            @csrf
            <input name="fieldName" type="hidden" class="form-control" value="born_place">
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <input name="born_place" type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="remodal-footer">
                <button class="btn btn-sm btn-primary px-3"> ثبت اطلاعات </button>
            </div>
        </form>
    </div>
    <!-- end of personal-info-phone-number-modal -->

    <!-- start of personal-info-phone-number-modal -->
    <div class="remodal remodal-xs" data-remodal-id="shomare_shenasname-modal"
         data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">شماره شناسنامه</div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <form  action="{{route('user_panel.update') }}" method="post">
            @csrf
            <input name="fieldName" type="hidden" class="form-control" value="shomare_shenasname">
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <input name="shomare_shenasname" type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="remodal-footer">
                <button class="btn btn-sm btn-primary px-3"> ثبت اطلاعات </button>
            </div>
        </form>
    </div>
    <!-- end of personal-info-phone-number-modal -->

    <!-- start of personal-info-phone-number-modal -->
    <div class="remodal remodal-xs" data-remodal-id="sodoor_place-modal"
         data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">محل صدور</div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <form  action="{{route('user_panel.update') }}" method="post">
            @csrf
            <input name="fieldName" type="hidden" class="form-control" value="sodoor_place">
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <input name="sodoor_place" type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="remodal-footer">
                <button class="btn btn-sm btn-primary px-3"> ثبت اطلاعات </button>
            </div>
        </form>
    </div>
    <!-- end of personal-info-phone-number-modal -->

    <!-- start of personal-info-phone-number-modal -->
    <div class="remodal remodal-xs" data-remodal-id="born_date-modal"
         data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">تاریخ تولد</div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <form  action="{{route('user_panel.update') }}" method="post">
            @csrf
            <input name="fieldName" type="hidden" class="form-control" value="born_date">
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <input name="born_date" type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="remodal-footer">
                <button class="btn btn-sm btn-primary px-3"> ثبت اطلاعات </button>
            </div>
        </form>
    </div>
    <!-- end of personal-info-phone-number-modal -->


    <!-- start of personal-info-phone-number-modal -->
    <div class="remodal remodal-xs" data-remodal-id="born_place-modal"
         data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">محل تولد</div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <form  action="{{route('user_panel.update') }}" method="post">
            @csrf
            <input name="fieldName" type="hidden" class="form-control" value="born_place">
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <input name="born_place" type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="remodal-footer">
                <button class="btn btn-sm btn-primary px-3"> ثبت اطلاعات </button>
            </div>
        </form>
    </div>
    <!-- end of personal-info-phone-number-modal -->


    <!-- start of personal-info-phone-number-modal -->
    <div class="remodal remodal-xs" data-remodal-id="nationality-modal"
         data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">ملیت</div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <form  action="{{route('user_panel.update') }}" method="post">
            @csrf
            <input name="fieldName" type="hidden" class="form-control" value="nationality">
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <input name="nationality" type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="remodal-footer">
                <button class="btn btn-sm btn-primary px-3"> ثبت اطلاعات </button>
            </div>
        </form>
    </div>
    <!-- end of personal-info-phone-number-modal -->

    <!-- start of personal-info-phone-number-modal -->
    <div class="remodal remodal-xs" data-remodal-id="religion-modal"
         data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">دین</div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <form  action="{{route('user_panel.update') }}" method="post">
            @csrf
            <input name="fieldName" type="hidden" class="form-control" value="religion">
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <input name="religion" type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="remodal-footer">
                <button class="btn btn-sm btn-primary px-3"> ثبت اطلاعات </button>
            </div>
        </form>
    </div>
    <!-- end of personal-info-phone-number-modal -->


    <!-- start of personal-info-phone-number-modal -->
    <div class="remodal remodal-xs" data-remodal-id="religion-modal"
         data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">دین</div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <form  action="{{route('user_panel.update') }}" method="post">
            @csrf
            <input name="fieldName" type="hidden" class="form-control" value="religion">
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <input name="religion" type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="remodal-footer">
                <button class="btn btn-sm btn-primary px-3"> ثبت اطلاعات </button>
            </div>
        </form>
    </div>
    <!-- end of personal-info-phone-number-modal -->


    <!-- start of personal-info-phone-number-modal -->
    <div class="remodal remodal-xs" data-remodal-id="speciality-modal"
         data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">رشته تحصیلی</div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <form  action="{{route('user_panel.update') }}" method="post">
            @csrf
            <input name="fieldName" type="hidden" class="form-control" value="speciality">
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <input name="speciality" type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="remodal-footer">
                <button class="btn btn-sm btn-primary px-3"> ثبت اطلاعات </button>
            </div>
        </form>
    </div>
    <!-- end of personal-info-phone-number-modal -->
    \


    <!-- start of personal-info-phone-number-modal -->
    <div class="remodal remodal-xs" data-remodal-id="education_place-modal"
         data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">مکان تحصیلی</div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <form  action="{{route('user_panel.update') }}" method="post">
            @csrf
            <input name="fieldName" type="hidden" class="form-control" value="education_place">
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <input name="education_place" type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="remodal-footer">
                <button class="btn btn-sm btn-primary px-3"> ثبت اطلاعات </button>
            </div>
        </form>
    </div>

    <!-- start of personal-info-phone-number-modal -->
    <div class="remodal remodal-xs" data-remodal-id="code_meli-modal"
         data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">کد ملی(ده رقمی) </div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <form  action="{{route('user_panel.update') }}" method="post">
            @csrf
            <input name="fieldName" type="hidden" class="form-control" value="code_meli">
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <input name="code_meli" type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="remodal-footer">
                <button class="btn btn-sm btn-primary px-3"> ثبت اطلاعات </button>
            </div>
        </form>
    </div>
    <!-- end of personal-info-phone-number-modal -->


    <!-- start of personal-info-phone-number-modal -->
    <div class="remodal remodal-xs" data-remodal-id="military-modal"
         data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">وضعیت نظام وظیفه:</div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <form action="{{route('user_panel.update') }}" method="post">
            @csrf
            <input name="fieldName" type="hidden" class="form-control" value="military">
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <select name="military"  class="form-control">
                        <option value="0">-</option>
                        <option value="1">معاف</option>
                        <option value="2">مشمول</option>
                    </select>
                </div>
            </div>
            <div class="remodal-footer">
                <button class="btn btn-sm btn-primary px-3"> ثبت اطلاعات </button>
            </div>
        </form>
    </div>
    <!-- end of personal-info-phone-number-modal -->

    <!-- start of personal-info-phone-number-modal -->
    <div class="remodal remodal-xs" data-remodal-id="marriage-modal"
         data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">وضعیت تاهل:</div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <form action="{{route('user_panel.update') }}" method="post">
            @csrf
            <input name="fieldName" type="hidden" class="form-control" value="marriage">
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <select name="marriage"  class="form-control">
                        <option value="0">-</option>
                        <option value="1">مجرد</option>
                        <option value="2">متاهل</option>
                        <option value="3">متارکه</option>
                        <option value="4">فوت همسر</option>
                    </select>
                </div>
            </div>
            <div class="remodal-footer">
                <button class="btn btn-sm btn-primary px-3"> ثبت اطلاعات </button>
            </div>
        </form>
    </div>
    <!-- end of personal-info-phone-number-modal -->

    <!-- start of personal-info-phone-number-modal -->
    <div class="remodal remodal-xs" data-remodal-id="education-modal"
         data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">وضعیت تحصیلی :</div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <form action="{{route('user_panel.update') }}" method="post">
            @csrf
            <input name="fieldName" type="hidden" class="form-control" value="education">
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <select name="education"  class="form-control">
                        <option value="0">-</option>
                        <option value="1">زیر دیپلم</option>
                        <option value="2">متوسطه</option>
                        <option value="3">دیپلم</option>
                        <option value="4">پیش دانشگاهی</option>
                        <option value="5">فوق دیپلم</option>
                        <option value="6">لیسانس</option>
                        <option value="7">فوق لیسانس</option>
                        <option value="8">دکتری</option>
                        <option value="9">دکتری تخصصی /فوق دکتری</option>
                    </select>
                </div>
            </div>
            <div class="remodal-footer">
                <button class="btn btn-sm btn-primary px-3"> ثبت اطلاعات </button>
            </div>
        </form>
    </div>
    <!-- end of personal-info-phone-number-modal -->


    <!-- start of personal-info-phone-number-modal -->
    <div class="remodal remodal-xs" data-remodal-id="issar-modal"
         data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">سوابق ایثار گری</div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <form action="{{route('user_panel.update') }}" method="post">
            @csrf
            <input name="fieldName" type="hidden" class="form-control" value="issar">
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <select name="issar"  class="form-control">
                        <option value="0">هیچکدام</option>
                        <option value="1">جانباز</option>
                        <option value="2">آزاده</option>
                        <option value="3">خوانواده ایثارگران</option>
                    </select>
                </div>
            </div>
            <div class="remodal-footer">
                <button class="btn btn-sm btn-primary px-3"> ثبت اطلاعات </button>
            </div>
        </form>
    </div>
    <!-- end of personal-info-phone-number-modal -->

    <!-- start of personal-info-phone-number-modal -->
    <div class="remodal remodal-xs" data-remodal-id="address-modal"
         data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">نشانی محل دقیق سکونت </div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <form  action="{{route('user_panel.update') }}" method="post">
            @csrf
            <input name="fieldName" type="hidden" class="form-control" value="address">
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <textarea name="address"  class="form-control" placeholder=""></textarea>
                </div>
            </div>
            <div class="remodal-footer">
                <button class="btn btn-sm btn-primary px-3"> ثبت اطلاعات </button>
            </div>
        </form>
    </div>
    <!-- end of personal-info-phone-number-modal -->


    <!-- start of personal-info-phone-number-modal -->
    <div class="remodal remodal-xs" data-remodal-id="code_post-modal"
         data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">کد پستی </div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <form  action="{{route('user_panel.update') }}" method="post">
            @csrf
            <input name="fieldName" type="hidden" class="form-control" value="code_post">
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <input name="code_post" type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="remodal-footer">
                <button class="btn btn-sm btn-primary px-3"> ثبت اطلاعات </button>
            </div>
        </form>
    </div>
    <!-- end of personal-info-phone-number-modal -->

    <!-- start of personal-info-phone-number-modal -->
    <div class="remodal remodal-xs" data-remodal-id="phone-modal"
         data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">شماره تلفن همراه </div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <form  action="{{route('user_panel.update') }}" method="post">
            @csrf
            <input name="fieldName" type="hidden" class="form-control" value="phone">
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <input name="phone" type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="remodal-footer">
                <button class="btn btn-sm btn-primary px-3"> ثبت اطلاعات </button>
            </div>
        </form>
    </div>
    <!-- end of personal-info-phone-number-modal -->

    <!-- start of personal-info-phone-number-modal -->
    <div class="remodal remodal-xs" data-remodal-id="awards-modal"
         data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">رتبه علمی</div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <form  action="{{route('user_panel.update') }}" method="post">
            @csrf
            <input name="fieldName" type="hidden" class="form-control" value="awards">
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <textarea name="awards" class="form-control" placeholder=""></textarea>
                </div>
            </div>
            <div class="remodal-footer">
                <button class="btn btn-sm btn-primary px-3"> ثبت اطلاعات </button>
            </div>
        </form>
    </div>
    <!-- end of personal-info-phone-number-modal -->

    <!-- start of personal-info-phone-number-modal -->
    <div class="remodal remodal-xs" data-remodal-id="dismiss-modal"
         data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">نوع معافیت</div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <form  action="{{route('user_panel.update') }}" method="post">
            @csrf
            <input name="fieldName" type="hidden" class="form-control" value="dismiss">
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <input name="dismiss" type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="remodal-footer">
                <button class="btn btn-sm btn-primary px-3"> ثبت اطلاعات </button>
            </div>
        </form>
    </div>
    <!-- end of personal-info-phone-number-modal -->


    <!-- start of personal-info-phone-number-modal -->
    <div class="remodal remodal-xs" data-remodal-id="child_count-modal"
         data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">تعداد فرزندان</div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <form  action="{{route('user_panel.update') }}" method="post">
            @csrf
            <input name="fieldName" type="hidden" class="form-control" value="child_count">
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <input name="child_count" type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="remodal-footer">
                <button class="btn btn-sm btn-primary px-3"> ثبت اطلاعات </button>
            </div>
        </form>
    </div>
    <!-- end of personal-info-phone-number-modal -->


@endsection
