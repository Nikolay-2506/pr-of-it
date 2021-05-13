<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class Errors extends Exception
{
    protected array $errors;

    public function add(Throwable $exception)
    {
        $this->errors[] = $exception;
    }

    public function empty()
    {
        return empty($this->errors);
    }
}