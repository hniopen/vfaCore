<?php

namespace App\Models\Dwsubmissions;

use Eloquent as Model;

/**
 * Class DwSubmissionValuevil
 * @package App\Models\Dwsubmissions
 * @version October 16, 2017, 12:48 pm UTC
 *
 * @property \App\Models\Dwsubmissions\DwProject dwProject
 * @property \Illuminate\Database\Eloquent\Collection DwSubmissionValuevil
 * @property \App\Models\Dwsubmissions\DwQuestion dwQuestion
 * @property \App\Models\Dwsubmissions\DwSubmissionvil dwSubmissionvil
 * @property string questionId
 * @property string submissionId
 * @property string xformQuestionId
 * @property string value
 */
class DwSubmissionValuevil extends Model
{

    public $table = 'dw_submission_valuevils';
    public $timestamps = false; /* forced to be false  */


    public $fillable = [
        'questionId',
        'submissionId',
        'xformQuestionId',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'questionId' => 'string',
        'submissionId' => 'string',
        'xformQuestionId' => 'string',
        'value' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'questionId' => 'nullable',
        'xformQuestionId' => 'nullable',
        'value' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dwProject()
    {
        return $this->belongsTo(\App\Models\Dwsubmissions\DwProject::class, 'projectId', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dwSubmissionValuevils()
    {
        return $this->hasMany(\App\Models\Dwsubmissions\DwSubmissionValuevil::class, 'submissionId', 'submissionId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dwQuestion()
    {
        return $this->belongsTo(\App\Models\Dwsubmissions\DwQuestion::class, 'questionId', 'questionId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dwSubmissionvil()
    {
        return $this->belongsTo(\App\Models\Dwsubmissions\DwSubmissionvil::class, 'submissionId', 'submissionId');
    }

}/* end class **/
