<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Lokets
 * @package App\Models\Admin
 * @version August 29, 2020, 5:15 am UTC
 *
 * @property string $title
 * @property string $description
 * @property string $schedule
 * @property integer $quota
 * @property integer $hostId
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 */
class Lokets extends Model
{
    use SoftDeletes;

    public $table = 'lokets';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'schedule' => 'string',
        'quota' => 'integer',
        'hostId' => 'integer',
        'status' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'nullable|string|max:191',
        'description' => 'nullable|string',
        'schedule' => 'nullable|string|max:191',
        'quota' => 'nullable|integer',
        'hostId' => 'nullable|integer',
        'status' => 'nullable|integer',
        'created_by' => 'nullable|integer',
        'updated_by' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
