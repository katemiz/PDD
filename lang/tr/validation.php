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

    'accepted' => ':attribute kabul edilmelidir.',
    'accepted_if' => ':attribute ,:other :value olduğunda kabul edilmelidir.',
    'active_url' => ':attribute geçerli bir URL değildir.',
    'after' => ':attribute , :date sonra bir tarih olmalıdır.',
    'after_or_equal' =>
        ':attribute :date eşit veya daha sonra gelen bir tarih olmalıdır.',
    'alpha' => ':attribute sadece harflerden oluşmalı.',
    'alpha_dash' =>
        ':attribute sadece harflerden, rakamlardan, tire ve alt çizgiden oluşabilir.',
    'alpha_num' => ':attribute sadece harf ve rakamlardan oluşmalı.',
    'array' => ':attribute dizin olmalı.',
    'before' => ':attribute :date tarihinden önce bir tarih olmalı.',
    'before_or_equal' =>
        ':attribute değeri :date tarihine eşit veya önceki tarih olmalı.',
    'between' => [
        'array' => ':attribute :min ile :max arasında olmalı.',
        'file' => ':attribute :min ile :max kilobytes arasında olmalı.',
        'numeric' => ':attribute :min ile :max arasında olmalı.',
        'string' => ':attribute :min ile :max karakter arasında olmalı.',
    ],
    'boolean' => ':attribute değeri true veya false olmalı.',
    'confirmed' => 'Girilen :attribute değerleri aynı değildir.',
    'current_password' => 'Şifre hatalıdır.',
    'date' => ':attribute geçerli bir tarih değildir.',
    'date_equals' => ':attribute :date ine eşit bir tarih olmalı.',
    'date_format' => ':attribute :format a uyumlu değildir.',
    'declined' => ':attribute red edilmelidir.',
    'declined_if' =>
        ':attribute :other değeri :value eşit olduğunda red edilmelidir.',
    'different' => ':attribute ve :other farklı olmalı.',
    'digits' => ':attribute :digits basamaklı olmalı.',
    'digits_between' => ':attribute :min ve :max basamakları arasında olmalı.',
    'dimensions' => ':attribute geçersiz görsel boyutlarına sahiptir.',
    'distinct' => ':attribute çift değere sahip.',
    'email' => ':attribute geçerli bir eposta olmalı.',
    'ends_with' =>
        'The :attribute must end with one of the following: :values.',
    'enum' => 'Seçilen :attribute geçersizdir.',
    'exists' => 'Seçilen :attribute geçersizdir.',
    'file' => ':attribute bir dosya olmalı.',
    'filled' => ':attribute değere sahip olmalı.',
    'gt' => [
        'array' => 'The :attribute must have more than :value items.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'numeric' => 'The :attribute must be greater than :value.',
        'string' => 'The :attribute must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'The :attribute must have :value items or more.',
        'file' =>
            'The :attribute must be greater than or equal to :value kilobytes.',
        'numeric' => 'The :attribute must be greater than or equal to :value.',
        'string' =>
            'The :attribute must be greater than or equal to :value characters.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'array' => 'The :attribute must have less than :value items.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'numeric' => 'The :attribute must be less than :value.',
        'string' => 'The :attribute must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The :attribute must not have more than :value items.',
        'file' =>
            'The :attribute must be less than or equal to :value kilobytes.',
        'numeric' => 'The :attribute must be less than or equal to :value.',
        'string' =>
            'The :attribute must be less than or equal to :value characters.',
    ],
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'max' => [
        'array' => 'The :attribute must not have more than :max items.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'numeric' => 'The :attribute must not be greater than :max.',
        'string' => 'The :attribute must not be greater than :max characters.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'array' => 'The :attribute must have at least :min items.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'numeric' => 'The :attribute must be at least :min.',
        'string' => 'The :attribute must be at least :min characters.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'present' => 'The :attribute field must be present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' =>
        'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' =>
        'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_array_keys' =>
        'The :attribute field must contain entries for: :values.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' =>
        'The :attribute field is required unless :other is in :values.',
    'required_with' =>
        'The :attribute field is required when :values is present.',
    'required_with_all' =>
        'The :attribute field is required when :values are present.',
    'required_without' =>
        'The :attribute field is required when :values is not present.',
    'required_without_all' =>
        'The :attribute field is required when none of :values are present.',
    'same' => ':attribute ve :other eşleşmeli.',
    'size' => [
        'array' => ':attribute değeri :size kalem içermeli.',
        'file' => ':attribute değeri :size olmalı.',
        'numeric' => ':attribute değeri :size olmalı.',
        'string' => ':attribute değeri :size karakter olmalı.',
    ],
    'starts_with' => ':attribute değeri şunlardan biri ile başlamalı :values.',
    'string' => ':attribute değerli alfabetik dizin olmalı.',
    'timezone' => ':attribute değeri geçerli bir saat dilimi olmalı.',
    'unique' => ':attribute değer halihazırda alınmış durumda.',
    'uploaded' => ':attribute yüklenemedi.',
    'url' => ':attribute değeri geçerli bir URL olmalı.',
    'uuid' => ':attribute değeri geçerli bir UUID olmalı.',

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
        'password' => 'şifre',
        'email' => 'e-posta',
    ],
];
