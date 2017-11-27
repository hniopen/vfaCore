<?php

namespace App\Models\Dwsubmissions;

use Eloquent as Model;

/**
 * Class DwSubmissionValuevil3
 * @package App\Models\Dwsubmissions
 * @version November 27, 2017, 6:19 am UTC
 *
 * @property \App\Models\Dwsubmissions\DwProject dwProject
 * @property \Illuminate\Database\Eloquent\Collection DwSubmissionValuevil3
 * @property \App\Models\Dwsubmissions\DwQuestion dwQuestion
 * @property \App\Models\Dwsubmissions\DwSubmissionvil3 dwSubmissionvil3
 * @property string questionId
 * @property string submissionId
 * @property string xformQuestionId
 * @property string value
 */
class DwSubmissionValuevil3 extends Model
{

    public $table = 'dw_submission_valuevil3s';
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
    public function dwSubmissionValuevil3s()
    {
        return $this->hasMany(\App\Models\Dwsubmissions\DwSubmissionValuevil3::class, 'submissionId', ' submissionId');
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
    public function dwSubmissionvil3()
    {
        return $this->belongsTo(\App\Models\Dwsubmissions\DwSubmissionvil3::class, 'submissionId', ' submissionId');
    }
}
