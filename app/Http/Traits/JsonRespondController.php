<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;

trait JsonRespondController
{
    /**
     * @var int
     */
    protected $httpStatusCode = 200;

    /**
     * @var int
     */
    protected $errorCode;

    /**
     * Get HTTP status code of the response.
     *
     * @return int
     */
    public function getHTTPStatusCode()
    {
        return $this->httpStatusCode;
    }

    /**
     * Set HTTP status code of the response.
     *
     * @param  int  $statusCode
     * @return self
     */
    public function setHTTPStatusCode($statusCode)
    {
        $this->httpStatusCode = $statusCode;

        return $this;
    }

    /**
     * Get error code of the response.
     *
     * @return int
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * Set error code of the response.
     *
     * @param  int  $errorCode
     * @return self
     */
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;

        return $this;
    }

    /**
     * Sends a JSON to the consumer.
     *
     * @param  array  $data
     * @param  array  $headers  [description]
     * @return JsonResponse
     */
    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getHTTPStatusCode(), $headers);
    }


    /**
     * Sends a response not found (404) to the request.
     * Error Code = 31.
     *
     * @return JsonResponse
     */
    public function respondNotFound()
    {
        return $this->setHTTPStatusCode(404)
            ->setErrorCode(31)
            ->respondWithError();
    }

    /**
     * Sends a response invalid query (http 500) to the request.
     * Error Code = 40.
     *
     * @param  string  $message
     * @return JsonResponse
     */
    public function respondInvalidQuery($message = null)
    {
        return $this->setHTTPStatusCode(500)
            ->setErrorCode(40)
            ->respondWithError($message);
    }


    /**
     * Sends a response unauthorized (401) to the request.
     * Error Code = 42.
     *
     * @param  string  $message
     * @return JsonResponse
     */
    public function respondUnauthorized($message = null)
    {
        return $this->setHTTPStatusCode(401)
            ->setErrorCode(42)
            ->respondWithError($message);
    }

    /**
     * Sends an error when the validation manual failed
     * Error Code = 44.
     *
     * @param  Validator  $validator
     * @return JsonResponse
     */
    public function respondValidatFailed($message = null)
    {
        return $this->setHTTPStatusCode(422)
            ->setErrorCode(44)
            ->respondWithError($message);
    }

    /**
     * Sends a response with error.
     *
     * @param  string|array  $message
     * @return JsonResponse
     */
    public function respondWithError($message = null)
    {
        return $this->respond([
            'error' => [
                'message' => $message ?? config('api.error_codes.' . $this->getErrorCode()),
                'error_code' => $this->getErrorCode(),
            ],
        ]);
    }
}
