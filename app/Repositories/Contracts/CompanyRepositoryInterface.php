<?php

namespace App\Repositories\Contracts;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface CompanyRepositoryInterface
{
    /**
     * Create a new file record in the database.
     *
     * @param string $name The name of the file
     * @param string $file_type The type of the file
     * @param string $xml_file The path to the XML file
     * @return Company The created file model instance
     */
    public function update(
        string $name,
        string $IBAN,
        string $BIC
    ): Company;

    /**
     * Find a file record by its ID in the database.
     *
     * @return Model|null The found file model instance or null if not found
     */
    public function first(): ?Model;
}