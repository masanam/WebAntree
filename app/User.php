<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;
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
        'password' => 'required|string|max:191',
        'phone' => 'nullable|string|max:191',
    ];
}
