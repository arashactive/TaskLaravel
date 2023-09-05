<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class File
 *
 * Model representing a file record in the database.
 *
 * @package App\Models
 */
class File extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file', 'file_type', 'xml_file', 'xml_generate'
    ];

    /**
     * Define a one-to-many relationship with Refund model.
     *
     * @return HasMany
     */
    public function refunds(): HasMany
    {
        return $this->hasMany(Refund::class, 'file_id', 'id');
    }
}