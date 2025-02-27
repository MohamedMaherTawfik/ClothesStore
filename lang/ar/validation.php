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

    'accepted' => 'The :attribute field must be accepted.',
    'accepted_if' => 'The :attribute field must be accepted when :other is :value.',
    'active_url' => 'The :attribute field must be a valid URL.',
    'after' => 'The :attribute field must be a date after :date.',
    'after_or_equal' => 'The :attribute field must be a date after or equal to :date.',
    'alpha' => 'The :attribute field must only contain letters.',
    'alpha_dash' => 'The :attribute field must only contain letters, numbers, dashes, and underscores.',
    'alpha_num' => 'The :attribute field must only contain letters and numbers.',
    'array' => 'The :attribute field must be an array.',
    'ascii' => 'The :attribute field must only contain single-byte alphanumeric characters and symbols.',
    'before' => 'The :attribute field must be a date before :date.',
    'before_or_equal' => 'The :attribute field must be a date before or equal to :date.',
    'between' => [
        'array' => 'The :attribute field must have between :min and :max items.',
        'file' => 'The :attribute field must be between :min and :max kilobytes.',
        'numeric' => 'The :attribute field must be between :min and :max.',
        'string' => 'The :attribute field must be between :min and :max characters.',
    ],
    'boolean' => ' يجب ان يكون :attribute صحيح او خطأ',
    'can' => 'The :attribute field contains an unauthorized value.',
    'confirmed' => 'لا يتطابق :attribute مع التأكيد.',
    'contains' => 'The :attribute field is missing a required value.',
    'current_password' => 'The password is incorrect.',
    'date' => 'يجب ان يكون :attribute على شكل تاريخ صحيح',
    'date_equals' => 'The :attribute field must be a date equal to :date.',
    'date_format' => 'The :attribute field must match the format :format.',
    'decimal' => 'The :attribute field must have :decimal decimal places.',
    'declined' => 'The :attribute field must be declined.',
    'declined_if' => 'The :attribute field must be declined when :other is :value.',
    'different' => 'The :attribute field and :other must be different.',
    'digits' => 'The :attribute field must be :digits digits.',
    'digits_between' => 'The :attribute field must be between :min and :max digits.',
    'dimensions' => 'The :attribute field has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'doesnt_end_with' => 'The :attribute field must not end with one of the following: :values.',
    'doesnt_start_with' => 'The :attribute field must not start with one of the following: :values.',
    'email' => 'يجب ان يكون :attribute علي شكل ايميل صحيح',
    'ends_with' => 'The :attribute field must end with one of the following: :values.',
    'enum' => 'الاختيار :attribute غير صحيح.',
    'exists' => 'الاختيار :attribute غير موجود.',
    'extensions' => 'The :attribute field must have one of the following extensions: :values.',
    'file' => 'الحقل :attribute يجب ان يكون ملف',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'array' => 'The :attribute field must have more than :value items.',
        'file' => 'The :attribute field must be greater than :value kilobytes.',
        'numeric' => 'The :attribute field must be greater than :value.',
        'string' => 'The :attribute field must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'The :attribute field must have :value items or more.',
        'file' => 'The :attribute field must be greater than or equal to :value kilobytes.',
        'numeric' => 'The :attribute field must be greater than or equal to :value.',
        'string' => 'The :attribute field must be greater than or equal to :value characters.',
    ],
    'hex_color' => 'The :attribute field must be a valid hexadecimal color.',
    'image' => 'الحقل :attribute يجب ان يكون صورة',
    'in' => 'الاختيار :attribute غير صحيح.',
    'in_array' => 'الاختيار :attribute غير موجود في :other.',
    'integer' => 'الحقل :attribute يجب ان يكون رقم صحيح.',
    'ip' => 'The :attribute field must be a valid IP address.',
    'ipv4' => 'The :attribute field must be a valid IPv4 address.',
    'ipv6' => 'The :attribute field must be a valid IPv6 address.',
    'json' => 'The :attribute field must be a valid JSON string.',
    'list' => 'The :attribute field must be a list.',
    'lowercase' => 'الحقل :attribute يجب ان يكون كل حروفها صغيرة.',
    'lt' => [
        'array' => 'The :attribute field must have less than :value items.',
        'file' => 'The :attribute field must be less than :value kilobytes.',
        'numeric' => 'The :attribute field must be less than :value.',
        'string' => 'The :attribute field must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The :attribute field must not have more than :value items.',
        'file' => 'The :attribute field must be less than or equal to :value kilobytes.',
        'numeric' => 'The :attribute field must be less than or equal to :value.',
        'string' => 'The :attribute field must be less than or equal to :value characters.',
    ],
    'mac_address' => 'The :attribute field must be a valid MAC address.',
    'max' => [
        'array' => 'The :attribute field must not have more than :max items.',
        'file' => 'The :attribute field must not be greater than :max kilobytes.',
        'numeric' => 'The :attribute field must not be greater than :max.',
        'string' => 'The :attribute field must not be greater than :max characters.',
    ],
    'max_digits' => 'The :attribute field must not have more than :max digits.',
    'mimes' => 'The :attribute field must be a file of type: :values.',
    'mimetypes' => 'The :attribute field must be a file of type: :values.',
    'min' => [
        'array' => 'الحقل :attribute يجب ان يكون على الاقل :min حالات.',
        'file' => 'The :attribute field must be at least :min kilobytes.',
        'numeric' => 'الحقل :attribute يجب ان يكون على الاقل :min.',
        'string' => 'الحقل :attribute يجب ان يكون على الاقل :min characters.',
    ],
    'min_digits' => 'الحقل :attribute يجب ان يكون على الاقل :min ارقام.',
    'missing' => 'الحقل :attribute يجب ان يكون فارغ.',
    'missing_if' => 'The :attribute field must be missing when :other is :value.',
    'missing_unless' => 'The :attribute field must be missing unless :other is :value.',
    'missing_with' => 'The :attribute field must be missing when :values is present.',
    'missing_with_all' => 'The :attribute field must be missing when :values are present.',
    'multiple_of' => 'The :attribute field must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute field format is invalid.',
    'numeric' => 'الحقل :attribute يجب ان يكون رقم.',
    'password' => [
        'letters' => 'الحقل :attribute يجب ان يكون على الاقل :letters حروف.',
        'mixed' => 'الحقل :attribute يجب ان يكون على الاقل :mixed حروف كبيرة وصغيرة.',
        'numbers' => 'الحقل :attribute يجب ان يكون على الاقل :numbers ارقام.',
        'symbols' => 'الحقل :attribute يجب ان يكون على الاقل :symbols رموز.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'The :attribute field must be present.',
    'present_if' => 'The :attribute field must be present when :other is :value.',
    'present_unless' => 'The :attribute field must be present unless :other is :value.',
    'present_with' => 'The :attribute field must be present when :values is present.',
    'present_with_all' => 'The :attribute field must be present when :values are present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'The :attribute field format is invalid.',
    'required' => 'العنصر :attribute مطلوب',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_if_declined' => 'The :attribute field is required when :other is declined.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute field must match :other.',
    'size' => [
        'array' => 'The :attribute field must contain :size items.',
        'file' => 'The :attribute field must be :size kilobytes.',
        'numeric' => 'The :attribute field must be :size.',
        'string' => 'The :attribute field must be :size characters.',
    ],
    'starts_with' => 'الحقل :attribute يجب ان يبدا بـ :values.',
    'string' => 'الحقل :attribute يجب ان يكون نص.',
    'timezone' => 'الحقل :attribute يجب ان يكون منطقة صحيحة.',
    'unique' => 'الحقل :attribute يجب ان يكون فريد.',
    'uploaded' => 'الحقل :attribute يجب ان يتم التحميل.',
    'uppercase' => 'الحقل :attribute يجب ان يكون كل حروفها كبيرة.',
    'url' => 'الحقل :attribute يجب ان يكون رابط صحيح.',
    'ulid' => 'The :attribute field must be a valid ULID.',
    'uuid' => 'The :attribute field must be a valid UUID.',

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
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'address' => 'العنوان',
        'age' => 'العمر',
        'body' => 'المحتوى',
        'city' => 'المدينة',
        'name' => 'الاسم',
        'country' => 'الدولة',
        'email' => 'البريد الالكتروني',
        'first_name' => 'الاسم الاول',
        'last_name' => 'الاسم الاخير',
        'message' => 'الرسالة',
        'password' => 'كلمة المرور',
        'phone' => 'رقم الهاتف',
        'subject' => 'الموضوع',
        'image' => 'الصورة',
        'title' => 'العنوان',
        'username' => 'اسم المستخدم',
        'content' => 'المحتوى',
        'description' => 'الوصف',
        'excerpt' => 'المقتطف',
        'date' => 'التاريخ',
        'time' => 'الوقت',
        'available' => 'المتاح',
        'size' => 'الحجم',
        'price' => 'السعر',
        'quantity' => 'الكمية',
        'color' => 'اللون',
        'category' => 'القسم',
        'brand' => 'الماركة',
        'status' => 'الحالة',
        'gender' => 'النوع',
        'day' => 'اليوم',
        'month' => 'الشهر',
        'year' => 'السنة',
        'hour' => 'الساعة',
        'minute' => 'الدقيقة',
        'second' => 'الثانية',
        'current_password' => 'كلمة المرور الحالية',
        'new_password' => 'كلمة المرور الجديدة',
        'new_password_confirmation' => 'تأكيد كلمة المرور الجديدة',
        'terms' => 'الشروط',
    ],

];
