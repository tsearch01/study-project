<?php


class MediaHandler
{
    public static function imageValidator(): string
    {
        $errorMessage = '';
        //conditional logic inspection of file.
        return $errorMessage;
    }

    public static function imageHandler(int $id): bool|string
    {
        $imageRelPath = '/img/performance/' . $id . '/' . $_FILES['perf_img']['name'];
        $imageUploadFile = PUBLIC_ROOT . $imageRelPath;
        $imageUploadDir = PUBLIC_ROOT . '/img/performance/'.$id .'/';
        echo $imageUploadFile;
        if (!is_dir($imageUploadDir)) {
            if (!mkdir($imageUploadDir)) {
                echo 'failed to make directory';
            };
        }
        if (!move_uploaded_file($_FILES['perf_img']['tmp_name'], $imageUploadFile)) {
            echo 'failed to move file!';
            print_r($_FILES['perf_img']);
            return false;
        };
        return $imageRelPath;
    }
}

