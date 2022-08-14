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

    'accepted' => 'Hay un campo que debe ser aceptado.',
    'active_url' => 'Hay un campo que no es una URL válida.',
    'after' => 'La fecha debe ser una fecha posterior a :date.',
    'after_or_equal' => 'La fecha debe ser una fecha posterior o igual a :date.',
    'alpha' => 'Hay un campo que solo puede contener letras.',
    'alpha_dash' => 'Hay un campo que solo puede contener letras, números y guiones.',
    'alpha_num' => 'Hay un campo que solo puede contener letras y números.',
    'array' => 'Hay un campo que debe ser una matriz.',
    'before' => 'La fecha debe ser anterior a :date.',
    'before_or_equal' => 'La fecha debe ser anterior o igual a :date.',
    'between' => [
        'numeric' => 'Hay un campo que debe estar entre :min y :max.',
        'file' => 'Hay un campo que debe estar entre :min y :max kilobytes.',
        'string' => 'Hay un campo que debe estar entre :min y :max caracteres.',
        'array' => 'Hay un campo que debe tener entre :min y :max elementos.',
    ],
    'boolean' => 'Hay un campo que debe ser verdadero o falso.',
    'confirmed' => 'Hay un campo de confirmación que no coincide.',
    'date' => 'Hay un campo que no es una fecha válida.',
    'date_format' => 'Hay un campo que no coincide con el formato :format.',
    'different' => 'Hay dos campos que deben ser diferentes.',
    'digits' => 'Hay un campo que debe ser de :digits dígitos.',
    'digits_ between' => 'Hay un campo que debe estar entre :min y :max dígitos.',
    'dimensions' => 'Hay un campo que tiene dimensiones de imagen no válidas.',
    'distinct' => 'Hay un campo que tiene un valor duplicado.',
    'email' => 'Hay un campo que debe ser una dirección de correo electrónico válida.',
    'exists' => 'Hay un campo seleccionado que no es válido.',
    'file' => 'Hay un campo que debe ser un archivo.',
    'filled' => 'Hay un campo que debe tener un valor.',
    'image' => 'Hay un campo que debe ser una imagen.',
    'in' => 'Hay un campo seleccionado que no es válido.',
    'in_array' => 'Hay un campo que no existe en otro campo.',
    'integer' => 'Hay un campo que debe ser un número entero.',
    'ip' => 'Hay un campo que debe ser una dirección IP válida.',
    'ipv4' => 'Hay un campo que debe ser una dirección IPv4 válida.',
    'ipv6' => 'Hay un campo que debe ser una dirección IPv6 válida.',
    'json' => 'Hay un campo que debe ser una cadena JSON válida.',
    'max' => [
        'numeric' => 'Hay un campo que no puede ser mayor que :max.',
        'file' => 'Hay un campo que no puede ser mayor que :max kilobytes.',
        'string' => 'Hay un campo que no puede ser mayor que :max caracteres.',
        'array' => 'Hay un campo que no puede tener más de :max elementos.',
    ],
    'mimes' => 'Hay un campo que debe ser un archivo de tipo :values.',
    'mimetypes' => 'Hay un campo que debe ser un archivo de tipo: :values.',
    'min' => [
        'numeric' => 'Hay un campo que debe ser al menos :min.',
        'file' => 'Hay un campo que debe tener al menos :min kilobytes.',
        'string' => 'Hay un campo que debe tener al menos :min caracteres.',
        'array' => 'Hay un campo que debe tener al menos :min elementos.',
    ],
    'not_in' => 'Hay un campo seleccionado que no es válido.',
    'not_regex' => 'Hay un campo del atributo que no es válido.',
    'numeric' => 'Hay un campo que debe ser un número.',
    'present' => 'Hay un campo que debe estar presente.',
    'regex' => 'El formato de un campo no es válido.',
    'required' => 'Hay un campo que es obligatorio.',
    'required_if' => 'Hay un campo que es obligatorio cuando otro campo es :value.',
    'required_unless' => 'Hay un campo que es obligatorio a menos que otro campo esté en :values.',
    'required_with' => 'Hay un campo que es obligatorio cuando :values ​​está presente.',
    'required_with_all' => 'Hay un campo que es obligatorio cuando :values está presente.',
    'required_without' => 'Hay un campo que es obligatorio cuando :values ​​no está presente.',
    'required_without_all' => 'Hay un campo que es obligatorio cuando ninguno de los :values está presente.',
    'same' => 'Hay dos campos que deben coincidir.',
    'size' => [
        'numeric' => 'Hay un campo que debe ser :size.',
        'file' => 'Hay un campo que debe ser :size en kilobytes.',
        'string' => 'Hay un campo que debe ser de :size caracteres.',
        'array' => 'Hay un campo que debe contener :size elementos.',
    ],
    'string' => 'Hay un campo que debe ser una cadena.',
    'timezone' => 'Hay un campo que debe ser una zona válida.',
    'unique' => 'Hay un campo que ya existe.',
     'uploaded' => 'Hay un campo que no se pudo cargar.',
     'url' => 'Hay un campo que no es válido.', 

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
