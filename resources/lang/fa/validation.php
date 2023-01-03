<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute باید پذیرفته شده باشد.',
    'active_url'           => 'آدرس :attribute معتبر نیست',
    'after'                => ':attribute باید تاریخی بعد از :date باشد.',
    'after_or_equal'       => ':attribute باید تاریخی بعد از :date، یا مطابق با آن باشد.',
    'alpha'                => ':attribute باید فقط حروف الفبا باشد.',
    'alpha_dash'           => ':attribute باید فقط حروف الفبا، عدد و خط تیره(-) باشد.',
    'alpha_num'            => ':attribute باید فقط حروف الفبا و عدد باشد.',
    'array'                => ':attribute باید آرایه باشد.',
    'before'               => ':attribute باید تاریخی قبل از :date باشد.',
    'before_or_equal'      => ':attribute باید تاریخی قبل از :date، یا مطابق با آن باشد.',
    'between'              => [
        'numeric' => ':attribute باید بین :min و :max باشد.',
        'file'    => ':attribute باید بین :min و :max کیلوبایت باشد.',
        'string'  => ':attribute باید بین :min و :max کاراکتر باشد.',
        'array'   => ':attribute باید بین :min و :max آیتم باشد.',
    ],
    'boolean'              => 'فیلد :attribute فقط می‌تواند صفر و یا یک باشد',
    'confirmed'            => ':attribute با فیلد تکرار مطابقت ندارد.',
    'date'                 => ':attribute یک تاریخ معتبر نیست.',
    'date_format'          => ':attribute با الگوی :format مطاقبت ندارد.',
    'different'            => ':attribute و :other باید متفاوت باشند.',
    'digits'               => ':attribute باید :digits رقم باشد.',
    'digits_between'       => ':attribute باید بین :min و :max رقم باشد.',
    'dimensions'           => 'ابعاد تصویر :attribute قابل قبول نیست.',
    'distinct'             => 'فیلد :attribute تکراری است.',
    'email'                => ':attribute باید یک ایمیل معتبر باشد',
    'exists'               => ':attribute انتخاب شده، معتبر نیست.',
    'file'                 => ':attribute باید یک فایل باشد',
    'filled'               => 'فیلد :attribute الزامی است',
    'image'                => ':attribute باید تصویر باشد.',
    'in'                   => ':attribute انتخاب شده، معتبر نیست.',
    'in_array'             => 'فیلد :attribute در :other وجود ندارد.',
    'integer'              => ':attribute باید عدد صحیح باشد.',
    'ip'                   => ':attribute باید IP معتبر باشد.',
    'ipv4'                 => ':attribute باید یک آدرس معتبر از نوع IPv4 باشد.',
    'ipv6'                 => ':attribute باید یک آدرس معتبر از نوع IPv6 باشد.',
    'json'                 => 'فیلد :attribute باید یک رشته از نوع JSON باشد.',
    'max'                  => [
        'numeric' => ':attribute نباید بزرگتر از :max باشد.',
        'file'    => ':attribute نباید بزرگتر از :max کیلوبایت باشد.',
        'string'  => ':attribute نباید بیشتر از :max کاراکتر باشد.',
        'array'   => ':attribute نباید بیشتر از :max آیتم باشد.',
    ],
    'mimes'                => ':attribute باید یکی از فرمت های :values باشد.',
    'mimetypes'            => ':attribute باید یکی از فرمت های :values باشد.',
    'min'                  => [
        'numeric' => ':attribute نباید کوچکتر از :min باشد.',
        'file'    => ':attribute نباید کوچکتر از :min کیلوبایت باشد.',
        'string'  => ':attribute نباید کمتر از :min کاراکتر باشد.',
        'array'   => ':attribute نباید کمتر از :min آیتم باشد.',
    ],
    'not_in'               => ':attribute انتخاب شده، معتبر نیست.',
    'numeric'              => ':attribute باید عدد باشد.',
    'present'              => 'فیلد :attribute باید در پارامترهای ارسالی وجود داشته باشد.',
    'regex'                => 'فرمت :attribute معتبر نیست',
    'required'             => 'فیلد :attribute الزامی است',
    'required_if'          => 'هنگامی که :other برابر با :value است، فیلد :attribute الزامی است.',
    'required_unless'      => 'فیلد :attribute ضروری است، مگر آنکه :other در :values موجود باشد.',
    'required_with'        => 'در صورت وجود فیلد :values، فیلد :attribute الزامی است.',
    'required_with_all'    => 'در صورت وجود فیلدهای :values، فیلد :attribute الزامی است.',
    'required_without'     => 'در صورت عدم وجود فیلد :values، فیلد :attribute الزامی است.',
    'required_without_all' => 'در صورت عدم وجود هر یک از فیلدهای :values، فیلد :attribute الزامی است.',
    'same'                 => ':attribute و :other باید مانند هم باشند.',
    'size'                 => [
        'numeric' => ':attribute باید برابر با :size باشد.',
        'file'    => ':attribute باید برابر با :size کیلوبایت باشد.',
        'string'  => ':attribute باید برابر با :size کاراکتر باشد.',
        'array'   => ':attribute باسد شامل :size آیتم باشد.',
    ],
    'string'               => 'فیلد :attribute باید متن باشد.',
    'timezone'             => 'فیلد :attribute باید یک منطقه زمانی قابل قبول باشد.',
    'unique'               => ':attribute قبلا انتخاب شده است.',
    'uploaded'             => 'آپلود فایل :attribute موفقیت آمیز نبود.',
    'url'                  => 'فرمت آدرس :attribute اشتباه است.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [

    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes'           => [
        'name'                  => 'نام',
        'username'              => 'نام کاربری',
        'email'                 => 'ایمیل',
        'first_name'            => 'نام',
        'last_name'             => 'نام خانوادگی',
        'password'              => 'رمز عبور',
        'password_confirmation' => 'تکرار رمز عبور',
        'city'                  => 'شهر',
        'country'               => 'کشور',
        'address'               => 'آدرس پستی',
        'phone'                 => 'شماره همراه',
        'cellphone'             => 'شماره همراه',
        'age'                   => 'سن',
        'sex'                   => 'جنسیت',
        'gender'                => 'جنسیت',
        'day'                   => 'روز',
        'month'                 => 'ماه',
        'year'                  => 'سال',
        'hour'                  => 'ساعت',
        'minute'                => 'دقیقه',
        'second'                => 'ثانیه',
        'title'                 => 'عنوان',
        'text'                  => 'متن',
        'content'               => 'محتوا',
        'explain'           => 'توضیحات',
        'excerpt'               => 'گزیده مطلب',
        'date'                  => 'تاریخ',
        'time'                  => 'زمان',
        'available'             => 'موجود',
        'size'                  => 'اندازه',
        'terms'                 => 'شرایط',
        'price'                 => 'قیمت',
        'code'                  => 'کد',
        'score'                 => 'تعداد امتیاز',
        'display_name'          => 'نام نمایشی',
        'resource'              => 'نام ریسورس',
        'old_password'          => 'رمز عبور فعلی',
        'newpassword'           => 'رمز عبور جدید',
        'newpassword_confirmation' => 'تکرار رمز عبور جدید',
        'longitude'             => 'طول جغرافیایی',
        'latitude'              => 'عرض جغرافیایی',
        'exam_date'              => 'تاریخ آزمون',
        'exam_time'              => 'زمان آزمون',
        'image'              => 'تصویر',
        'family'              => 'نام خانوادگی',
        'option1.0'=>'گزینه یک',
        'option2.0'=>'گزینه دو',
        'option3.0'=>'گزینه سه',
        'true_option.0'=>'گزینه صحیح',
        'questions.0'=>'سوال ',

        'option1.1'=>'گزینه یک',
        'option2.1'=>'گزینه دو',
        'option3.1'=>'گزینه سه',
        'true_option.1'=>'گزینه صحیح',
        'questions.1'=>'سوال ',

        'option1.2'=>'گزینه یک',
        'option2.2'=>'گزینه دو',
        'option3.2'=>'گزینه سه',
        'true_option.2'=>'گزینه صحیح',
        'questions.2'=>'سوال ',

        'option1.3'=>'گزینه یک',
        'option2.3'=>'گزینه دو',
        'option3.3'=>'گزینه سه',
        'true_option.3'=>'گزینه صحیح',
        'questions.3'=>'سوال ',


        'option1.4'=>'گزینه یک',
        'option2.4'=>'گزینه دو',
        'option3.4'=>'گزینه سه',
        'true_option.4'=>'گزینه صحیح',
        'questions.4'=>'سوال ',


        'option1.5'=>'گزینه یک',
        'option2.5'=>'گزینه دو',
        'option3.5'=>'گزینه سه',
        'true_option.5'=>'گزینه صحیح',
        'questions.5'=>'سوال ',


        'option1.6'=>'گزینه یک',
        'option2.6'=>'گزینه دو',
        'option3.6'=>'گزینه سه',
        'true_option.6'=>'گزینه صحیح',
        'questions.6'=>'سوال ',


        'option1.7'=>'گزینه یک',
        'option2.7'=>'گزینه دو',
        'option3.7'=>'گزینه سه',
        'true_option.7'=>'گزینه صحیح',
        'questions.7'=>'سوال ',


        'option1.8'=>'گزینه یک',
        'option2.8'=>'گزینه دو',
        'option3.8'=>'گزینه سه',
        'true_option.8'=>'گزینه صحیح',
        'questions.8'=>'سوال ',


        'option1.9'=>'گزینه یک',
        'option2.9'=>'گزینه دو',
        'option3.9'=>'گزینه سه',
        'true_option.9'=>'گزینه صحیح',
        'questions.9'=>'سوال ',


        'option1.10'=>'گزینه یک',
        'option2.10'=>'گزینه دو',
        'option3.10'=>'گزینه سه',
        'true_option.10'=>'گزینه صحیح',
        'questions.10'=>'سوال ',

        'top_title' => 'عنوان بالای صفحه',
        'top_text' => 'متن بالای صفحه',
        'top_image' => 'عکس بالای صفحه',
        'top_image_title ' => 'عنوان زیر عکس بالای صفحه',
        'top_image_text' => 'متن زیر عکس بالای صفحه',
        'middle_left_title' => 'عنوان سمت چپ وسط صفحه',
        'middle_middle_title' => 'عنوان میانی وسط صفحه',
        'middle_right_title' => 'عنوان سمت راست وسط صفحه',
        'middle_left_text' => 'عنوان سمت چپ وسط صفحه',
        'middle_middle_text' => 'متن میانی وسط صفحه',
        'middle_right_text' => 'متن سمت راست وسط صفحه',
        'footer_left_image' => 'عکس پایین چپ صفحه',
        'footer_middle_image' => 'عکس پایین وسط صفحه',
        'footer_right_image' => 'عکس پایین راست صفحه',
        'footer_left_title' => 'عنوان سمت چپ پایین صفحه',
        'footer_middle_title' => 'عنوان میانی پایین صفحه',
        'footer_right_title' => 'عنوان سمت راست پایین صفحه',
        'footer_left_text' => 'متن سمت چپ پایین صفحه',
        'footer_middle_text' => 'متن میانی پایین صفحه',
        'footer_right_text' => 'متن سمت راست پایین صفحه',

        'shomare_shenasname' => 'شماره شناسنامه',
        'code_meli' => 'کد ملی',
        'sodoor_place' => 'محل صدور',
        'born_date' => 'تاریخ تولد',
        'born_place' => 'محل تولد',
        'nationality' => 'ملیت',
        'religion' => 'دین',
        'faith' => 'مذهب',
        'speciality' => 'رشته تحصیلی',
        'education_place' => 'محل تحصیل',
        'code_post' => 'کد پستی',

    ],


];
