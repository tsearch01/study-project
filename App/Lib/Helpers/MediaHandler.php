<?php

class MediaHandler
{
    public static function imageValidator(): string
    {
        print_r($_FILES);
        $validMimes=['image/jpeg','image/png'];
        $errorMessage = "";
        //conditional logic inspection of file.
        if ($_FILES['perf_img']['size'] >= 100000) {
            //upload_max_filesize=40M
            $errorMessage = 'file must be under 1MB';
        } elseif (strlen($_FILES['perf_img']['name']) >= 20) {
            $errorMessage = 'file name must be under 20 characters';
        } elseif (!in_array(mime_content_type($_FILES['perf_img']['tmp_name']), $validMimes)) {
            $errorMessage = 'file name must be of type image/jpeg, image/png';
        }
        return $errorMessage;
    }

    public static function imageHandler(int $id): bool|string
    {
        $imageRelPath = '/' . $id . '/' . $_FILES['perf_img']['name'];
        $imageUploadDir = PUBLIC_ROOT . '/img/performance/'. $id .'/';
        $imageUploadFile = PUBLIC_ROOT . '/img/performance' . $imageRelPath;
        if (!is_dir($imageUploadDir)) {
            if (!mkdir($imageUploadDir)) {
                echo 'failed to make directory';
            };
        }
        $prevImage = scandir($imageUploadDir, 1);
        var_dump($prevImage);
        if (count($prevImage)>2) {
            unlink($imageUploadDir.$prevImage[0]);
        }
        if (!move_uploaded_file($_FILES['perf_img']['tmp_name'], $imageUploadFile)) {
            echo 'failed to move file!';
            print_r($_FILES['perf_img']);
            return false;
        };
        return $imageRelPath;
    }
}

