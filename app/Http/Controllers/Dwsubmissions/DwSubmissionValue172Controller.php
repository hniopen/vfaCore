<?php

namespace App\Http\Controllers\Dwsubmissions;

use App\DataTables\Dwsubmissions\DwSubmissionValue172DataTable;
use App\Http\Requests\Dwsubmissions;
use App\Http\Requests\Dwsubmissions\CreateDwSubmissionValue172Request;
use App\Http\Requests\Dwsubmissions\UpdateDwSubmissionValue172Request;
use App\Repositories\Dwsubmissions\DwSubmissionValue172Repository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DwSubmissionValue172Controller extends AppBaseController
{
    /** @var  DwSubmissionValue172Repository */
    private $dwSubmissionValue172Repository;

    public function __construct(DwSubmissionValue172Repository $dwSubmissionValue172Repo)
    {
        $this->dwSubmissionValue172Repository = $dwSubmissionValue172Repo;
    }

    /**
     * Display a listing of the DwSubmissionValue172.
     *
     * @param DwSubmissionValue172DataTable $dwSubmissionValue172DataTable
     * @return Response
     */
    public function index(DwSubmissionValue172DataTable $dwSubmissionValue172DataTable)
    {
        return $dwSubmissionValue172DataTable->render('dwsubmissions.dw_submission_value172s.index');
    }

    /**
     * Show the form for creating a new DwSubmissionValue172.
     *
     * @return Response
     */
    public function create()
    {
        return view('dwsubmissions.dw_submission_value172s.create');
    }

    /**
     * Store a newly created DwSubmissionValue172 in storage.
     *
     * @param CreateDwSubmissionValue172Request $request
     *
     * @return Response
     */
    public function store(CreateDwSubmissionValue172Request $request)
    {
        $input = $request->all();

        $dwSubmissionValue172 = $this->dwSubmissionValue172Repository->create($input);

        Flash::success('Dw Submission Value172 saved successfully.');

        return redirect(route('dwsubmissions.dwSubmissionValue172s.index'));
    }

    /**
     * Display the specified DwSubmissionValue172.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dwSubmissionValue172 = $this->dwSubmissionValue172Repository->findWithoutFail($id);

        if (empty($dwSubmissionValue172)) {
            Flash::error('Dw Submission Value172 not found');

            return redirect(route('dwsubmissions.dwSubmissionValue172s.index'));
        }

        return view('dwsubmissions.dw_submission_value172s.show')->with('dwSubmissionValue172', $dwSubmissionValue172);
    }

    /**
     * Show the form for editing the specified DwSubmissionValue172.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dwSubmissionValue172 = $this->dwSubmissionValue172Repository->findWithoutFail($id);

        if (empty($dwSubmissionValue172)) {
            Flash::error('Dw Submission Value172 not found');

            return redirect(route('dwsubmissions.dwSubmissionValue172s.index'));
        }

        return view('dwsubmissions.dw_submission_value172s.edit')->with('dwSubmissionValue172', $dwSubmissionValue172);
    }

    /**
     * Update the specified DwSubmissionValue172 in storage.
     *
     * @param  int              $id
     * @param UpdateDwSubmissionValue172Request $request
     *
     * @return Response
     */
    public function update($id, UpdateDwSubmissionValue172Request $request)
    {
        $dwSubmissionValue172 = $this->dwSubmissionValue172Repository->findWithoutFail($id);

        if (empty($dwSubmissionValue172)) {
            Flash::error('Dw Submission Value172 not found');

            return redirect(route('dwsubmissions.dwSubmissionValue172s.index'));
        }

        $dwSubmissionValue172 = $this->dwSubmissionValue172Repository->update($request->all(), $id);

        Flash::success('Dw Submission Value172 updated successfully.');

        return redirect(route('dwsubmissions.dwSubmissionValue172s.index'));
    }

    /**
     * Remove the specified DwSubmissionValue172 from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dwSubmissionValue172 = $this->dwSubmissionValue172Repository->findWithoutFail($id);

        if (empty($dwSubmissionValue172)) {
            Flash::error('Dw Submission Value172 not found');

            return redirect(route('dwsubmissions.dwSubmissionValue172s.index'));
        }

        $this->dwSubmissionValue172Repository->delete($id);

        Flash::success('Dw Submission Value172 deleted successfully.');

        return redirect(route('dwsubmissions.dwSubmissionValue172s.index'));
    }
}
