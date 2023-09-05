<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Traits\JsonRespondController;
use App\Services\XmlService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class XmlController extends Controller
{
    use JsonRespondController;
    
    /**
     * The XmlService instance.
     *
     * @var XmlService
     */
    protected XmlService $service;

    /**
     * XmlController constructor.
     *
     * @param XmlService $service The XmlService instance
     */
    public function __construct(XmlService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of XMLs saved before.
     *
     * @return JsonResponse The JSON response containing the result
     */
    public function listXML(): JsonResponse
    {
        try {
            return $this->respond($this->service->getAll());
        } catch (QueryException $e) {
            return $this->respondInvalidQuery($e->getMessage());
        }
    }

    /**
     * Get XML info by ID.
     *
     * @param int $id The ID of the XML
     * @return JsonResponse The JSON response containing the result
     */
    public function xmlById(int $id): JsonResponse
    {
        try {
            return $this->respond($this->service->findById($id));
        } catch (ModelNotFoundException $e) {
            return $this->respondNotFound();
        } catch (ValidationException $e) {
            return $this->respondValidatorFailed($e->validator);
        } catch (QueryException $e) {
            return $this->respondInvalidQuery($e->getMessage());
        }
    }

    /**
     * Get XML info and generate a download link for the XML.
     *
     * @param int $id The ID of the XML
     * @return JsonResponse The response with the download link or error response
     */
    public function download(int $id)
    {
        try {
            return $this->service->toDownload($id);
        } catch (ModelNotFoundException $e) {
            return $this->respondNotFound();
        } catch (ValidationException $e) {
            return $this->respondValidatorFailed($e->validator);
        } catch (QueryException $e) {
            return $this->respondInvalidQuery($e->getMessage());
        }
    }

    /**
     * Get log entries related to an XML by its ID.
     *
     * @param int $id The ID of the XML
     * @return JsonResponse The JSON response containing the log entries or error response
     */
    public function logById(int $id): JsonResponse
    {
        try {
            $file = $this->service->findById($id);
            return $this->respond($file->refunds()->paginate());
        } catch (ModelNotFoundException $e) {
            return $this->respondNotFound();
        } catch (ValidationException $e) {
            return $this->respondValidatorFailed($e->validator);
        } catch (QueryException $e) {
            return $this->respondInvalidQuery($e->getMessage());
        }
    }
}
