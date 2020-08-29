<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Lokets;
use App\Repositories\BaseRepository;

/**
 * Class LoketsRepository
 * @package App\Repositories\Admin
 * @version August 29, 2020, 5:15 am UTC
*/

class LoketsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'schedule',
        'quota',
        'hostId',
        'status',
        'created_by',
        'updated_by'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Lokets::class;
    }
}
