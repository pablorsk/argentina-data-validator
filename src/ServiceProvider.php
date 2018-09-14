<?php
/**
 * Copyright (C) 2018-2018 Pablo Reyes <pablo@reyesoft.com>.
 *
 * This file is part of ArgentinaDataValidator. ArgentinaDataValidator
 * distributed under MIT Licence.
 */

declare(strict_types=1);

namespace ArgentinaDataValidator;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot(): void
    {
        $this->registerValidationRules($this->app['validator']);
    }

    protected function registerValidationRules(\Illuminate\Contracts\Validation\Factory $validator): void
    {
        $validator->extend('cuit', 'ArgentinaDataValidator\CuitValidator@validateCuit');
        $validator->replacer('cuit', 'ArgentinaDataValidator\CuitValidator@replaceCuit');
        $validator->extend('cbu', 'ArgentinaDataValidator\CbuValidator@validateCbu');
        $validator->replacer('cbu', 'ArgentinaDataValidator\CbuValidator@replaceCbu');
    }
}
