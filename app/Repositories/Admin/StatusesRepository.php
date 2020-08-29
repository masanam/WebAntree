<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Statuses;
use App\Repositories\BaseRepository;

/**
 * Class StatusesRepository
 * @package App\Repositories\Admin
 * @version August 29, 2020, 5:15 am UTC
*/

class StatusesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
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
        return Statuses::class;
    }
}
