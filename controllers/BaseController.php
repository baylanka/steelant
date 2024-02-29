<?php

namespace controllers;
use helpers\utilities\ResponseUtility;

class BaseController
{
    protected static function response($message, $errors=[], $statusCode = 200)
    {
       ResponseUtility::response($message, $statusCode, $errors);
    }
}
