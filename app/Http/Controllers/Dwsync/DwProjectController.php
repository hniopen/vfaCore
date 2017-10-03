<?php

namespace App\Http\Controllers\Dwsync;

use App\Http\Requests\Dwsync\CreateDwProjectRequest;
use App\Http\Requests\Dwsync\UpdateDwProjectRequest;
use App\Models\Dwsync\DwQuestion;
use App\Repositories\Dwsync\DwProjectRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Dwsync\DwEntityType;
use App\Repositories\Dwsync\DwQuestionRepository;

class DwProjectController extends AppBaseController
{
    /** @var  DwProjectRepository */
    private $dwProjectRepository;

    public function __construct(DwProjectRepository $dwProjectRepo)
    {
        $this->dwProjectRepository = $dwProjectRepo;
    }

    /**
     * Display a listing of the DwProject.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dwProjectRepository->pushCriteria(new RequestCriteria($request));
        $dwProjects = $this->dwProjectRepository->all();

        return view('dwsync.dw_projects.index')
            ->with('dwProjects', $dwProjects);
    }

    /**
     * Show list of actions for DwProjects.
     *
     * @return Response
     */
    public function extra($id)
    {
        $dwProject = $this->dwProjectRepository->findWithoutFail($id);

        if (empty($dwProject)) {
            Flash::error('Dw Project not found');

            return redirect(route('dwsync.dwProjects.index'));
        }
        return view('dwsync.dw_projects.extra', compact('dwProject'));
    }

    /**
     * Show the form for creating a new DwProject.
     *
     * @return Response
     */
    public function create()
    {
        $dwEntityTypeList = DwEntityType::pluck('comment','type');;
        return view('dwsync.dw_projects.create', compact('dwEntityTypeList'));
    }

    /**
     * Store a newly created DwProject in storage.
     *
     * @param CreateDwProjectRequest $request
     *
     * @return Response
     */
    public function store(CreateDwProjectRequest $request)
    {
        $input = $request->all();
        $input['credential'] = fctReversibleCrypt($input['credential']);
        $dwProject = $this->dwProjectRepository->create($input);

        Flash::success('Dw Project saved successfully.');

        return redirect(route('dwsync.dwProjects.index'));
    }

    /**
     * Display the specified DwProject.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dwProject = $this->dwProjectRepository->findWithoutFail($id);

        if (empty($dwProject)) {
            Flash::error('Dw Project not found');

            return redirect(route('dwsync.dwProjects.index'));
        }
        return view('dwsync.dw_projects.show', compact('dwProject'));
    }

    /**
     * Show the form for editing the specified DwProject.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dwProject = $this->dwProjectRepository->findWithoutFail($id);

        if (empty($dwProject)) {
            Flash::error('Dw Project not found');

            return redirect(route('dwsync.dwProjects.index'));
        }
        $dwEntityTypeList = DwEntityType::pluck('comment','type');
        return view('dwsync.dw_projects.edit', compact('dwProject', 'dwEntityTypeList'));
    }

    /**
     * Update the specified DwProject in storage.
     *
     * @param  int              $id
     * @param UpdateDwProjectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDwProjectRequest $request)
    {
        $dwProject = $this->dwProjectRepository->findWithoutFail($id);

        if (empty($dwProject)) {
            Flash::error('Dw Project not found');

            return redirect(route('dwsync.dwProjects.index'));
        }
        $input = $request->all();
        $input['credential'] = fctReversibleCrypt($input['credential']);
        $dwProject = $this->dwProjectRepository->update($input, $id);

        Flash::success('Dw Project updated successfully.');

        return redirect(route('dwsync.dwProjects.index'));
    }

    /**
     * Remove the specified DwProject from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dwProject = $this->dwProjectRepository->findWithoutFail($id);

        if (empty($dwProject)) {
            Flash::error('Dw Project not found');

            return redirect(route('dwsync.dwProjects.index'));
        }

        $this->dwProjectRepository->delete($id);

        Flash::success('Dw Project deleted successfully.');

        return redirect(route('dwsync.dwProjects.index'));
    }

    /**
     * Check questions from Dw submissions
     *
     * @return Response
     */
    public function checkFromSubmissions($id)
    {
        $dwProject = $this->dwProjectRepository->findWithoutFail($id);
        $tCheckResult = [];
        if (empty($dwProject)) {
            $tCheckResult['message'] = ['statusCode'=>1, 'text'=>'DW project not found'];
        }else{
            $tCheckResult = $dwProject->checkQuestionsFromDwSubmissions();
        }
        return response()->json($tCheckResult);
    }

    /**
     * Insert questions from Dw submissions
     *
     * @return Response
     */
    public function insertFromSubmissions(Request $request)
    {
        $inputs = $request->all();
        $projectId = $inputs['projectId'];
        $dwProject = $this->dwProjectRepository->findWithoutFail($inputs['projectId']);
        $tResult = [];
        $insertCount = 0;
        $updateCount = 0;
        if (empty($dwProject)) {
            $tResult['message'] = ['statusCode'=>1, 'text'=>'DW project not found'];
        }else{
            $questions = $inputs['questions'];
            foreach ($questions as $item){
                $uniqueColumns = ['projectId'=>$projectId,'xformQuestionId'=>$item];
                $currentDwQuestion = DwQuestion::firstOrNew($uniqueColumns);
                if($currentDwQuestion->id)
                    $updateCount++;
                else
                    $insertCount++;
                $currentDwQuestion->save();
            }
            $tResult['message'] = ['statusCode'=>'', 'text'=>"Saved question(s) : $insertCount insert(s), $updateCount update(s)"];
        }
        return response()->json($tResult);
    }

    /**
     * Check questions from Dw xform
     *
     * @return Response
     */
    public function checkFromXform($id)
    {
        $dwProject = $this->dwProjectRepository->findWithoutFail($id);
        $tCheckResult = [];
        if (empty($dwProject)) {
            $tCheckResult['message'] = ['statusCode'=>1, 'text'=>'DW project not found'];
        }else{
            $tCheckResult = $dwProject->checkQuestionsFromDwXform();
        }
        return response()->json($tCheckResult);
    }

    /**
     * Insert questions from Dw xform
     *
     * @return Response
     */
    public function insertFromXform(Request $request)
    {
        $inputs = $request->all();
        $projectId = $inputs['projectId'];
        $dwProject = $this->dwProjectRepository->findWithoutFail($inputs['projectId']);
        $tResult = [];
        $insertCount = 0;
        $updateCount = 0;
        if (empty($dwProject)) {
            $tResult['message'] = ['statusCode'=>1, 'text'=>'DW project not found'];
        }else{
            $questions = $inputs['questions'];
            foreach ($questions as $item => $tValue){
                $uniqueColumns = ['projectId'=>$projectId,'xformQuestionId'=>$item];
                $currentDwQuestion = DwQuestion::firstOrNew($uniqueColumns);
                $currentDwQuestion->labelDefault = $tValue['label'];
                $currentDwQuestion->dataType = $tValue['type'];
                if($currentDwQuestion->id)
                    $updateCount++;
                else
                    $insertCount++;
                $currentDwQuestion->save();
            }
            $tResult['message'] = ['statusCode'=>'', 'text'=>"Saved question(s) : $insertCount insert(s), $updateCount update(s)"];
        }
        return response()->json($tResult);
    }

    /**
     * Check questions from Dw xls (xlsform)
     *
     * @return Response
     */
    public function checkFromXls($id, Request $request)
    {
        $dwProject = $this->dwProjectRepository->findWithoutFail($id);
        $tCheckResult = [];
        if (empty($dwProject)) {
            $tCheckResult['message'] = ['statusCode'=>1, 'text'=>'DW project not found'];
        }else{
            $file = $request->file('xlsform');
            $tCheckResult = $dwProject->checkQuestionsFromDwXls($file);

            //Move Uploaded File
            //TODO : Fix move file
            $destinationPath = config('dwsync.xlsform.uploadPath');
            $file->move($destinationPath,$file->getClientOriginalName());
        }
        return response()->json($tCheckResult);
    }
    /**
     * Insert questions from xls form
     *
     * @return Response
     */
    public function insertFromXls(Request $request)
    {
        $inputs = $request->all();
        $projectId = $inputs['projectId'];
        $dwProject = $this->dwProjectRepository->findWithoutFail($inputs['projectId']);
        $tResult = [];
        $insertCount = 0;
        $updateCount = 0;
        if (empty($dwProject)) {
            $tResult['message'] = ['statusCode'=>1, 'text'=>'DW project not found'];
        }else{
            $questions = $inputs['questions'];
            foreach ($questions as $item => $tValue){
                $uniqueColumns = ['projectId'=>$projectId,'xformQuestionId'=>$item];
                $currentDwQuestion = DwQuestion::firstOrNew($uniqueColumns);
                $currentDwQuestion->labelDefault = $tValue['label'];
                $currentDwQuestion->dataType = $tValue['type'];
                $currentDwQuestion->order = $tValue['order'];
                $currentDwQuestion->path = $tValue['path'];
                if($currentDwQuestion->id)
                    $updateCount++;
                else
                    $insertCount++;
                $currentDwQuestion->save();
            }
            $tResult['message'] = ['statusCode'=>'', 'text'=>"Saved question(s) : $insertCount insert(s), $updateCount update(s)"];
        }
        return response()->json($tResult);
    }

    /**
     * Check existing related questions
     *
     * @return Response
     */
    public function checkExistingQuestions($id)
    {
        $dwProject = $this->dwProjectRepository->findWithoutFail($id);
        $tCheckResult = [];
        if (empty($dwProject)) {
            $tCheckResult['message'] = ['statusCode'=>1, 'text'=>'DW project not found'];
        }else{
            $tAllQuestions = $dwProject->dwQuestions;
            $output = [];
            foreach($tAllQuestions as $quest){
                $output[$quest->xformQuestionId]['type'] = $quest->dataType;
                $output[$quest->xformQuestionId]['label'] = $quest->labelDefault;
            }
            $tCheckResult['result'] = $tAllQuestions;
            $tCheckResult['questions'] = $output;
            $tCheckResult['message'] = ['statusCode'=>0, 'text'=>$dwProject->questCode." | ".$dwProject->comment];
        }

        return response()->json($tCheckResult);
    }

    /**
     * Insert questions from xls form
     *
     * @return Response
     */
    public function removeExistingQuestions(Request $request)
    {
        $inputs = $request->all();
        $projectId = $inputs['projectId'];
        $dwProject = $this->dwProjectRepository->findWithoutFail($inputs['projectId']);
        $tResult = [];
        $count = 0;
        if (empty($dwProject)) {
            $tResult['message'] = ['statusCode'=>1, 'text'=>'DW project not found'];
        }else{
            $questions = $inputs['questions'];
            foreach ($questions as $item => $tValue){
                $uniqueColumns = ['projectId'=>$projectId,'xformQuestionId'=>$item];
                $currentDwQuestion = DwQuestion::where($uniqueColumns);
                $currentDwQuestion->forceDelete();
                $count++;
            }
            $tResult['message'] = ['statusCode'=>'', 'text'=>"Removed question(s) : $count"];
        }
        return response()->json($tResult);
    }

    /**
     * Sync data from Dw
     *
     * @return Response
     */
    public function sync($id)
    {
        $dwProject = $this->dwProjectRepository->findWithoutFail($id);
        $tCheckResult = [];
        if (empty($dwProject)) {
            $tCheckResult['message'] = ['statusCode'=>'', 'text'=>'DW project not found'];
        }else{
            $tCheckResult = $dwProject->sync();
        }
        return response()->json($tCheckResult);
    }
}
