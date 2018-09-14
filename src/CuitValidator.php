<?php
/**
 * Copyright (C) 2018-2018 Pablo Reyes <pablo@reyesoft.com>.
 *
 * This file is part of ArgentinaDataValidator. ArgentinaDataValidator
 * distributed under MIT Licence.
 */

declare(strict_types=1);

namespace ArgentinaDataValidator;

class CuitValidator
{
    public function validateCuit(string $attribute, string $value, array $parameters, $validator): bool
    {
        if (strlen($value) !== 11) {
            return false;
        }

        $result = 0;
        for ($i = 0; $i <= 9; ++$i) {
            $result += $value[9 - $i] * (2 + ($i % 6));
        }

        $checksum = 11 - ($result % 11);
        $checksum = $checksum === 11 ? 0 : $checksum;

        return (string) $checksum === $value[-1];
    }

    public function replaceCuit(string $message, string $attribute, string $rule, array $parameters): string
    {
        return str_replace($message, 'El CUIT-CUIL ingresado no es valido.', $message);
    }
}
