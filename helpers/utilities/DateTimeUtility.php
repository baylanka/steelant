<?php

namespace helpers\utilities;

class DateTimeUtility
{
    public static function getCurrentDate($format = "Y/m/d")
    {
        return date($format);
    }
}