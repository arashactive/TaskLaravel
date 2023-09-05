<?php

namespace App\Services;

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
