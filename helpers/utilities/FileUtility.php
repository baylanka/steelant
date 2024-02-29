<?php

namespace helpers\utilities;

class FileUtility
{
    /**
     * @throws \Exception
     */
    public static function upload(array $file, string $target): void
    {
        try {
            if(!move_uploaded_file($file['tmp_name'], $target)){
                $message = basename($file['name']) . " is not uploaded";
                $errors = [
                    "There was an error uploading your file.",
                    "Please try again"
                ];
                ResponseUtility::response($message,422, $errors);
            }
        }catch(\Exception $ex){
            throw new \Exception($ex->getMessage());
        }
    }

    public static function getType(array $file): string
    {
        $filename = basename($file['name']);
        return strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    }

    public static function getName($file)
    {
        return pathinfo($file['name'], PATHINFO_FILENAME);
    }

    public static function getSize(array $file)
    {
        return $file["size"];
    }
}