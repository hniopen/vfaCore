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
 * @property string longQuestCode
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
        'formType',
        'longQuestCode'
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
        'formType' => 'string',
        'longQuestCode' => 'string'
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
        'formType' => 'required',
        'longQuestCode' => 'nullable'
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

    public function checkQuestionsFromDwSubmissions(){
        $url = $this->dwEntityType->apiUrl . $this->questCode;
        $startDate = config('dwsync.defaultApiStartDate');
        if($this->entityType=='Q'){
            $endDate = date('d-m-Y H:i:s',strtotime(date('Y-m-d') . "+2 days"));
            $url = $url . "?start_date=".$startDate." 0:0:0&end_date=" . $endDate;
        }
        else{
            $endDate = date('d-m-Y=',strtotime(date('Y-m-d') . "+2 days"));
            $url = $url . "/$startDate/$endDate";
        }
        $vCredential = fctReversibleDecrypt($this->credential);
        if($this->entityType=='Q'){
            $tRes = fctInitCurlDw($url, $vCredential, CURLAUTH_BASIC);//CURLAUTH_BASIC
        }else{
            $tRes = fctInitCurlDw($url, $vCredential);//CURLAUTH_DIGEST
        }
        $tMessage = ['statusCode'=>$tRes['code'], 'text'=>$tRes['msg']." ".$url];

        //Get all questions
        $tAllQuestions = [];
        if($tMessage['statusCode'] == 0){
            $tAllQuestions = fctGetQuestionsFromJson($tRes['json']);
        }
        return ['result'=>$tRes['json'], 'message'=>$tMessage, 'questions' => $tAllQuestions];
    }

    public function checkQuestionsFromDwXform(){
        $url = config('dwsync.url.xform') . $this->longQuestCode;
        $vCredential = fctReversibleDecrypt($this->credential);
        $tRes = fctInitCurlDw($url, $vCredential);//CURLAUTH_DIGEST
        $tAllQuestions = [];
        $tMessage = ['statusCode'=>$tRes['code'], 'text'=>$tRes['msg']." ".$url];
        if($tMessage['statusCode'] == 0){
            $tAllQuestions = fctGetQuestionsFromXfom($tRes['raw']);
        }
        return ['result'=>$tRes['raw'], 'message'=>$tMessage, 'questions' => $tAllQuestions];
    }
}
