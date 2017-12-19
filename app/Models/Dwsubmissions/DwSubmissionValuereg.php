<?php

namespace App\Models\Dwsubmissions;

use Eloquent as Model;

/**
 * Class DwSubmissionValuereg
 * @package App\Models\Dwsubmissions
 * @version October 16, 2017, 12:28 pm UTC
 *
 * @property \App\Models\Dwsubmissions\DwProject dwProject
 * @property \Illuminate\Database\Eloquent\Collection DwSubmissionValuereg
 * @property \App\Models\Dwsubmissions\DwQuestion dwQuestion
 * @property \App\Models\Dwsubmissions\DwSubmissionreg dwSubmissionreg
 * @property string questionId
 * @property string submissionId
 * @property string xformQuestionId
 * @property string value
 */
class DwSubmissionValuereg extends Model
{

    public $table = 'dw_submission_valueregs';
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
    public function dwSubmissionValueregs()
    {
        return $this->hasMany(\App\Models\Dwsubmissions\DwSubmissionValuereg::class, 'submissionId', 'submissionId');
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
    public function dwSubmissionreg()
    {
        return $this->belongsTo(\App\Models\Dwsubmissions\DwSubmissionreg::class, 'submissionId', 'submissionId');
    }

}/* end class **/
