<?php
/**
 * Copyright (C) 2018-2018 Pablo Reyes <pablo@reyesoft.com>.
 *
 * This file is part of ArgentinaDataValidator. ArgentinaDataValidator
 * distributed under MIT Licence.
 */

declare(strict_types=1);

namespace ArgentinaDataValidator;

class Cbu
{
    public static function isValid(string $cbu): bool
    {
        if (!preg_match('/[0-9]{22}/', $cbu)) {
            return false;
        }

        if ($cbu[7] !== self::getChecksumDigit(substr($cbu, 0, 7))) {
            return false;
        }
        if ($cbu[21] !== self::getChecksumDigit(substr($cbu, 8, 13))) {
            return false;
        }

        return true;
    }

    private static function getChecksumDigit(string $value): string
    {
        $ponderador = [3, 1, 7, 9];
        $sum = 0;
        $j = 0;
        for ($i = \strlen($value) - 1; $i >= 0; --$i) {
            $sum += ($value[$i] * $ponderador[$j % 4]);
            ++$j;
        }

        return (string) ((10 - $sum % 10) % 10);
    }
}
