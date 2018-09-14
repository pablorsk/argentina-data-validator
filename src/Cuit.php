<?php
/**
 * Copyright (C) 2018-2018 Pablo Reyes <pablo@reyesoft.com>.
 *
 * This file is part of ArgentinaDataValidator. ArgentinaDataValidator
 * distributed under MIT Licence.
 */

declare(strict_types=1);

namespace ArgentinaDataValidator;

class Cuit
{
    public static function isValid(int $cuit_number): bool
    {
        $cuit = (string) $cuit_number;

        if (strlen($cuit) !== 11) {
            return false;
        }

        $result = 0;
        for ($i = 0; $i <= 9; ++$i) {
            $result += $cuit[9 - $i] * (2 + ($i % 6));
        }

        $checksum = 11 - ($result % 11);
        $checksum = $checksum === 11 ? 0 : $checksum;

        return (string) $checksum === $cuit[-1];
    }
}
