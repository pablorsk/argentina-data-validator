<?php
/**
 * Copyright (C) 2018-2018 Pablo Reyes <pablo@reyesoft.com>.
 *
 * This file is part of ArgentinaDataValidator. ArgentinaDataValidator
 * distributed under MIT Licence.
 */

declare(strict_types=1);

namespace Tests;

use ArgentinaDataValidator\Cuit;
use PHPUnit\Framework\TestCase;

class CuitTest extends TestCase
{
    public function testCuit(): void
    {
        $this->assertTrue(Cuit::isValid(20305423174));

        $this->assertFalse(Cuit::isValid(20305423175));
        $this->assertFalse(Cuit::isValid(123));
    }
}
