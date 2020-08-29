<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Users;
use App\Repositories\BaseRepository;

/**
 * Class UsersRepository
 * @package App\Repositories\Admin
 * @version August 29, 2020, 4:47 am UTC
*/

class UsersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'dateOfBirth',
        'phone',
        'address',
        'city',
        'gender',
        'remember_token',
        'blood',
        'idKtp',
        'photo',
        'status',
        'login_at',
        'login_ip'
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
        return Users::class;
    }
}
