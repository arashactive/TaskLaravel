<?php

namespace App\Services\Util;

use App\Http\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class ExcelService
 *
 * Service for working with Excel files.
 *
 * @package App\Services
 */
class ExcelService
{
    use FileUploadTrait;

    public function upload(Request $request): string
    {
        $excelUpload = $this->saveFiles($request);
        return $excelUpload->file;
    }

    /**
     * Convert an Excel file to an array of data.
     *
     * @param string $path The path to the Excel file
     * @return array The array of data from the Excel file
     */
    public function excelToArray(string $path): array
    {
        return Excel::toArray(
            collect([]),
            base_path() . '/public/customers/' . $path
        )[0];
    }
}
