<?php

namespace App\Http\Controllers\Dwsubmissions;

use App\DataTables\Dwsubmissions\DwSubmissionValuevil3DataTable;
use App\Http\Requests\Dwsubmissions;
use App\Http\Requests\Dwsubmissions\CreateDwSubmissionValuevil3Request;
use App\Http\Requests\Dwsubmissions\UpdateDwSubmissionValuevil3Request;
use App\Repositories\Dwsubmissions\DwSubmissionValuevil3Repository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DwSubmissionValuevil3Controller extends AppBaseController
{
    /** @var  DwSubmissionValuevil3Repository */
    private $dwSubmissionValuevil3Repository;

    public function __construct(DwSubmissionValuevil3Repository $dwSubmissionValuevil3Repo)
    {
        $this->dwSubmissionValuevil3Repository = $dwSubmissionValuevil3Repo;
    }

    /**
     * Display a listing of the DwSubmissionValuevil3.
     *
     * @param DwSubmissionValuevil3DataTable $dwSubmissionValuevil3DataTable
     * @return Response
     */
    public function index(DwSubmissionValuevil3DataTable $dwSubmissionValuevil3DataTable)
    {
        return $dwSubmissionValuevil3DataTable->render('dwsubmissions.dw_submission_valuevil3s.index');
    }

    /**
     * Show the form for creating a new DwSubmissionValuevil3.
     *
     * @return Response
     */
    public function create()
    {
        return view('dwsubmissions.dw_submission_valuevil3s.create');
    }

    /**
     * Store a newly created DwSubmissionValuevil3 in storage.
     *
     * @param CreateDwSubmissionValuevil3Request $request
     *
     * @return Response
     */
    public function store(CreateDwSubmissionValuevil3Request $request)
    {
        $input = $request->all();

        $dwSubmissionValuevil3 = $this->dwSubmissionValuevil3Repository->create($input);

        Flash::success('Dw Submission Valuevil3 saved successfully.');

        return redirect(route('dwsubmissions.dwSubmissionValuevil3s.index'));
    }

    /**
     * Display the specified DwSubmissionValuevil3.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dwSubmissionValuevil3 = $this->dwSubmissionValuevil3Repository->findWithoutFail($id);

        if (empty($dwSubmissionValuevil3)) {
            Flash::error('Dw Submission Valuevil3 not found');

            return redirect(route('dwsubmissions.dwSubmissionValuevil3s.index'));
        }

        return view('dwsubmissions.dw_submission_valuevil3s.show')->with('dwSubmissionValuevil3', $dwSubmissionValuevil3);
    }

    /**
     * Show the form for editing the specified DwSubmissionValuevil3.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dwSubmissionValuevil3 = $this->dwSubmissionValuevil3Repository->findWithoutFail($id);

        if (empty($dwSubmissionValuevil3)) {
            Flash::error('Dw Submission Valuevil3 not found');

            return redirect(route('dwsubmissions.dwSubmissionValuevil3s.index'));
        }

        return view('dwsubmissions.dw_submission_valuevil3s.edit')->with('dwSubmissionValuevil3', $dwSubmissionValuevil3);
    }

    /**
     * Update the specified DwSubmissionValuevil3 in storage.
     *
     * @param  int              $id
     * @param UpdateDwSubmissionValuevil3Request $request
     *
     * @return Response
     */
    public function update($id, UpdateDwSubmissionValuevil3Request $request)
    {
        $dwSubmissionValuevil3 = $this->dwSubmissionValuevil3Repository->findWithoutFail($id);

        if (empty($dwSubmissionValuevil3)) {
            Flash::error('Dw Submission Valuevil3 not found');

            return redirect(route('dwsubmissions.dwSubmissionValuevil3s.index'));
        }

        $dwSubmissionValuevil3 = $this->dwSubmissionValuevil3Repository->update($request->all(), $id);

        Flash::success('Dw Submission Valuevil3 updated successfully.');

        return redirect(route('dwsubmissions.dwSubmissionValuevil3s.index'));
    }

    /**
     * Remove the specified DwSubmissionValuevil3 from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dwSubmissionValuevil3 = $this->dwSubmissionValuevil3Repository->findWithoutFail($id);

        if (empty($dwSubmissionValuevil3)) {
            Flash::error('Dw Submission Valuevil3 not found');

            return redirect(route('dwsubmissions.dwSubmissionValuevil3s.index'));
        }

        $this->dwSubmissionValuevil3Repository->delete($id);

        Flash::success('Dw Submission Valuevil3 deleted successfully.');

        return redirect(route('dwsubmissions.dwSubmissionValuevil3s.index'));
    }
}
