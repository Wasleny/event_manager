<?php

return [

    'accepted' => 'O :attribute deve ser aceito.',
    'active_url' => 'O :attribute não é uma URL válida.',
    'after' => 'O :attribute deve ser uma data após :date.',
    'after_or_equal' => 'O :attribute deve ser uma data após ou igual a :date.',
    'alpha' => 'O :attribute deve conter apenas letras.',
    'alpha_dash' => 'O :attribute deve conter apenas letras, números e traços.',
    'alpha_num' => 'O :attribute deve conter apenas letras e números.',
    'array' => 'O :attribute deve ser um array.',
    'before' => 'O :attribute deve ser uma data antes de :date.',
    'before_or_equal' => 'O :attribute deve ser uma data antes ou igual a :date.',
    'between' => [
        'numeric' => 'O :attribute deve estar entre :min e :max.',
        'file' => 'O :attribute deve ter entre :min e :max kilobytes.',
        'string' => 'O :attribute deve ter entre :min e :max caracteres.',
        'array' => 'O :attribute deve ter entre :min e :max itens.',
    ],
    'boolean' => 'O campo :attribute deve ser verdadeiro ou falso.',
    'confirmed' => 'A confirmação de :attribute não coincide.',
    'date' => 'O :attribute não é uma data válida.',
    'date_equals' => 'O :attribute deve ser uma data igual a :date.',
    'date_format' => 'O :attribute deve corresponder ao formato :format.',
    'different' => 'Os campos :attribute e :other devem ser diferentes.',
    'digits' => 'O :attribute deve ter :digits dígitos.',
    'digits_between' => 'O :attribute deve ter entre :min e :max dígitos.',
    'dimensions' => 'O :attribute tem dimensões de imagem inválidas.',
    'distinct' => 'O campo :attribute tem um valor duplicado.',
    'email' => 'O :attribute deve ser um endereço de e-mail válido.',
    'ends_with' => 'O :attribute deve terminar com um dos seguintes: :values.',
    'exists' => 'O :attribute selecionado é inválido.',
    'file' => 'O :attribute deve ser um arquivo.',
    'filled' => 'O campo :attribute deve ter um valor.',
    'gt' => [
        'numeric' => 'O :attribute deve ser maior que :value.',
        'file' => 'O :attribute deve ser maior que :value kilobytes.',
        'string' => 'O :attribute deve ter mais de :value caracteres.',
        'array' => 'O :attribute deve ter mais de :value itens.',
    ],
    'gte' => [
        'numeric' => 'O :attribute deve ser maior ou igual a :value.',
        'file' => 'O :attribute deve ser maior ou igual a :value kilobytes.',
        'string' => 'O :attribute deve ter :value caracteres ou mais.',
        'array' => 'O :attribute deve ter :value itens ou mais.',
    ],
    'image' => 'O :attribute deve ser uma imagem.',
    'in' => 'O :attribute selecionado é inválido.',
    'in_array' => 'O campo :attribute não existe em :other.',
    'integer' => 'O :attribute deve ser um número inteiro.',
    'ip' => 'O :attribute deve ser um endereço IP válido.',
    'ipv4' => 'O :attribute deve ser um endereço IPv4 válido.',
    'ipv6' => 'O :attribute deve ser um endereço IPv6 válido.',
    'json' => 'O :attribute deve ser uma string JSON válida.',
    'lt' => [
        'numeric' => 'O :attribute deve ser menor que :value.',
        'file' => 'O :attribute deve ser menor que :value kilobytes.',
        'string' => 'O :attribute deve ter menos de :value caracteres.',
        'array' => 'O :attribute deve ter menos de :value itens.',
    ],
    'lte' => [
        'numeric' => 'O :attribute deve ser menor ou igual a :value.',
        'file' => 'O :attribute deve ser menor ou igual a :value kilobytes.',
        'string' => 'O :attribute deve ter :value caracteres ou menos.',
        'array' => 'O :attribute não deve ter mais de :value itens.',
    ],
    'max' => [
        'numeric' => 'O :attribute não pode ser maior que :max.',
        'file' => 'O :attribute não pode ser maior que :max kilobytes.',
        'string' => 'O :attribute não pode ter mais que :max caracteres.',
        'array' => 'O :attribute não pode ter mais que :max itens.',
    ],
    'mimes' => 'O :attribute deve ser um arquivo do tipo: :values.',
    'mimetypes' => 'O :attribute deve ser um arquivo do tipo: :values.',
    'min' => [
        'numeric' => 'O :attribute deve ser pelo menos :min.',
        'file' => 'O :attribute deve ter pelo menos :min kilobytes.',
        'string' => 'O :attribute deve ter pelo menos :min caracteres.',
        'array' => 'O :attribute deve ter pelo menos :min itens.',
    ],
    'not_in' => 'O :attribute selecionado é inválido.',
    'not_regex' => 'O formato de :attribute é inválido.',
    'numeric' => 'O :attribute deve ser um número.',
    'present' => 'O campo :attribute deve estar presente.',
    'regex' => 'O formato de :attribute é inválido.',
    'required' => 'O campo :attribute é obrigatório.',
    'required_if' => 'O campo :attribute é obrigatório quando :other é :value.',
    'required_unless' => 'O campo :attribute é obrigatório, a menos que :other esteja em :values.',
    'required_with' => 'O campo :attribute é obrigatório quando :values está presente.',
    'required_with_all' => 'O campo :attribute é obrigatório quando :values estão presentes.',
    'required_without' => 'O campo :attribute é obrigatório quando :values não está presente.',
    'required_without_all' => 'O campo :attribute é obrigatório quando nenhum dos :values estão presentes.',
    'same' => 'Os campos :attribute e :other devem ser iguais.',
    'size' => [
        'numeric' => 'O :attribute deve ser :size.',
        'file' => 'O :attribute deve ter :size kilobytes.',
        'string' => 'O :attribute deve ter :size caracteres.',
        'array' => 'O :attribute deve conter :size itens.',
    ],
    'starts_with' => 'O :attribute deve começar com um dos seguintes: :values.',
    'string' => 'O :attribute deve ser uma string.',
    'timezone' => 'O :attribute deve ser uma zona válida.',
    'unique' => 'O :attribute já foi utilizado.',
    'uploaded' => 'O :attribute falhou ao ser enviado.',
    'url' => 'O formato de :attribute é inválido.',
    'uuid' => 'O :attribute deve ser um UUID válido.',

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
            'rule-name' => 'Custom message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name' => 'nome',
        'email' => 'e-mail',
        'password' => 'senha',
        'date_birth' => 'data de nascimento',
        'address' => 'endereço',
        'cpf' => 'CPF',
    ],

];
