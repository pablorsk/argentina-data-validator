<?php
/**
 * Copyright (C) 2018-2018 Pablo Reyes <pablo@reyesoft.com>.
 *
 * This file is part of ArgentinaDataValidator. ArgentinaDataValidator
 * distributed under MIT Licence.
 */

declare(strict_types=1);

namespace ArgentinaDataValidator;

use Illuminate\Validation\Validator;

class CbuValidator
{
    public function validateCbu(string $attribute, string $value, array $parameters, Validator $validator): bool
    {
        return Cbu::isValid($value);
    }

    public function replaceCbu(string $message, string $attribute, string $rule, array $parameters): string
    {
        return 'El CBU ingresado no es válido.';
    }
}
