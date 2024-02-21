<?php

namespace helpers\utilities;

class DateTimeUtility
{
    public static function getCurrentDate($format = "Y/m/d")
    {
        return date($format);
    }

    public static function getCurrentDateTime($format = "Y-m-d H:i:s")
    {
        return date($format);
    }
}