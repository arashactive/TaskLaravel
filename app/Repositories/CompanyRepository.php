<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class CompanyRepository implements CompanyRepositoryInterface
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
    public function __construct(Company $company)
    {
        $this->model = $company;
    }

    /**
     * Create a new file record in the database.
     *
     * @param string $file_name The name of the file
     * @param string $file_type The type of the file
     * @param string $xml_file The path to the XML file
     * @return Company The created file model instance
     */
    public function update(
        string $name,
        string $IBAN,
        string $BIC
    ): Company {
        $this->model->truncate();        ;
        return $this->model->create([
            'name' => $name,
            'IBAN' =>  $IBAN,
            'BIC' => $BIC
        ]);
    }

    /**
     * Find a file record by its ID.
     *
     * @param int $id The ID of the file to find
     * @return Model The found file model instance
     */
    public function first(): Model|null
    {
        return $this->model->first();
    }
}
