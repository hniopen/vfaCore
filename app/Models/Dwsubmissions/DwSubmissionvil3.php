<?php

namespace App\Models\Dwsubmissions;

use Eloquent as Model;

/**
 * Class DwSubmissionvil3
 * @package App\Models\Dwsubmissions
 * @version November 27, 2017, 6:19 am UTC
 *
 * @property \App\Models\Dwsubmissions\DwProject dwProject
 * @property \Illuminate\Database\Eloquent\Collection DwSubmissionValuevil3
 * @property integer projectId
 * @property string submissionId
 * @property string datasenderId
 * @property string cleanFlag
 * @property string pushIdnrStatus
 */
class DwSubmissionvil3 extends Model
{

    public $table = 'dw_submissionvil3s';
    public $timestamps = false; /* forced to be false  */


    public $fillable = [
        'projectId',
        'submissionId',
        'datasenderId',
        'cleanFlag',
        'pushIdnrStatus'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'projectId' => 'integer',
        'submissionId' => 'string',
        'dwSubmittedAt' => 'string',
        'dwSubmittedAt_u' => 'string',
        'dwUpdatedAt' => 'string',
        'dwUpdatedAt_u' => 'string',
        'status' => 'string',
        'datasenderId' => 'string',
        'cleanFlag' => 'string',
        'pushIdnrStatus' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'projectId' => 'required',
        'dwUpdatedAt' => 'nullable',
        'dwUpdatedAt_u' => 'nullable',
        'status' => 'nullable'
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
}
