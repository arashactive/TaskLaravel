<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;

trait FileUploadTrait
{

    /**
     * File upload trait used in controllers to upload files
     */
    public function saveFiles(Request $request)
    {

        $uploadPath = public_path(env('UPLOAD_PATH'));
        $thumbPath = public_path(env('UPLOAD_PATH') . '/thumb');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0775);
            mkdir($thumbPath, 0775);
        }

        $finalRequest = $request;

        foreach ($request->all() as $key => $value) {
            if ($request->hasFile($key)) {
                $filename = time() . '-' . $request->file($key)->getClientOriginalName();
                $request->file($key)->move($uploadPath, $filename);
                $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));
            }
        }
        return $finalRequest;
    }
}
