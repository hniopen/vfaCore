<?php

namespace App\Models\Dwsync;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DwEntityType
 * @package App\Models\Dwsync
 * @version September 20, 2017, 10:32 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection DwProject
 * @property string type
 * @property string apiUrl
 */
class DwEntityType extends Model
{
    use SoftDeletes;

    public $table = 'dw_entity_types';
    public $timestamps = false;

    protected $dates = ['deleted_at'];


    public $fillable = [
        'type',
        'apiUrl'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'type' => 'string',
        'apiUrl' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type' => 'required|unique:dw_entity_types',
        'apiUrl' => 'required:url'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dwProjects()
    {
        return $this->hasMany(\App\Models\Dwsync\DwProject::class, 'entityType', 'type');
    }
}
