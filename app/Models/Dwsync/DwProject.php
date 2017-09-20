<?php

namespace App\Models\Dwsync;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DwProject
 * @package App\Models\Dwsync
 * @version September 20, 2017, 11:02 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection DwQuestion
 * @property \App\Models\Dwsync\DwEntityType dwEntityType
 * @property string questCode
 * @property string submissionTable
 * @property integer parentId
 * @property string comment
 * @property tinyInteger isDisplayed
 * @property string xformUrl
 * @property string credential
 * @property string entityType
 * @property string formType
 */
class DwProject extends Model
{
    use SoftDeletes;

    public $table = 'dw_projects';
    public $timestamps = false;

    protected $dates = ['deleted_at'];


    public $fillable = [
        'questCode',
        'submissionTable',
        'parentId',
        'comment',
        'isDisplayed',
        'xformUrl',
        'credential',
        'entityType',
        'formType'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'questCode' => 'string',
        'submissionTable' => 'string',
        'parentId' => 'integer',
        'comment' => 'string',
        'xformUrl' => 'string',
        'credential' => 'string',
        'entityType' => 'string',
        'formType' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'questCode' => 'required',
        'submissionTable' => 'nullable',
        'parentId' => 'nullable:numeric',
        'comment' => 'nullable',
        'isDisplayed' => 'min:0|max:1',
        'xformUrl' => 'nullable',
        'credential' => 'required',
        'entityType' => 'required',
        'formType' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dwQuestions()
    {
        return $this->hasMany(\App\Models\Dwsync\DwQuestion::class, 'projectId', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dwEntityType()
    {
        return $this->belongsTo(\App\Models\Dwsync\DwEntityType::class, 'entityType', 'type');
    }
}
