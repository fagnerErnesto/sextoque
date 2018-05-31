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

    'accepted'             => 'O :attribute foi aceito.',
    'active_url'           => 'O :attribute não é uma URL válida.',
    'after'                => 'O :attribute deve ser uma data maior que :date.',
    'after_or_equal'       => 'O :attribute deve ser uma data maior ou igual a :date.',
    'alpha'                => 'O :attribute deve ter apenas letras.',
    'alpha_dash'           => 'O :attribute deve ter letras, números, e - .',
    'alpha_num'            => 'O :attribute deve ter letras e números.',
    'array'                => 'O :attribute deve ser uma lista.',
    'before'               => 'O :attribute deve ser uma data menor que :date.',
    'before_or_equal'      => 'O :attribute deve ser uma data menor ou igual a :date.',
    'between'              => [
        'numeric' => 'O :attribute deve estar entre :min e :max.',
        'file'    => 'O :attribute deve estar entre :min e :max kilobytes.',
        'string'  => 'O :attribute deve estar entre :min e :max caracteres.',
        'array'   => 'O :attribute deve estar entre :min e :max itens.',
    ],
    'boolean'              => 'O :attribute deve ser verdadeiro ou falso.',
    'confirmed'            => 'O :attribute de verificação não confere.',
    'date'                 => 'O :attribute não é uma data válida.',
    'date_format'          => 'O :attribute não tem um formato válido :format.',
    'different'            => 'O :attribute e :other devem ser diferentes.',
    'digits'               => 'O :attribute deve ter :digits digitos.',
    'digits_between'       => 'O :attribute deve estar entre between :min e :max digitos.',
    'dimensions'           => 'O :attribute o tamanho da imagem é inválido.',
    'distinct'             => 'O :attribute tem valor duplicado.',
    'email'                => 'O :attribute o endereço de e-mail é inválido.',
    'exists'               => 'O :attribute selecionado é inválido.',
    'file'                 => 'O :attribute deve ser um arquivo.',
    'filled'               => 'O :attribute deve ter um valor.',
    'image'                => 'O :attribute deve ser uma imagem.',
    'in'                   => 'O :attribute selecionado é inválido.',
    'in_array'             => 'O :attribute não existe em :other.',
    'integer'              => 'O :attribute deve ser um número inteiro.',
    'ip'                   => 'O :attribute deve ser um endereço de IP válido.',
    'ipv4'                 => 'O :attribute deve ser um endereço de IPv4 válido.',
    'ipv6'                 => 'O :attribute deve ser um endereço de IPv6 válido.',
    'json'                 => 'O :attribute deve ser uma string JSON válida.',
    'max'                  => [
        'numeric' => 'O :attribute não deve ser maior que :max.',
        'file'    => 'O :attribute não deve ser maior que :max kilobytes.',
        'string'  => 'O :attribute não deve ser maior que :max characters.',
        'array'   => 'O :attribute não deve ter mais de :max itens.',
    ],
    'mimes'                => 'O :attribute deve ser um arquivo do tipo: :values.',
    'mimetypes'            => 'O :attribute deve ser um arquivo do tipo: :values.',
    'min'                  => [
        'numeric' => 'O :attribute o menor valor aceito é :min.',
        'file'    => 'O :attribute o menor valor aceito é :min kilobytes.',
        'string'  => 'O :attribute o menor valor aceito é :min caracteres.',
        'array'   => 'O :attribute deve ter pelo :min itens.',
    ],
    'not_in'               => 'O :attribute selecionado é inválido.',
    'numeric'              => 'O :attribute deve ser um número.',
    'present'              => 'O :attribute deve estar presente.',
    'regex'                => 'O formato do :attribute é inválido.',
    'required'             => 'O :attribute é obrigatório.',
    'required_if'          => 'O :attribute é obrigatório quando :other é :value.',
    'required_unless'      => 'O :attribute é obrigatório exceto quando :other está em :values.',
    'required_with'        => 'O :attribute é obrigatório quando :values é present.',
    'required_with_all'    => 'O :attribute é obrigatório quando :values é present.',
    'required_without'     => 'O :attribute é obrigatório quando :values não está presente.',
    'required_without_all' => 'O :attribute é obrigatório quando nenhum dos :values estão presentes.',
    'same'                 => 'O :attribute e :other não conferem.',
    'size'                 => [
        'numeric' => 'O :attribute deve ter o tamanho de :size.',
        'file'    => 'O :attribute deve ter o tamanho de :size kilobytes.',
        'string'  => 'O :attribute deve ter :size caracteres.',
        'array'   => 'O :attribute deve conter :size itens.',
    ],
    'string'               => 'O :attribute deve ser um texto.',
    'timezone'             => 'O :attribute deve ser um fuso horário válido.',
    'unique'               => 'O :attribute deve ser único.',
    'uploaded'             => 'O :attribute foi carregado.',
    'url'                  => 'O :attribute tem formato de URL inválido.',

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
