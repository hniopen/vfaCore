<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Setting
 * @package App\Models
 * @version September 18, 2017, 3:33 pm UTC
 *
 * @property string name
 * @property string comment
 */
class Setting extends Model
{
    use SoftDeletes;

    public $table = 'settings';
    public $timestamps = false;


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'comment'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'comment' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}
