
@extends('home.layouts.home')
@section('title' , 'signUpExam')
@section('script')
    <script>
        $('#agreement').click(function () {
            $('#btnSignUp').toggleClass('disabled');
        });
        $('#btnSignUp').click(function () {
            $('#form').submit();
        })

    </script>
@endsection
@section('content')

    <div class="container">
        @if(session('msg'))
            {!! session('msg') !!}
        @endif
        <div class="page-wrapper">
            <header class="page-mini-header py-4">
                <div class="d-flex justify-content-center">
                    <div class="logo-container">
                        <a href="#" class="logo"><img src="" width="120" alt=""></a>
                    </div>
                </div>
            </header>
            <main class="page-content page-auth">
                <!-- start of auth-container -->
                <div class="auth-container">
                    <div class="auth-title mb-3">ثبت نام آزمون</div>
                    <!-- start of auth-box -->
                </div>
            </main>
            <form id="form" action="{{route('home.signUp.store')}}" method="post" class="auth-form">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="ps-checkout__form">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-element-row mb-5">
                                        <label class="">نام و نام خانوادگی  *</label>
                                        <input name="name" class="form-control" type="text">
                                        @error('name')
                                        <div class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-element-row mb-5">
                                        <label class="">تلفن همراه*</label>
                                        <input name="phone" class="form-control" type="text">
                                        @error('phone')
                                        <div class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-element-row mb-5">
                                        <label class="">شماره شناسنامه*</label>
                                        <input name="shomare_shenasname" class="form-control" type="text">
                                        @error('shomare_shenasname')
                                        <div class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-element-row mb-5">
                                        <label class="">کد ملی(10 رقمی)*</label>
                                        <input name="code_meli" class="form-control" type="text">
                                        @error('code_meli')
                                        <div class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-element-row mb-5">
                                        <label class="">محل صدور*</label>
                                        <input name="sodoor_place" class="form-control" type="text">
                                        @error('sodoor_place')
                                        <div class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-element-row mb-5">
                                        <label class="">تاریخ تولد*</label>
                                        <input name="born_date" class="form-control" type="text">
                                        @error('born_date')
                                        <div class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-element-row mb-5">
                                        <label class="">محل تولد*</label>
                                        <input name="born_place" class="form-control" type="text">
                                        @error('born_place')
                                        <div class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-element-row mb-5">
                                        <label class="">ملیت*</label>
                                        <input name="nationality" class="form-control" type="text">
                                        @error('nationality')
                                        <div class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-element-row mb-5">
                                        <label class="">دین*</label>
                                        <input name="religion" class="form-control" type="text">
                                        @error('religion')
                                        <div class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-element-row mb-5">
                                        <label class="">مذهب*</label>
                                        <input name="faith" class="form-control" type="text">
                                        @error('faith')
                                        <div class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-element-row mb-5">
                                        <label class="">مدرک تحصیلی : *</label>
                                        <select name="education" class="form-control">
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
                                <div class="col-12 col-md-6">
                                    <div class="form-element-row mb-5">
                                        <label class="">رشته تحصیلی*</label>
                                        <input name="speciality" class="form-control" type="text">
                                        @error('speciality')
                                        <div class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-element-row mb-5">
                                        <label class="">مکان تحصیل*</label>
                                        <input name="education_place" class="form-control" type="text">
                                        @error('education_place')
                                        <div class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-element-row mb-5">
                                        <label class="">وضعیت تاهل: *</label>
                                        <select name="marriage" class="form-control">
                                            <option value="1">مجرد</option>
                                            <option value="2">متاهل</option>
                                            <option value="3">متارکه</option>
                                            <option value="4">فوت همسر</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-element-row mb-5">
                                        <label class="">تعداد فرزند (درصورت تاهل)*</label>
                                        <input name="child_count" class="form-control" type="text">
                                        @error('child_count')
                                        <div class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-element-row mb-5">
                                        <label class="">وضعیت نظام وظیفه:  *</label>
                                        <select name="military" class="form-control">
                                            <option value="1">معاف</option>
                                            <option value="2">مشمول</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-element-row mb-5">
                                        <label class="">نوع معافیت (درصورت معافیت)*</label>
                                        <input name="dismiss" class="form-control" type="text">
                                        @error('dismiss')
                                        <div class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-element-row mb-5">
                                        <label class="">سوابق ایثار گری:  *</label>
                                        <select name="issar" class="form-control">
                                            <option value="0">هیچکدام</option>
                                            <option value="1">جانباز</option>
                                            <option value="2">آزاده</option>
                                            <option value="3">خوانواده ایثارگران</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-element-row mb-5">
                                        <label class="">نشانی محل دقیق سکونت،  *</label>
                                        <input name="address" class="form-control mb-3" type="text" placeholder="آدرس">
                                        @error('address')
                                        <div class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-element-row mb-5">
                                        <label class="">کد پستی*</label>
                                        <input name="code_post" class="form-control" type="text">
                                        @error('code_post')
                                        <div class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div  class="col-12"  >
                                    <div class="form-element-row mb-5">
                                        <label class="">مقام علمی</label>
                                        <textarea name="awards" class="form-control mb-3"  placeholder="در صورت کسب هرگونه مقام علمی آن را ذکر کرده و نام رشته علمی، فرهنگی، ورزشی سطح برگزاری شهرستان، استان، کشور یا بین المللی و مقام های کسب شده سال کسب مقام را ذکر کنید"></textarea>
                                        @error('awards')
                                        <div class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                           </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 ui-sticky ui-sticky-top">
                        <div class="ps-checkout__order">
                            <h3 class="h3"> اطلاعات آزمون شما</h3>
                            <div class="row">
                                <div class=" mb-3">نام آزمون :<span> {{$empItem_exam->parent->title}} / {{$empItem_exam->title}} </span> </div>
                                <div class=" mb-3">هزینه آزمون :<span> {{$exam_cost}} </span> </div>
                            </div>
                            <a class="btn btn-primary" data-remodal-target="agreement-modal">ثبت نام در آزمون </a>
                            <div class="remodal remodal-xs" data-remodal-id="agreement-modal"
                                 data-remodal-options="hashTracking: false">
                                <div class="remodal-header">
                                    <div class="remodal-title"> فرم مشخصات شخصی</div>
                                    <button data-remodal-action="close" class="remodal-close"></button>
                                </div>
                                <div class="remodal-content">
                                    <div class="checkout-bill-row checkout-bill-note">
                                        با توجه به ضرورت و نياز گزینش به انجام تحقیق و بررسی، متعهد میشوم تمام موارد خواسته شده را در پرسشنامه را صادقانه و در صورت لزوم با ارائه مدارک مستند به طور کامل و خوانا در اختیار شرکت مربوطه‌ به منظور احراز صلاحيت انجام گیرد. لذا در صورت ارائه اطلاعات غیر صحیح گزینش می‌تواند مطابق ضوابط تصمیم لازم را اتخاذ نماید.
                                        <input  id="agreement" type="checkbox">
                                    </div>

                                </div>
                                <div class="remodal-footer">
                                    <div class="checkout-bill-row checkout-bill-action">
                                        <button id="btnSignUp" type="submit" class="btn btn-success disabled"> ادامه </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input name="employment_item_id" type="hidden" value="{{$empItem_exam->id}}">
            </form>
        </div>
    </div>

@endsection
