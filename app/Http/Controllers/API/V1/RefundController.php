<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RefundRequest;
use App\Http\Traits\JsonRespondController;
use App\Services\RefundService;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

/**
 * Class RefundController
 *
 * Controller for handling refund-related operations.
 *
 * @package App\Http\Controllers\Api\V1
 */
class RefundController extends Controller
{
    use JsonRespondController;

    /**
     * The RefundService instance.
     *
     * @var RefundService
     */
    protected RefundService $service;

    /**
     * RefundController constructor.
     *
     * @param RefundService $service The RefundService instance
     */
    public function __construct(RefundService $service)
    {
        $this->service = $service;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RefundRequest $request The refund request instance
     * @return JsonResponse The JSON response containing the result
     */
    public function uploadCustomers(RefundRequest $request): JsonResponse
    {
        try {
            $filePath = $this->service->upload($request);
            return $this->respond($this->service->execute($filePath));
        } catch (ValidationException $e) {
            return $this->respondValidatFailed($e->validator);
        } catch (QueryException $e) {
            return $this->respondInvalidQuery($e->getMessage());
        }
    }
}
