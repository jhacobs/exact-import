<?php

namespace Exact\Exceptions;

use Exception;
use Throwable;

class QueryProviderNotFoundException extends Exception
{
    public function __construct(
        $message = 'Query Provider Not Found',
        $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
