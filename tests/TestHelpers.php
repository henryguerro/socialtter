<?php

namespace Tests;

use App\User;
use Illuminate\Contracts\Console\Kernel;

trait TestHelpers
{
    protected function createUser(array $attributes = [], $action = 'create')
    {
        return factory(User::class)->$action($attributes);
    }
}