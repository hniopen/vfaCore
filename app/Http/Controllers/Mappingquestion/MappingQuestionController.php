<?php

namespace App\Http\Controllers\Mappingquestion;

use App\DataTables\Mappingquestion\MappingQuestionDataTable;
use App\Http\Requests\Mappingquestion;
use App\Http\Requests\Mappingquestion\CreateMappingQuestionRequest;
use App\Http\Requests\Mappingquestion\UpdateMappingQuestionRequest;
use App\Repositories\Mappingquestion\MappingQuestionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MappingQuestionController extends AppBaseController
{
    /** @var  MappingQuestionRepository */
    private $mappingQuestionRepository;

    public function __construct(MappingQuestionRepository $mappingQuestionRepo)
    {
        $this->mappingQuestionRepository = $mappingQuestionRepo;
    }

    /**
     * Display a listing of the MappingQuestion.
     *
     * @param MappingQuestionDataTable $mappingQuestionDataTable
     * @return Response
     */
    public function index(MappingQuestionDataTable $mappingQuestionDataTable)
    {
        return $mappingQuestionDataTable->render('mappingquestion.mapping_questions.index');
    }

    /**
     * Show the form for creating a new MappingQuestion.
     *
     * @return Response
     */
    public function create()
    {
        return view('mappingquestion.mapping_questions.create');
    }

    /**
     * Store a newly created MappingQuestion in storage.
     *
     * @param CreateMappingQuestionRequest $request
     *
     * @return Response
     */
    public function store(CreateMappingQuestionRequest $request)
    {
        $input = $request->all();

        $mappingQuestion = $this->mappingQuestionRepository->create($input);

        Flash::success('Mapping Question saved successfully.');

        return redirect(route('mappingquestion.mappingQuestions.index'));
    }

    /**
     * Display the specified MappingQuestion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mappingQuestion = $this->mappingQuestionRepository->findWithoutFail($id);

        if (empty($mappingQuestion)) {
            Flash::error('Mapping Question not found');

            return redirect(route('mappingquestion.mappingQuestions.index'));
        }

        return view('mappingquestion.mapping_questions.show')->with('mappingQuestion', $mappingQuestion);
    }

    /**
     * Show the form for editing the specified MappingQuestion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mappingQuestion = $this->mappingQuestionRepository->findWithoutFail($id);

        if (empty($mappingQuestion)) {
            Flash::error('Mapping Question not found');

            return redirect(route('mappingquestion.mappingQuestions.index'));
        }

        return view('mappingquestion.mapping_questions.edit')->with('mappingQuestion', $mappingQuestion);
    }

    /**
     * Update the specified MappingQuestion in storage.
     *
     * @param  int              $id
     * @param UpdateMappingQuestionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMappingQuestionRequest $request)
    {
        $mappingQuestion = $this->mappingQuestionRepository->findWithoutFail($id);

        if (empty($mappingQuestion)) {
            Flash::error('Mapping Question not found');

            return redirect(route('mappingquestion.mappingQuestions.index'));
        }

        $mappingQuestion = $this->mappingQuestionRepository->update($request->all(), $id);

        Flash::success('Mapping Question updated successfully.');

        return redirect(route('mappingquestion.mappingQuestions.index'));
    }

    /**
     * Remove the specified MappingQuestion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mappingQuestion = $this->mappingQuestionRepository->findWithoutFail($id);

        if (empty($mappingQuestion)) {
            Flash::error('Mapping Question not found');

            return redirect(route('mappingquestion.mappingQuestions.index'));
        }

        $this->mappingQuestionRepository->delete($id);

        Flash::success('Mapping Question deleted successfully.');

        return redirect(route('mappingquestion.mappingQuestions.index'));
    }
}
