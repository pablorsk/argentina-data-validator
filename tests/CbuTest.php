<?php
/**
 * Copyright (C) 2018-2018 Pablo Reyes <pablo@reyesoft.com>.
 *
 * This file is part of ArgentinaDataValidator. ArgentinaDataValidator
 * distributed under MIT Licence.
 */

declare(strict_types=1);

namespace Tests;

use ArgentinaDataValidator\Cbu;
use PHPUnit\Framework\TestCase;

class CbuTest extends TestCase
{
    public function testCuit(): void
    {
        $this->assertFalse(Cbu::isValid('111111111'));
        $this->assertFalse(Cbu::isValid('AAAAA0000'));
        $this->assertFalse(Cbu::isValid('2851396540094708965758'));
        $this->assertTrue(Cbu::isValid('2850396540094708965758'));
        $this->assertFalse(Cbu::isValid('0720262188000036092117'));
        $this->assertTrue(Cbu::isValid('0720262188000036092118'));
    }
}
