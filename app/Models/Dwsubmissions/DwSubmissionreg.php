<?php

namespace App\Models\Dwsubmissions;

use Eloquent as Model;

/**
 * Class DwSubmissionreg
 * @package App\Models\Dwsubmissions
 * @version October 16, 2017, 12:28 pm UTC
 *
 * @property \App\Models\Dwsubmissions\DwProject dwProject
 * @property \Illuminate\Database\Eloquent\Collection DwSubmissionValuereg
 * @property integer projectId
 * @property string submissionId
 * @property string datasenderId
 * @property string cleanFlag
 */
class DwSubmissionreg extends Model
{

    public $table = 'dw_submissionregs';
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
    public function dwSubmissionValueregs()
    {
        return $this->hasMany(\App\Models\Dwsubmissions\DwSubmissionValuereg::class, 'submissionId', ' submissionId');
    }

}/* end class **/
