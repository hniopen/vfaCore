<?php

namespace App\Models\Dwsubmissions;

use Eloquent as Model;

/**
 * Class DwSubmissionValue172
 * @package App\Models\Dwsubmissions
 * @version October 16, 2017, 1:01 pm UTC
 *
 * @property \App\Models\Dwsubmissions\DwProject dwProject
 * @property \Illuminate\Database\Eloquent\Collection DwSubmissionValue172
 * @property \App\Models\Dwsubmissions\DwQuestion dwQuestion
 * @property \App\Models\Dwsubmissions\DwSubmission172 dwSubmission172
 * @property string questionId
 * @property string submissionId
 * @property string xformQuestionId
 * @property string value
 */
class DwSubmissionValue172 extends Model
{

    public $table = 'dw_submission_value172s';
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
    public function dwSubmissionValue172s()
    {
        return $this->hasMany(\App\Models\Dwsubmissions\DwSubmissionValue172::class, 'submissionId', ' submissionId');
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
    public function dwSubmission172()
    {
        return $this->belongsTo(\App\Models\Dwsubmissions\DwSubmission172::class, 'submissionId', ' submissionId');
    }

}/* end class **/
