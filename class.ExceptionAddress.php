<?php

/**
 * Custom Exception handler
 */
class ExceptionAddress extends Exception
{
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}] : {$this->message}\n";
    }
}