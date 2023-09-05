<?php

namespace App\Repositories;

use App\Models\Refund;
use App\Repositories\Contracts\RefundRepositoryInterface;

class RefundRepository implements RefundRepositoryInterface
{
    /**
     * The Refund model instance.
     *
     * @var Refund
     */
    protected $model;

    /**
     * RefundRepository constructor.
     *
     * @param Refund $refund The Refund model instance
     */
    public function __construct(Refund $refund)
    {
        $this->model = $refund;
    }

    /**
     * Insert an array of bulk data into the refunds table.
     *
     * @param array $bulks The array of bulk data to insert
     * @return void
     */
    public function create(array $bulks): void
    {
        $this->model->insert($bulks);
    }
}
