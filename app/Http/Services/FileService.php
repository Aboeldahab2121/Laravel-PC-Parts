<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;

class FileService
{
    public function upload(UploadedFile $file, $options = null): string
    {
        $path = $file->store('images', $options);

        return $path;
    }
}
