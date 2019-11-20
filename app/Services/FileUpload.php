<?php


namespace App\Services;

use App\Http\Requests\FileRequest;

class FileUpload
{
    public function fileUpload(FileRequest $request)
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads','public');
            return $path;
        }
    }
}
