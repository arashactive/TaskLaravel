<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait XmlSaveTrait
{
    /**
     * Store XML data in a file.
     *
     * @param array $array The array to be converted to XML and stored
     * @return string|false The filename if successful, false otherwise
     */
    public function storeXml(string $xmlContent): string|false
    {
        $filename = time() . '-customer.xml';
        if (!Storage::disk('local')->put($filename, $xmlContent)) {
            return false;
        }

        return $filename;
    }
}