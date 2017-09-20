<?php

namespace App\Http\Controllers\Dwsync;

use App\Http\Requests\Dwsync\CreateDwQuestionRequest;
use App\Http\Requests\Dwsync\UpdateDwQuestionRequest;
use App\Repositories\Dwsync\DwQuestionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DwQuestionController extends AppBaseController
{
    /** @var  DwQuestionRepository */
    private $dwQuestionRepository;

    public function __construct(DwQuestionRepository $dwQuestionRepo)
    {
        $this->dwQuestionRepository = $dwQuestionRepo;
    }

    /**
     * Display a listing of the DwQuestion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dwQuestionRepository->pushCriteria(new RequestCriteria($request));
        $dwQuestions = $this->dwQuestionRepository->all();

        return view('dwsync.dw_questions.index')
            ->with('dwQuestions', $dwQuestions);
    }

    /**
     * Show the form for creating a new DwQuestion.
     *
     * @return Response
     */
    public function create()
    {
        return view('dwsync.dw_questions.create');
    }

    /**
     * Store a newly created DwQuestion in storage.
     *
     * @param CreateDwQuestionRequest $request
     *
     * @return Response
     */
    public function store(CreateDwQuestionRequest $request)
    {
        $input = $request->all();

        $dwQuestion = $this->dwQuestionRepository->create($input);

        Flash::success('Dw Question saved successfully.');

        return redirect(route('dwsync.dwQuestions.index'));
    }

    /**
     * Display the specified DwQuestion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dwQuestion = $this->dwQuestionRepository->findWithoutFail($id);

        if (empty($dwQuestion)) {
            Flash::error('Dw Question not found');

            return redirect(route('dwsync.dwQuestions.index'));
        }

        return view('dwsync.dw_questions.show')->with('dwQuestion', $dwQuestion);
    }

    /**
     * Show the form for editing the specified DwQuestion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dwQuestion = $this->dwQuestionRepository->findWithoutFail($id);

        if (empty($dwQuestion)) {
            Flash::error('Dw Question not found');

            return redirect(route('dwsync.dwQuestions.index'));
        }

        return view('dwsync.dw_questions.edit')->with('dwQuestion', $dwQuestion);
    }

    /**
     * Update the specified DwQuestion in storage.
     *
     * @param  int              $id
     * @param UpdateDwQuestionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDwQuestionRequest $request)
    {
        $dwQuestion = $this->dwQuestionRepository->findWithoutFail($id);

        if (empty($dwQuestion)) {
            Flash::error('Dw Question not found');

            return redirect(route('dwsync.dwQuestions.index'));
        }

        $dwQuestion = $this->dwQuestionRepository->update($request->all(), $id);

        Flash::success('Dw Question updated successfully.');

        return redirect(route('dwsync.dwQuestions.index'));
    }

    /**
     * Remove the specified DwQuestion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dwQuestion = $this->dwQuestionRepository->findWithoutFail($id);

        if (empty($dwQuestion)) {
            Flash::error('Dw Question not found');

            return redirect(route('dwsync.dwQuestions.index'));
        }

        $this->dwQuestionRepository->delete($id);

        Flash::success('Dw Question deleted successfully.');

        return redirect(route('dwsync.dwQuestions.index'));
    }
}
