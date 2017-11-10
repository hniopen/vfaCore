<?php

namespace App\Http\Controllers\Dwsubmissions;

use App\DataTables\Dwsubmissions\DwSubmissionregDataTable;
use App\Http\Requests\Dwsubmissions;
use App\Http\Requests\Dwsubmissions\CreateDwSubmissionregRequest;
use App\Http\Requests\Dwsubmissions\UpdateDwSubmissionregRequest;
use App\Repositories\Dwsubmissions\DwSubmissionregRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DwSubmissionregController extends AppBaseController
{
    /** @var  DwSubmissionregRepository */
    private $dwSubmissionregRepository;

    public function __construct(DwSubmissionregRepository $dwSubmissionregRepo)
    {
        $this->dwSubmissionregRepository = $dwSubmissionregRepo;
    }

    /**
     * Display a listing of the DwSubmissionreg.
     *
     * @param DwSubmissionregDataTable $dwSubmissionregDataTable
     * @return Response
     */
    public function index(DwSubmissionregDataTable $dwSubmissionregDataTable)
    {
        return $dwSubmissionregDataTable->render('dwsubmissions.dw_submissionregs.index');
    }

    /**
     * Show the form for creating a new DwSubmissionreg.
     *
     * @return Response
     */
    public function create()
    {
        return view('dwsubmissions.dw_submissionregs.create');
    }

    /**
     * Store a newly created DwSubmissionreg in storage.
     *
     * @param CreateDwSubmissionregRequest $request
     *
     * @return Response
     */
    public function store(CreateDwSubmissionregRequest $request)
    {
        $input = $request->all();

        $dwSubmissionreg = $this->dwSubmissionregRepository->create($input);

        Flash::success('Dw Submissionreg saved successfully.');

        return redirect(route('dwsubmissions.dwSubmissionregs.index'));
    }

    /**
     * Display the specified DwSubmissionreg.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dwSubmissionreg = $this->dwSubmissionregRepository->findWithoutFail($id);

        if (empty($dwSubmissionreg)) {
            Flash::error('Dw Submissionreg not found');

            return redirect(route('dwsubmissions.dwSubmissionregs.index'));
        }

        return view('dwsubmissions.dw_submissionregs.show')->with('dwSubmissionreg', $dwSubmissionreg);
    }

    /**
     * Show the form for editing the specified DwSubmissionreg.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dwSubmissionreg = $this->dwSubmissionregRepository->findWithoutFail($id);

        if (empty($dwSubmissionreg)) {
            Flash::error('Dw Submissionreg not found');

            return redirect(route('dwsubmissions.dwSubmissionregs.index'));
        }

        return view('dwsubmissions.dw_submissionregs.edit')->with('dwSubmissionreg', $dwSubmissionreg);
    }

    /**
     * Update the specified DwSubmissionreg in storage.
     *
     * @param  int              $id
     * @param UpdateDwSubmissionregRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDwSubmissionregRequest $request)
    {
        $dwSubmissionreg = $this->dwSubmissionregRepository->findWithoutFail($id);

        if (empty($dwSubmissionreg)) {
            Flash::error('Dw Submissionreg not found');

            return redirect(route('dwsubmissions.dwSubmissionregs.index'));
        }

        $dwSubmissionreg = $this->dwSubmissionregRepository->update($request->all(), $id);

        Flash::success('Dw Submissionreg updated successfully.');

        return redirect(route('dwsubmissions.dwSubmissionregs.index'));
    }

    /**
     * Remove the specified DwSubmissionreg from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dwSubmissionreg = $this->dwSubmissionregRepository->findWithoutFail($id);

        if (empty($dwSubmissionreg)) {
            Flash::error('Dw Submissionreg not found');

            return redirect(route('dwsubmissions.dwSubmissionregs.index'));
        }

        $this->dwSubmissionregRepository->delete($id);

        Flash::success('Dw Submissionreg deleted successfully.');

        return redirect(route('dwsubmissions.dwSubmissionregs.index'));
    }
}
