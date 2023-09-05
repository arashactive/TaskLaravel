<?php

namespace App\Repositories\Contracts;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface FileRepositoryInterface
{
    /**
     * Create a new file record in the database.
     *
     * @param string $file_name The name of the file
     * @param string $file_type The type of the file
     * @param string $xml_file The path to the XML file
     * @return File The created file model instance
     */
    public function create(
        string $file_name,
        string $file_type,
        string $xml_file
    ): File;

    /**
     * Get paginated records of files from the database.
     *
     * @return LengthAwarePaginator A paginator instance containing files
     */
    public function getAll(): LengthAwarePaginator;

    /**
     * Find a file record by its ID in the database.
     *
     * @param int $id The ID of the file to find
     * @return Model|null The found file model instance or null if not found
     */
    public function findById(int $id): ?Model;
}