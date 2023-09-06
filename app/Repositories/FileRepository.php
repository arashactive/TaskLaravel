<?php

namespace App\Repositories;

use App\Models\File;
use App\Repositories\Contracts\FileRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class FileRepository implements FileRepositoryInterface
{

    /**
     * The File model instance.
     *
     * @var File
     */
    protected $model;

    /**
     * FileRepository constructor.
     *
     * @param File $file The File model instance
     */
    public function __construct(File $file)
    {
        $this->model = $file;
    }

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
    ): File {
        return $this->model->create([
            'file' => $file_name,
            'file_type' =>  $file_type,
            'xml_file' => $xml_file
        ]);
    }


    /**
     * Get paginated records of files.
     *
     * @return LengthAwarePaginator A paginator instance containing files
     */
    public function getAll(): LengthAwarePaginator
    {
        return $this->model->orderBy('updated_at', 'desc')->paginate();
    }

    /**
     * Find a file record by its ID.
     *
     * @param int $id The ID of the file to find
     * @return Model The found file model instance
     */
    public function findById(int $id): Model
    {
        return $this->model->findOrFail($id);
    }
}
