<!-- Side Header Start -->
<div class="side-header show">
    <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
    <!-- Side Header Inner Start -->
    <div class="side-header-inner custom-scroll">

        <nav class="side-header-menu" id="side-header-menu">
            <ul>

                <li><a href="{{route('dashboard')}}"><i class="ti-home"></i> <span>داشبورد</span></a></li>
                <li class="has-sub-menu"><a href="#"><i class="fa fa-user-circle"></i> <span>کاربران</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a href="{{route('admin.users.index')}}"><span>لیست کاربران</span></a></li>
                        <li><a href="{{route('admin.management.index')}}"><span>مدیران سایت</span></a></li>
                    </ul>
                </li>
                <li><a href="{{route('admin.employments.index')}}"><i class="zmdi zmdi-library"></i> <span>استخدام ها</span></a></li>
                <li><a href="{{route('admin.employmentConditions.index')}}"><i class="zmdi zmdi-help"></i> <span>شرایط استخدام ها</span></a></li>
                <li><a href="{{route('admin.exams.index')}}"><i class="zmdi zmdi-receipt"></i> <span>آزمون ها</span></a></li>
                <li><a href="{{route('admin.jobseekers.index')}}"><i class="zmdi zmdi-storage"></i> <span>شرکت کنندگان آزمون </span></a></li>
                <li><a href="{{route('admin.settings.index')}}"><i class="zmdi zmdi-settings"></i> <span>تنظیمات </span></a></li>
                <li><a href="{{route('admin.banners.index')}}"><i class="zmdi zmdi-picture-in-picture"></i> <span>بنر ها</span></a></li>
                <li><a href="{{route('admin.messages.index')}}"><i class="ti-email"></i> <span> پیغام ها </span></a></li>
                <li><a href="{{route('admin.aboutUs.index')}}"><i class="ti-layers"></i> <span> صفحه درباره ما </span></a></li>
                <li><a href="{{route('admin.aboutUs.index')}}"><i class="ti-lock"></i> <span> احراز هویت </span></a></li>

            </ul>
        </nav>

    </div>
    <!-- Side Header Inner End -->
</div>
<!-- Side Header End -->
