<?php

namespace App\Http\Controllers\Dwsubmissions;

use App\DataTables\Dwsubmissions\DwSubmissionvil3DataTable;
use App\Http\Requests\Dwsubmissions;
use App\Http\Requests\Dwsubmissions\CreateDwSubmissionvil3Request;
use App\Http\Requests\Dwsubmissions\UpdateDwSubmissionvil3Request;
use App\Repositories\Dwsubmissions\DwSubmissionvil3Repository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DwSubmissionvil3Controller extends AppBaseController
{
    /** @var  DwSubmissionvil3Repository */
    private $dwSubmissionvil3Repository;

    public function __construct(DwSubmissionvil3Repository $dwSubmissionvil3Repo)
    {
        $this->dwSubmissionvil3Repository = $dwSubmissionvil3Repo;
    }

    /**
     * Display a listing of the DwSubmissionvil3.
     *
     * @param DwSubmissionvil3DataTable $dwSubmissionvil3DataTable
     * @return Response
     */
    public function index(DwSubmissionvil3DataTable $dwSubmissionvil3DataTable)
    {
        return $dwSubmissionvil3DataTable->render('dwsubmissions.dw_submissionvil3s.index');
    }

    /**
     * Show the form for creating a new DwSubmissionvil3.
     *
     * @return Response
     */
    public function create()
    {
        return view('dwsubmissions.dw_submissionvil3s.create');
    }

    /**
     * Store a newly created DwSubmissionvil3 in storage.
     *
     * @param CreateDwSubmissionvil3Request $request
     *
     * @return Response
     */
    public function store(CreateDwSubmissionvil3Request $request)
    {
        $input = $request->all();

        $dwSubmissionvil3 = $this->dwSubmissionvil3Repository->create($input);

        Flash::success('Dw Submissionvil3 saved successfully.');

        return redirect(route('dwsubmissions.dwSubmissionvil3s.index'));
    }

    /**
     * Display the specified DwSubmissionvil3.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dwSubmissionvil3 = $this->dwSubmissionvil3Repository->findWithoutFail($id);

        if (empty($dwSubmissionvil3)) {
            Flash::error('Dw Submissionvil3 not found');

            return redirect(route('dwsubmissions.dwSubmissionvil3s.index'));
        }

        return view('dwsubmissions.dw_submissionvil3s.show')->with('dwSubmissionvil3', $dwSubmissionvil3);
    }

    /**
     * Show the form for editing the specified DwSubmissionvil3.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dwSubmissionvil3 = $this->dwSubmissionvil3Repository->findWithoutFail($id);

        if (empty($dwSubmissionvil3)) {
            Flash::error('Dw Submissionvil3 not found');

            return redirect(route('dwsubmissions.dwSubmissionvil3s.index'));
        }

        return view('dwsubmissions.dw_submissionvil3s.edit')->with('dwSubmissionvil3', $dwSubmissionvil3);
    }

    /**
     * Update the specified DwSubmissionvil3 in storage.
     *
     * @param  int              $id
     * @param UpdateDwSubmissionvil3Request $request
     *
     * @return Response
     */
    public function update($id, UpdateDwSubmissionvil3Request $request)
    {
        $dwSubmissionvil3 = $this->dwSubmissionvil3Repository->findWithoutFail($id);

        if (empty($dwSubmissionvil3)) {
            Flash::error('Dw Submissionvil3 not found');

            return redirect(route('dwsubmissions.dwSubmissionvil3s.index'));
        }

        $dwSubmissionvil3 = $this->dwSubmissionvil3Repository->update($request->all(), $id);

        Flash::success('Dw Submissionvil3 updated successfully.');

        return redirect(route('dwsubmissions.dwSubmissionvil3s.index'));
    }

    /**
     * Remove the specified DwSubmissionvil3 from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dwSubmissionvil3 = $this->dwSubmissionvil3Repository->findWithoutFail($id);

        if (empty($dwSubmissionvil3)) {
            Flash::error('Dw Submissionvil3 not found');

            return redirect(route('dwsubmissions.dwSubmissionvil3s.index'));
        }

        $this->dwSubmissionvil3Repository->delete($id);

        Flash::success('Dw Submissionvil3 deleted successfully.');

        return redirect(route('dwsubmissions.dwSubmissionvil3s.index'));
    }
}
