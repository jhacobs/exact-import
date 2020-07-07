<?php

namespace Exact\Facades;

use Exact\Queries\EmployeesQuery;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void import(object $job)
 * @method static void queue(object $job)
 * @method static EmployeesQuery employees()
 */
class Exact extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'excel';
    }
}
