<?php


namespace App\Exceptions;


use App\Exception;

class RegisterException extends \Exception
{
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}