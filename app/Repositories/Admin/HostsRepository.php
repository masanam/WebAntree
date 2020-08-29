<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Hosts;
use App\Repositories\BaseRepository;

/**
 * Class HostsRepository
 * @package App\Repositories\Admin
 * @version August 29, 2020, 5:24 am UTC
*/

class HostsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'contact',
        'email',
        'phone',
        'address',
        'city',
        'photo',
        'description',
        'categoryId',
        'status'
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
        return Hosts::class;
    }
}
