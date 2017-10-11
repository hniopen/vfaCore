<?php

namespace App\Models\Mappingproject;

use Eloquent as Model;

/**
 * Class MappingProject
 * @package App\Models\Mappingproject
 * @version October 6, 2017, 11:35 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection MappingQuestion
 * @property \App\Models\Mappingproject\DwProject dwProject
 * @property \App\Models\Mappingproject\DwProject dwProject
 * @property integer project1
 * @property integer project2
 * @property string dateLastExported
 * @property tinyInteger isActive
 */
class MappingProject extends Model
{

    public $table = 'mapping_projects';
    public $timestamps = false; /* forced to be false  */


    public $fillable = [
        'project1',
        'project2',
        'dateLastExported',
        'isActive'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'project1' => 'integer',
        'project2' => 'integer',
        'dateLastExported' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project1' => 'nullable|min:0',
        'project2' => 'nullable|min:0',
        'isActive' => 'min:0|max:1'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function mappingQuestions()
    {
        return $this->hasMany(\App\Models\Mappingproject\MappingQuestion::class, 'mappingProjectId', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dwProject()
    {
        return $this->belongsTo(\App\Models\Mappingproject\DwProject::class, 'project1', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dwProject()
    {
        return $this->belongsTo(\App\Models\Mappingproject\DwProject::class, 'project2', 'id');
    }
}
