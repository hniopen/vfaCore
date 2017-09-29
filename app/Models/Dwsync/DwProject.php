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
    private $submissionClass;
    private $submissionValueClass;

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

    public function __construct()
    {
        $postFix = "X";//TODO: change with $this->questCode
        $this->submissionClass = "App\Models\\".config('dwsync.generator.namespace')."\\".config('dwsync.generator.prefix.submission').$postFix;
        $this->submissionValueClass = "App\Models\\".config('dwsync.generator.namespace')."\\".config('dwsync.generator.prefix.submissionValue').$postFix;
    }

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

    public function sync(){
        $url = $this->dwEntityType->apiUrl . $this->questCode;
        $startDate = config('dwsync.defaultApiStartDate');
        //TODO: check last submission datetime
        //$currentSubmission = new $this->submissionClass();

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

        //Pull all submissions
        $tAllSubmissions = [];
        if($tMessage['statusCode'] == 0){
            $tAllSubmissions = $this->pullData($tRes['json']);
        }
        return ['result'=>$tRes['json'], 'message'=>$tMessage, 'submissions' => $tAllSubmissions];
    }

    private function pullData($jsonResult, $questionKey = 'values'){
        $output = [];
        foreach ($jsonResult as $item){
            //Datas
            $status = $item['status'];//success, deleted, error, ...
            $dataSenderId = $item['data_sender_id'];//code or phone number (if not registered)
            $submissionModifiedTime = $item['submission_modified_time'];//2015-11-02 10:19:51.867840+00:00
            $feedModifiedTime = $item['feed_modified_time'];//2015-11-02 10:19:51.899741+00:00
            $submissionId = $item['id'];//410dcfe2814b11e5a2f712313d2da6d0
            $tQuestions = $item[$questionKey];//{"q3":"john smith","q2":"52"}

            $t = explode(".",$feedModifiedTime);
            //Insert submissions
            $uniqueColumns = ['submissionId'=>$submissionId];
            $currentSubmission = $this->submissionClass::firstOrNew($uniqueColumns);
            $currentSubmission->projectId = $this->id;
            $currentSubmission->status = $status;
            //Check error status ###### Fire event
            $_isValid = 0;
            if($status == "deleted"){
                //DELETED ###### Fire event
                //TODO : call external event definition
            }elseif($status == "error"){
                //ERROR ###### Fire event
                //TODO : call external event definition
            }else{//success
                $_isValid = 1;
                //Success ####### Fire event
                //TODO : call external event definition
                if($currentSubmission->id){//already exist = update
                    $currentSubmission->dwUpdatedAt = $t[0];
                    $currentSubmission->dwUpdatedAt_u = $t[1];
                    //Check modified data : same $submissionId #### Fire event
                    //TODO : call external event definition
                }else{//insert
                    $currentSubmission->dwSubmittedAt = $t[0];
                    $currentSubmission->dwSubmittedAt_u = $t[1];
                }
                //Check valid DS (exist in DS list) ##### Fire event
                //TODO : call external event definition
            }
            $currentSubmission->isValid = $_isValid;

            //Insert values
            foreach($tQuestions as $xformQuestId => $value){
                //Get related question:
                $uniqueColumns = ['projectId'=>$this->id,'xformQuestionId'=>$item];
                $relatedDwQuestion = DwQuestion::firstOrNew($uniqueColumns);
                if($relatedDwQuestion->id){
                    //The question exists
                }else{
                    //The question doesn't exist yet
                    //TODO : notify Admin in result, log
                }

                //Values
                $compositeQuestId =$this->id."#".$item;
                $uniqueColumns = ['submissionId'=>$submissionId, 'questionId'=>$compositeQuestId];
                $currentValue = $this->submissionValueClass::firstOrNew($uniqueColumns);
                if($currentValue->id){
                    //Some actions if UPDATE
                }else{
                    //Some actions if INSERT
                }
                $currentValue->value = $value;
                //Check if linked_idnr value in idnr list (IDNR exists) ##### Fire event
                        //Need a relation between submission & submissionValue
                //TODO : call external event definition

                //Check duplicates (based on is unique) #### Fire event
                        //Need a relation between submission & submissionValue
                //TODO : call external event definition

                //insert or update
                $currentValue->save();
            }
            //insert or update
            $currentSubmission->save();
            $output[] = $currentSubmission;
        }
        return $output;
    }
}
