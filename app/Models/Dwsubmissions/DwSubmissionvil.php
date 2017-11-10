<?php

namespace App\Models\Dwsubmissions;

use Eloquent as Model;

/**
 * Class DwSubmissionvil
 * @package App\Models\Dwsubmissions
 * @version October 16, 2017, 12:48 pm UTC
 *
 * @property \App\Models\Dwsubmissions\DwProject dwProject
 * @property \Illuminate\Database\Eloquent\Collection DwSubmissionValuevil
 * @property integer projectId
 * @property string submissionId
 * @property string datasenderId
 * @property string cleanFlag
 */
class DwSubmissionvil extends Model
{

    public $table = 'dw_submissionvils';
    public $timestamps = false; /* forced to be false  */


    public $fillable = [
        'projectId',
        'submissionId',
        'datasenderId',
        'cleanFlag'
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
        'cleanFlag' => 'string'
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
    public function dwSubmissionValuevils()
    {
        return $this->hasMany(\App\Models\Dwsubmissions\DwSubmissionValuevil::class, 'submissionId', ' submissionId');
    }

}/* end class **/
