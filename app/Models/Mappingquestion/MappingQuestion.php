<?php

namespace App\Models\Mappingquestion;

use Eloquent as Model;

/**
 * Class MappingQuestion
 * @package App\Models\Mappingquestion
 * @version October 11, 2017, 5:51 am UTC
 *
 * @property \App\Models\Mappingquestion\MappingProject mappingProject
 * @property \App\Models\Mappingquestion\DwQuestion dwQuestion
 * @property \App\Models\Mappingquestion\DwQuestion dwQuestion
 * @property integer mappingProjectId
 * @property integer question1
 * @property integer question2
 * @property string functions
 * @property string arg1
 * @property string arg2
 */
class MappingQuestion extends Model
{

    public $table = 'mapping_questions';
    public $timestamps = false; /* forced to be false  */


    public $fillable = [
        'mappingProjectId',
        'question1',
        'question2',
        'functions',
        'arg1',
        'arg2'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'mappingProjectId' => 'integer',
        'question1' => 'integer',
        'question2' => 'integer',
        'functions' => 'string',
        'arg1' => 'string',
        'arg2' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'mappingProjectId' => 'nullable|min:0',
        'question1' => 'nullable|min:0',
        'question2' => 'nullable|min:0',
        'functions' => 'nullable',
        'arg1' => 'nullable',
        'arg2' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function mappingProject()
    {
        return $this->belongsTo(\App\Models\Mappingquestion\MappingProject::class, 'mappingProjectId', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dwQuestion()
    {
        return $this->belongsTo(\App\Models\Mappingquestion\DwQuestion::class, 'question1', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dwQuestion()
    {
        return $this->belongsTo(\App\Models\Mappingquestion\DwQuestion::class, 'question2', 'id');
    }
}
