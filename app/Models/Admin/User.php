<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @package App\Models\Admin
 * @version September 2, 2020, 3:14 am UTC
 *
 * @property string $name
 * @property string $email
 * @property string|\Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string|\Carbon\Carbon $dateOfBirth
 * @property string $phone
 * @property string $address
 * @property string $city
 * @property integer $gender
 * @property string $remember_token
 * @property string $blood
 * @property string $idKtp
 * @property string $photo
 * @property integer $status
 * @property integer $roles
 * @property string|\Carbon\Carbon $login_at
 * @property string $login_ip
 */
class User extends Model
{
    use SoftDeletes;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
        'roles',
        'login_at',
        'login_ip'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'dateOfBirth' => 'datetime',
        'phone' => 'string',
        'address' => 'string',
        'city' => 'string',
        'gender' => 'integer',
        'remember_token' => 'string',
        'blood' => 'string',
        'idKtp' => 'string',
        'photo' => 'string',
        'status' => 'integer',
        'roles' => 'integer',
        'login_at' => 'datetime',
        'login_ip' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:191',
        'email' => 'required|string|max:191',
        'email_verified_at' => 'nullable',
        'password' => 'required|string|max:191',
        'dateOfBirth' => 'nullable',
        'phone' => 'nullable|string|max:191',
        'address' => 'nullable|string',
        'city' => 'nullable|string|max:191',
        'gender' => 'nullable|integer',
        'remember_token' => 'nullable|string|max:100',
        'blood' => 'nullable|string|max:5',
        'idKtp' => 'nullable|string|max:191',
        'photo' => 'nullable|string|max:191',
        'status' => 'nullable|integer',
        'roles' => 'nullable|integer',
        'login_at' => 'nullable',
        'login_ip' => 'nullable|string|max:20',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
