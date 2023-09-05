<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;
use SimpleXMLElement;

trait XmlSaveTrait
{
    /**
     * Store XML data in a file.
     *
     * @param array $array The array to be converted to XML and stored
     * @return string|false The filename if successful, false otherwise
     */
    public function storeXml(array $array): string|false
    {
        $filename = time() . '-customer.xml';
        $xmlContent = $this->arrayToXML($array);
        if (!Storage::disk('local')->put($filename, $xmlContent)) {
            return false;
        }

        return $filename;
    }

    /**
     * Convert an array to an XML string.
     *
     * @param array $items The array to be converted to XML
     * @return string The generated XML string
     */
    protected function arrayToXML(array $items): string
    {
        $xml = new SimpleXMLElement('<root/>');
        array_walk_recursive($items, [$xml, 'addChild']);
        return $xml->asXML();
    }
}