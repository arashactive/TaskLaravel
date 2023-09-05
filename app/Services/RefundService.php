<?php

namespace App\Services;

use App\Http\Requests\RefundRequest;
use App\Http\Traits\FileUploadTrait;
use App\Models\File;
use App\Repositories\Contracts\RefundRepositoryInterface;
use Illuminate\Support\Facades\App;

/**
 * Class RefundService
 *
 * Service responsible for handling refund-related operations.
 *
 * @package App\Services
 */
class RefundService
{
    use FileUploadTrait;

    /**
     * The refund repository instance.
     *
     * @var RefundRepositoryInterface
     */
    public RefundRepositoryInterface $refundRepository;

    /**
     * RefundService constructor.
     *
     * @param RefundRepositoryInterface $refundRepository
     */
    public function __construct(RefundRepositoryInterface $refundRepository)
    {
        $this->refundRepository = $refundRepository;
    }

    /**
     * Upload and save refund data from the request.
     *
     * @param RefundRequest $request
     * @return string The uploaded file path
     */
    public function upload(RefundRequest $request): string
    {
        $excelUpload = $this->saveFiles($request);
        return $excelUpload->file;
    }

    /**
     * Process the uploaded file, store XML and refund data, and create logs.
     *
     * @param string $file The uploaded file path
     * @return File The stored file model
     */
    public function execute(string $file): File
    {
        // Convert excel file to array
        $excelToArray = App::make(ExcelService::class)->excelToArray($file);

        // Store XML file with storage and store info into database
        $file = App::make(XmlService::class)->toStore($excelToArray, $file);

        // Create logs of customers into refunds table
        $this->storeRefundsInDatabase($file->id, $excelToArray);
        return $file;
    }

    /**
     * Store refund data in the database.
     *
     * @param int $file_id The file ID
     * @param array $items Array of refund data items
     * @return void
     */
    protected function storeRefundsInDatabase(int $file_id, array $items): void
    {
        $bulks = [];
        foreach (array_slice($items, 1) as [$name, $iban, $bic, $amount]) {
            $bulks[] = [
                'file_id' => $file_id,
                'name' => $name,
                'iban' => $iban,
                'bic' => $bic,
                'amount' => $amount
            ];
        }
        $this->refundRepository->create($bulks);
    }
}
