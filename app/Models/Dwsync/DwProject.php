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

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        if($this->entityType=='Q'){
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        }else{
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
        }
        $vCredential = fctReversibleDecrypt($this->credential);
        curl_setopt($ch, CURLOPT_USERPWD, strtolower($vCredential));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

        $tRes = json_decode(curl_exec ($ch),true);
        $tMessage = ['statusCode'=>curl_errno($ch), 'text'=>curl_error($ch)];

        curl_close($ch);
        //Get all questions
        $tAllQuestions = [];
        if($tMessage['statusCode'] == 0){
            $tAllQuestions = fctGetQuestionsFromJson($tRes);
        }

        return ['result'=>$tRes, 'message'=>$tMessage, 'questions' => $tAllQuestions];
    }
}
