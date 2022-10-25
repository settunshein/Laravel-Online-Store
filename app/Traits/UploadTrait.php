<?php

namespace App\Traits;

trait UploadTrait
{
    public function uploadFile($file, $folder)
    {
        $file_name = uniqid(time()) . $file->getClientOriginalName();
        $file->storeAs("public/$folder", $file_name);
        return $file_name;
    }
}