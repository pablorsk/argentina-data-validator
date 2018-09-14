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

class CuitValidator
{
    public function validateCuit(string $attribute, $value, array $parameters, Validator $validator): bool
    {
        return Cuit::isValid((int) $value);
    }

    public function replaceCuit(string $message, string $attribute, string $rule, array $parameters): string
    {
        return 'El CUIT-CUIL ingresado no es válido.';
    }
}
