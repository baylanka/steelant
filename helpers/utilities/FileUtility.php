<?php

namespace helpers\utilities;

class FileUtility
{
    const VideoExtension =  ['mp4', 'mpeg', 'mov', 'wmv', 'flv', 'webm', 'mkv'];
    const videoFileType =  [
        'video/mp4',
        'video/mpeg',
        'video/quicktime',
        'video/x-ms-wmv',
        'video/x-flv',
        'video/webm',
        'video/x-matroska'
    ];

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
    public static function isVideo(array $file): bool
    {
        return in_array($file['type'], self::videoFileType);
    }

    public static function deleteFile($path)
    {
        if(file_exists($path)){
            if(@unlink($path)){
                return;
            }

            exec("rm -r " . $path);
        }
    }

    public static function getFileNamePhraseFromURL($fileUrl)
    {
        $filePathArray = explode('/', $fileUrl);
        return  $filePathArray[sizeof($filePathArray)-1];
    }


    public static function getFileExtensionFromURL($fileUrl)
    {
        $fileName = self::getFileNamePhraseFromURL($fileUrl);
        $fileNameSplits =  explode('.', $fileName);
        return $fileNameSplits[sizeof($fileNameSplits)-1];
    }

    public static function isImageExtension($fileExtension): bool
    {
        return in_array($fileExtension, self::VideoExtension);
    }

    public static function stripeFileName(string $fileNameWithExtension)
    {
        $fileNameSplits =  explode('.', $fileNameWithExtension);
        array_pop($fileNameSplits);
        return implode(' ', $fileNameSplits);
    }

    public static function fileExists($path)
    {
        return file_exists($path);
    }
}