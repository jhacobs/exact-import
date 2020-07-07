<?php

namespace Exact\Contracts;

use Closure;

interface QueryProvider
{
    public function chunk(Closure $callback): QueryProvider;
}
