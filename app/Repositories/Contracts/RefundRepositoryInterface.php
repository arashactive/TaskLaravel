<?php

namespace App\Repositories\Contracts;

/**
 * Interface RefundRepositoryInterface
 *
 * Repository interface for managing refund-related database operations.
 *
 * @package App\Repositories\Contracts
 */
interface RefundRepositoryInterface
{
    /**
     * Insert an array of bulk data into the refunds table.
     *
     * @param array $bulks The array of bulk data to insert
     * @return void
     */
    public function create(array $bulks): void;
}