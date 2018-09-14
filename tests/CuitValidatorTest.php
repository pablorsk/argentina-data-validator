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

class CuitValidatorTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class => ServiceProvider::class,
        ];
    }

    public function testCuitRuleStrictWithInvalidCuit(): void
    {
        $rule = [
            'cuit' => 'cuit',
        ];

        $invalidCuits = ['42319731467', '20999999997', '20349735981', '123'];

        foreach ($invalidCuits as $cuit) {
            $validator = Validator::make(
                [
                    'cuit' => $cuit,
                ], $rule
            );
            $error = $validator->errors()->messages()['cuit'][0];
            $this->assertSame($error, 'El CUIT-CUIL ingresado no es válido.');
        }
    }

    public function testCuitRuleStrictWithValidCuit(): void
    {
        $rule = [
            'cuit' => 'cuit',
        ];

        $validCuits = ['20319731467', '23129006544', '20385823631'];

        foreach ($validCuits as $cuit) {
            /** @var \Illuminate\Validation\Validator */
            $validator = Validator::make(
                [
                    'cuit' => $cuit,
                ], $rule
            );
            $this->assertTrue($validator->passes());
        }
    }
}
