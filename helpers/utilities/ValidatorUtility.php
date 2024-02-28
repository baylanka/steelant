<?php

namespace helpers\utilities;

class ValidatorUtility
{
    public static function required(array $collection, string $key)
    {
        return isset($collection[$key]) && self::min($collection[$key], 1);
    }

    public static function string($value)
    {
        return is_string($value);
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function numeric($value)
    {
        return is_numeric($value);
    }

    public static function min($value, $limit)
    {
        if(is_numeric($value)){
            $size = $value;
        }elseif(is_array($value)){
            $size = sizeof($value);
        }else{
            $size = strlen(trim($value));
        }

        return $size >= $limit;

    }

    public static function max($value, $limit)
    {
        if(is_numeric($value)){
            $size = $value;
        }elseif(is_array($value)){
            $size = sizeof($value);
        }else{
            $size = strlen(trim($value));
        }

        return $size <= $limit;
    }

    public static function between($value, $lower, $upper)
    {
        if(is_numeric($value)){
            $size = $value;
        }elseif(is_array($value)){
            $size = sizeof($value);
        }else{
            $size = strlen(trim($value));
        }

        return $size >= $lower && $size <= $upper;
    }

    public static function regex(string $value,$pattern) : bool
    {
        return preg_match($pattern, $value);
    }

    public static function isImage(array $file): bool
    {
        return getimagesize($file["tmp_name"]) !== false;
    }

    public static function isAcceptedType(array $file, array $acceptedValues): bool
    {
        $type = FileUtility::getType($file);
        return in_array($type, $acceptedValues);
    }

    public static function maxFileSize(array $file, $maxSize): bool
    {
        $maxSize = (float) $maxSize;
        $fileSize = (float) FileUtility::getSize($file);
        return $fileSize <= $maxSize;
    }

    public static function minFileSize(array $file, $minSize): bool
    {
        $minSize = (float) $minSize;
        $fileSize = (float) FileUtility::getSize($file);
        return $fileSize >= $minSize;
    }
}