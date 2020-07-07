<?php

namespace Exact\Exceptions;

use Exception;
use Throwable;

class InvalidImportJobTypeException extends Exception
{
    public function __construct(
        $message = 'The given import job must extend from ExactImport',
        $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
