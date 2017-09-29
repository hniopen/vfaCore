<?php

namespace App\Models\Dwsync;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DwQuestion
 * @package App\Models\Dwsync
 * @version September 21, 2017, 1:31 pm UTC
 *
 * @property \App\Models\Dwsync\DwProject dwProject
 * @property string xformQuestionId
 * @property string questionId
 * @property string path
 * @property string labelDefault
 * @property string labelFr
 * @property string labelUs
 * @property string dataType
 * @property string dataFormat
 * @property integer order
 * @property string linkedIdnr
 * @property string periodType
 * @property string periodTypeFormat
 * @property tinyInteger isUnique
 * @property tinyInteger isMigrated
 */
class DwQuestion extends Model
{
    use SoftDeletes;

    public $table = 'dw_questions';
    public $timestamps = false;

    protected $dates = ['deleted_at'];


    public $fillable = [
        'projectId',
        'xformQuestionId',
        'questionId',
        'path',
        'labelDefault',
        'labelFr',
        'labelUs',
        'dataType',
        'dataFormat',
        'order',
        'linkedIdnr',
        'periodType',
        'periodTypeFormat',
        'isUnique',
        'isMigrated'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'projectId' => 'integer',
        'xformQuestionId' => 'string',
        'questionId' => 'string',
        'path' => 'string',
        'labelDefault' => 'string',
        'labelFr' => 'string',
        'labelUs' => 'string',
        'dataType' => 'string',
        'dataFormat' => 'string',
        'order' => 'integer',
        'linkedIdnr' => 'string',
        'periodType' => 'string',
        'periodTypeFormat' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'projectId' => 'nullable|min:0',
        'xformQuestionId' => 'nullable',
        'questionId' => 'nullable',
        'path' => 'nullable',
        'labelDefault' => 'nullable',
        'labelFr' => 'nullable',
        'labelUs' => 'nullable',
        'dataType' => 'nullable',
        'dataFormat' => 'nullable',
        'order' => 'nullable',
        'linkedIdnr' => 'nullable',
        'periodType' => 'nullable',
        'periodTypeFormat' => 'nullable',
        'isUnique' => 'min:0|max:1',
        'isMigrated' => 'min:0|max:1'
    ];

    public static function boot()
    {
        static::creating(function ($model) {
            $model->calculateQuestionId();
        });

        static::updating(function ($model) {
            $model->calculateQuestionId();
        });

        static::deleting(function ($model) {
            // bluh bluh
        });

        parent::boot();
    }

    private function calculateQuestionId(){
        $_questId = $this->projectId . "#". $this->xformQuestionId;
        $this->questionId = $_questId;
        $correpsondingDwValues = $this->dwSubmissionValues("X");//TODO: change postFix to $this->questCode
        foreach ($correpsondingDwValues as $values){
            $values->questionId = $_questId;
            $values->save();
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dwProject()
    {
        return $this->belongsTo(\App\Models\Dwsync\DwProject::class, 'projectId', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dwSubmissionValues($postFix)
    {
        $selectedClass = "App\Models\\".config('dwsync.generator.namespace')."\\".config('dwsync.generator.prefix.submissionValue').$postFix;
        return $this->hasMany($selectedClass, 'questionId', 'questionId');
    }
}
