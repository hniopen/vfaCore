<?php

namespace App\Http\Controllers\Dwsubmissions;

use App\DataTables\Dwsubmissions\DwSubmissionValueregDataTable;
use App\Http\Requests\Dwsubmissions;
use App\Http\Requests\Dwsubmissions\CreateDwSubmissionValueregRequest;
use App\Http\Requests\Dwsubmissions\UpdateDwSubmissionValueregRequest;
use App\Repositories\Dwsubmissions\DwSubmissionValueregRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DwSubmissionValueregController extends AppBaseController
{
    /** @var  DwSubmissionValueregRepository */
    private $dwSubmissionValueregRepository;

    public function __construct(DwSubmissionValueregRepository $dwSubmissionValueregRepo)
    {
        $this->dwSubmissionValueregRepository = $dwSubmissionValueregRepo;
    }

    /**
     * Display a listing of the DwSubmissionValuereg.
     *
     * @param DwSubmissionValueregDataTable $dwSubmissionValueregDataTable
     * @return Response
     */
    public function index(DwSubmissionValueregDataTable $dwSubmissionValueregDataTable)
    {
        return $dwSubmissionValueregDataTable->render('dwsubmissions.dw_submission_valueregs.index');
    }

    /**
     * Show the form for creating a new DwSubmissionValuereg.
     *
     * @return Response
     */
    public function create()
    {
        return view('dwsubmissions.dw_submission_valueregs.create');
    }

    /**
     * Store a newly created DwSubmissionValuereg in storage.
     *
     * @param CreateDwSubmissionValueregRequest $request
     *
     * @return Response
     */
    public function store(CreateDwSubmissionValueregRequest $request)
    {
        $input = $request->all();

        $dwSubmissionValuereg = $this->dwSubmissionValueregRepository->create($input);

        Flash::success('Dw Submission Valuereg saved successfully.');

        return redirect(route('dwsubmissions.dwSubmissionValueregs.index'));
    }

    /**
     * Display the specified DwSubmissionValuereg.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dwSubmissionValuereg = $this->dwSubmissionValueregRepository->findWithoutFail($id);

        if (empty($dwSubmissionValuereg)) {
            Flash::error('Dw Submission Valuereg not found');

            return redirect(route('dwsubmissions.dwSubmissionValueregs.index'));
        }

        return view('dwsubmissions.dw_submission_valueregs.show')->with('dwSubmissionValuereg', $dwSubmissionValuereg);
    }

    /**
     * Show the form for editing the specified DwSubmissionValuereg.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dwSubmissionValuereg = $this->dwSubmissionValueregRepository->findWithoutFail($id);

        if (empty($dwSubmissionValuereg)) {
            Flash::error('Dw Submission Valuereg not found');

            return redirect(route('dwsubmissions.dwSubmissionValueregs.index'));
        }

        return view('dwsubmissions.dw_submission_valueregs.edit')->with('dwSubmissionValuereg', $dwSubmissionValuereg);
    }

    /**
     * Update the specified DwSubmissionValuereg in storage.
     *
     * @param  int              $id
     * @param UpdateDwSubmissionValueregRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDwSubmissionValueregRequest $request)
    {
        $dwSubmissionValuereg = $this->dwSubmissionValueregRepository->findWithoutFail($id);

        if (empty($dwSubmissionValuereg)) {
            Flash::error('Dw Submission Valuereg not found');

            return redirect(route('dwsubmissions.dwSubmissionValueregs.index'));
        }

        $dwSubmissionValuereg = $this->dwSubmissionValueregRepository->update($request->all(), $id);

        Flash::success('Dw Submission Valuereg updated successfully.');

        return redirect(route('dwsubmissions.dwSubmissionValueregs.index'));
    }

    /**
     * Remove the specified DwSubmissionValuereg from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dwSubmissionValuereg = $this->dwSubmissionValueregRepository->findWithoutFail($id);

        if (empty($dwSubmissionValuereg)) {
            Flash::error('Dw Submission Valuereg not found');

            return redirect(route('dwsubmissions.dwSubmissionValueregs.index'));
        }

        $this->dwSubmissionValueregRepository->delete($id);

        Flash::success('Dw Submission Valuereg deleted successfully.');

        return redirect(route('dwsubmissions.dwSubmissionValueregs.index'));
    }
}
