<?php

namespace App\Services;

use App\Http\Traits\XmlSaveTrait;
use App\Models\File;
use App\Repositories\Contracts\FileRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class XmlService
{
    use XmlSaveTrait;
    public FileRepositoryInterface $repository;

    public function __construct(FileRepositoryInterface $fileRepositoryInterface)
    {
        $this->repository = $fileRepositoryInterface;
    }

    /**
     * Store the XML file and create a new file record.
     *
     * @param array $items
     * @param string $exceptionPath
     * @return File
     */
    public function toStore(array $items, string $excepPath): File
    {
        $path = $this->storeXml($this->mapToXmlFomrat($items));
        return $this->repository->create(
            $excepPath,
            'xlsx',
            $path,
        );
    }

    /**
     * Map the items array to XML format.
     *
     * @param array $items
     * @return array
     */
    protected function mapToXmlFomrat(array $items): array
    {
        $result = [];
        $keys = $items[0];

        for ($i = 1; $i < count($items); $i++) {
            $result[] = array_combine($keys, $items[$i]);
        }

        return $result;
    }

    /**
     * Get all file records.
     *
     * @return File[]
     */
    public function getAll()
    {
        return $this->repository->getAll();
    }

    /**
     * Find a file record by its ID.
     *
     * @param int $id
     * @return File
     */
    public function findById(int $id)
    {
        return $this->repository->findById($id);
    }

    /**
     * Download the XML file by its ID.
     *
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function toDownload(int $id)
    {
        $file = $this->repository->findById($id);
        return Storage::download($file->xml_file);
    }
}
