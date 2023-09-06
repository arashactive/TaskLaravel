<?php

namespace App\Services;

use App\Http\Traits\XmlSaveTrait;
use App\Models\File;
use App\Repositories\Contracts\FileRepositoryInterface;
use App\Repositories\Contracts\RefundRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class FileService
{
    public FileRepositoryInterface $repository;

    /**
     * The refund repository instance.
     *
     * @var RefundRepositoryInterface
     */
    public RefundRepositoryInterface $refundRepository;

    public function __construct(
        FileRepositoryInterface $fileRepositoryInterface,
        RefundRepositoryInterface $refundRepository
    ) {
        $this->repository = $fileRepositoryInterface;
        $this->refundRepository = $refundRepository;
    }

    /**
     * Store the XML file and create a new file record.
     *
     * @param array $items
     * @param string $exceptionPath
     * @return File
     */
    public function toDatabase(string $excelPath, string $xmlPath): File
    {
        return $this->repository->create(
            $excelPath,
            'xlsx',
            $xmlPath,
        );
    }

    /**
     * Store refund data in the database.
     *
     * @param int $file_id The file ID
     * @param array $items Array of refund data items
     * @return void
     */
    public function storeRefundsInDatabase(int $file_id, array $items): void
    {
        $bulks = [];
        foreach (array_slice($items, 1) as [$name, $iban, $bic, $amount, $refrence, $end2end, $description]) {
            $bulks[] = [
                'file_id' => $file_id,
                'name' => $name,
                'iban' => $iban,
                'bic' => $bic,
                'amount' => $amount,
                'refrence' => $refrence,
                'end2end' => $end2end,
                'description' => $description
            ];
        }
        $this->refundRepository->create($bulks);
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
}
