<?php

namespace App\Exceptions;

use Exception as BaseException; // Alias the base Exception class

class CustomException extends BaseException
{
    /**
     * Report the exception.
     */
    public function report(): void
    {
        // Custom reporting logic here
    }
}
