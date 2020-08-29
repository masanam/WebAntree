<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Hosts
 * @package App\Models\Admin
 * @version August 29, 2020, 5:24 am UTC
 *
 * @property string $title
 * @property string $contact
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $city
 * @property string $photo
 * @property string $description
 * @property integer $categoryId
 * @property integer $status
 */
class Hosts extends Model
{
    use SoftDeletes;

    public $table = 'hosts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'contact' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'address' => 'string',
        'city' => 'string',
        'photo' => 'string',
        'description' => 'string',
        'categoryId' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:191',
        'contact' => 'nullable|string|max:191',
        'email' => 'nullable|string|max:191',
        'phone' => 'nullable|string|max:191',
        'address' => 'nullable|string',
        'city' => 'required|string|max:191',
        'photo' => 'required|string|max:191',
        'description' => 'nullable|string',
        'categoryId' => 'nullable|integer',
        'status' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
