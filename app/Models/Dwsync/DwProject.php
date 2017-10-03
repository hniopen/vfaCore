<?php

namespace App\Models\Dwsync;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Excel;
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
    private $tAllQuestions = [], $tCheckingResult = [];
    private $validDataType = array('text', 'dw_idnr', 'select_one', 'select_multiple', 'geopoint', 'integer', 'decimal', 'date', 'time', 'barcode');
    private $validMimeType = array('application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
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
            $this->tCheckingResult = fctInitCurlDw($url, $vCredential, CURLAUTH_BASIC);//CURLAUTH_BASIC
        }else{
            $this->tCheckingResult = fctInitCurlDw($url, $vCredential);//CURLAUTH_DIGEST
        }
        $tMessage = ['statusCode'=>$this->tCheckingResult['code'], 'text'=>$this->tCheckingResult['msg']." ".$url];

        //Get all questions
        $this->tAllQuestions = [];
        if($tMessage['statusCode'] == 0){
            $tAllQuestions = fctGetQuestionsFromJson($this->tCheckingResult['json']);
        }
        return ['result'=>$this->tCheckingResult['json'], 'message'=>$tMessage, 'questions' => $tAllQuestions];
    }

    public function checkQuestionsFromDwXform(){
        $url = config('dwsync.url.xform') . $this->longQuestCode;
        $vCredential = fctReversibleDecrypt($this->credential);
        $this->tCheckingResult = fctInitCurlDw($url, $vCredential);//CURLAUTH_DIGEST
        $this->tAllQuestions = [];
        $tMessage = ['statusCode'=>$this->tCheckingResult['code'], 'text'=>$this->tCheckingResult['msg']." ".$url];
        if($tMessage['statusCode'] == 0){
            $tAllQuestions = fctGetQuestionsFromXform($this->tCheckingResult['raw']);
        }
        return ['result'=>$this->tCheckingResult['raw'], 'message'=>$tMessage, 'questions' => $tAllQuestions];
    }

    public function checkQuestionsFromDwXls($file){
        $this->tCheckingResult = [];
        $this->tAllQuestions = [];
        $filePath = $file->getRealPath()."/".$file->getClientOriginalName();
        $fileType = $file->getMimeType();
//        $ext = $file->getClientOriginalExtension();
        //$file->getSize();

        $tMessage = ['statusCode'=>0, 'text'=>$filePath];
        if(!in_array($fileType, $this->validMimeType)){
            $tMessage['statusCode'] = 1;
            $tMessage['text'] = "Wrong excel file mime type : ".$fileType;
            abort(403, $tMessage['text']);
        }
        if($tMessage['statusCode'] == 0){
            Excel::selectSheets('survey', 'choices')->load($file, function($reader) {
                //1st sheet
                $survey = $reader->first();
                $this->tCheckingResult = $survey;
                $vFinBalise = "";
                $vPath = "";
                $vCurrentPath = "";
                $vOrder = 1;
                $output = [];
                foreach($survey as $rowItem){
                    //Existing values from Cells
                    $vType = $rowItem['type'];
                    $vName = $rowItem['name'];
                    $vLabel = $rowItem['label'];
                    $vRelevant = isset($rowItem['relevant'])?$rowItem['relevant']:null;
                    $vRequired = isset($rowItem['required'])?$rowItem['required']:null;
                    $vHint = isset($rowItem['hint'])?$rowItem['hint']:null;
                    $vCalculation = isset($rowItem['calculation'])?$rowItem['calculation']:null;
                    $vConstraint = isset($rowItem['constraint'])?$rowItem['constraint']:null;
                    $vConstraintMessage = isset($rowItem['constraint_message'])?$rowItem['constraint_message']:null;

                    //Deal with groups & repeat
                    $tType = explode(" ",$vType);
                    if($tType[0] == "begin_group" || $tType[0] == "begin_repeat"){
                        $vCurrentPath = $vName;
                        if(strlen($vPath)>0)
                            $vPath = $vPath . "/";
                        $vPath = $vPath . $vCurrentPath;
                    }
                    if($tType[0] == "end_group" || $tType[0] == "end_repeat"){
                        if(strlen($vPath)>strlen($vCurrentPath)){
                            $vPath = substr($vPath,0,strlen($vPath)-strlen($vCurrentPath)-1);
                            $tPath = explode("/",$vPath);

                            $vCurrentPath = $tPath[count($tPath)-1];
                        }
                        else{
                            $vPath  = "";
                            $vCurrentPath = "";
                        }
                    }

                    //deal with valid data type
                    if(in_array($tType[0], $this->validDataType)){
                        $output[$vName]['type'] = $tType[0];
                        $output[$vName]['label'] = $vLabel;
                        $output[$vName]['path'] = $vPath;
                        $output[$vName]['order'] = $vOrder++;
                    }
                }
                $this->tAllQuestions = $output;
            });
        }
        return ['result'=>$this->tCheckingResult, 'message'=>$tMessage, 'questions' => $this->tAllQuestions];
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
            $this->tCheckingResult = fctInitCurlDw($url, $vCredential, CURLAUTH_BASIC);//CURLAUTH_BASIC
        }else{
            $this->tCheckingResult = fctInitCurlDw($url, $vCredential);//CURLAUTH_DIGEST
        }
        $tMessage = ['statusCode'=>$this->tCheckingResult['code'], 'text'=>$this->tCheckingResult['msg']." ".$url];

        //Pull all submissions
        $tAllSubmissions = [];
        if($tMessage['statusCode'] == 0){
            $tAllSubmissions = $this->pullData($this->tCheckingResult['json']);
        }
        return ['result'=>$this->tCheckingResult['json'], 'message'=>$tMessage, 'submissions' => $tAllSubmissions];
    }

    private function pullData($jsonResult, $questionKey = 'values'){
        $output = [];
        $tStatus = ['success'=>0, 'error'=>0, 'deleted'=>0,'updated'=>0, 'inserted'=>0, 'wrong_idnr'=>0];
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
                    $tStatus['updated']++;
                    //Check modified data : same $submissionId #### Fire event
                    //TODO : call external event definition
                }else{//insert
                    $tStatus['inserted']++;
                    $currentSubmission->dwSubmittedAt = $t[0];
                    $currentSubmission->dwSubmittedAt_u = $t[1];
                }
                //Check valid DS (doesn't exist in DS list) ##### Fire event
                //TODO : then add this $tStatus['wrong_idnr']++;
                //TODO : call external event definition
            }
            if(!array_key_exists($status, $tStatus))//in case there is new status from DW
                $tStatus[$status] = 1;
            else
                $tStatus[$status]++;
            $currentSubmission->isValid = $_isValid;

            //Insert values
            foreach($tQuestions as $xformQuestId => $value){
                //Get related question:
                $uniqueColumns = ['projectId'=>$this->id,'xformQuestionId'=>$xformQuestId];
                $relatedDwQuestion = DwQuestion::firstOrNew($uniqueColumns);
                if($relatedDwQuestion->id){
                    //The question exists
                }else{
                    //The question doesn't exist yet
                    //TODO : notify Admin in result, log
                }

                //Values
                $compositeQuestId =$this->id."#".$xformQuestId;
                //TODO : deal with advanced Q repeat, idea > should add path in $uniqueColumns
                $uniqueColumns = ['submissionId'=>$submissionId, 'questionId'=>$compositeQuestId];
                $currentValue = $this->submissionValueClass::firstOrNew($uniqueColumns);
                if($currentValue->id){
                    //Some actions if UPDATE
                }else{
                    //Some actions if INSERT
                }
                if(is_array($value))//single or multiple choice
                    $currentValue->value = implode(",",$value);
                else
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
        return ['data'=>$output, 'status'=>$tStatus];
    }
}
