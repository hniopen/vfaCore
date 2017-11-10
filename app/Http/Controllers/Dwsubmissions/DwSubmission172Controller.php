<?php

namespace App\Http\Controllers\Dwsubmissions;

use App\DataTables\Dwsubmissions\DwSubmission172DataTable;
use App\Http\Requests\Dwsubmissions;
use App\Http\Requests\Dwsubmissions\CreateDwSubmission172Request;
use App\Http\Requests\Dwsubmissions\UpdateDwSubmission172Request;
use App\Repositories\Dwsubmissions\DwSubmission172Repository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DwSubmission172Controller extends AppBaseController
{
    /** @var  DwSubmission172Repository */
    private $dwSubmission172Repository;

    public function __construct(DwSubmission172Repository $dwSubmission172Repo)
    {
        $this->dwSubmission172Repository = $dwSubmission172Repo;
    }

    /**
     * Display a listing of the DwSubmission172.
     *
     * @param DwSubmission172DataTable $dwSubmission172DataTable
     * @return Response
     */
    public function index(DwSubmission172DataTable $dwSubmission172DataTable)
    {
        return $dwSubmission172DataTable->render('dwsubmissions.dw_submission172s.index');
    }

    /**
     * Show the form for creating a new DwSubmission172.
     *
     * @return Response
     */
    public function create()
    {
        return view('dwsubmissions.dw_submission172s.create');
    }

    /**
     * Store a newly created DwSubmission172 in storage.
     *
     * @param CreateDwSubmission172Request $request
     *
     * @return Response
     */
    public function store(CreateDwSubmission172Request $request)
    {
        $input = $request->all();

        $dwSubmission172 = $this->dwSubmission172Repository->create($input);

        Flash::success('Dw Submission172 saved successfully.');

        return redirect(route('dwsubmissions.dwSubmission172s.index'));
    }

    /**
     * Display the specified DwSubmission172.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dwSubmission172 = $this->dwSubmission172Repository->findWithoutFail($id);

        if (empty($dwSubmission172)) {
            Flash::error('Dw Submission172 not found');

            return redirect(route('dwsubmissions.dwSubmission172s.index'));
        }

        return view('dwsubmissions.dw_submission172s.show')->with('dwSubmission172', $dwSubmission172);
    }

    /**
     * Show the form for editing the specified DwSubmission172.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dwSubmission172 = $this->dwSubmission172Repository->findWithoutFail($id);

        if (empty($dwSubmission172)) {
            Flash::error('Dw Submission172 not found');

            return redirect(route('dwsubmissions.dwSubmission172s.index'));
        }

        return view('dwsubmissions.dw_submission172s.edit')->with('dwSubmission172', $dwSubmission172);
    }

    /**
     * Update the specified DwSubmission172 in storage.
     *
     * @param  int              $id
     * @param UpdateDwSubmission172Request $request
     *
     * @return Response
     */
    public function update($id, UpdateDwSubmission172Request $request)
    {
        $dwSubmission172 = $this->dwSubmission172Repository->findWithoutFail($id);

        if (empty($dwSubmission172)) {
            Flash::error('Dw Submission172 not found');

            return redirect(route('dwsubmissions.dwSubmission172s.index'));
        }

        $dwSubmission172 = $this->dwSubmission172Repository->update($request->all(), $id);

        Flash::success('Dw Submission172 updated successfully.');

        return redirect(route('dwsubmissions.dwSubmission172s.index'));
    }

    /**
     * Remove the specified DwSubmission172 from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dwSubmission172 = $this->dwSubmission172Repository->findWithoutFail($id);

        if (empty($dwSubmission172)) {
            Flash::error('Dw Submission172 not found');

            return redirect(route('dwsubmissions.dwSubmission172s.index'));
        }

        $this->dwSubmission172Repository->delete($id);

        Flash::success('Dw Submission172 deleted successfully.');

        return redirect(route('dwsubmissions.dwSubmission172s.index'));
    }
}
