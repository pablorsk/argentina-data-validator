<?php
/**
 * Copyright (C) 2018-2018 Pablo Reyes <pablo@reyesoft.com>.
 *
 * This file is part of ArgentinaDataValidator. ArgentinaDataValidator
 * distributed under MIT Licence.
 */

declare(strict_types=1);

namespace Tests;

use ArgentinaDataValidator\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Orchestra\Testbench\TestCase;

class CbuValidatorTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class => ServiceProvider::class,
        ];
    }

    public function testValidCbuValidator(): void
    {
        $rule = [
            'cbu' => 'cbu',
        ];

        $validator = Validator::make(
            [
                'cbu' => '0720262188000036092118',
            ], $rule
        );
        $this->assertTrue($validator->passes());
    }

    public function testNoValidCbuValidator(): void
    {
        $rule = [
            'cbu' => 'cbu',
        ];

        $validator = Validator::make(
            [
                'cbu' => 'xxx',
            ], $rule
        );
        $error = $validator->errors()->messages()['cbu'][0];
        $this->assertSame($error, 'El CBU ingresado no es válido.');
    }
}
