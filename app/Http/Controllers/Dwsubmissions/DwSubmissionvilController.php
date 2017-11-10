<?php

namespace App\Http\Controllers\Dwsubmissions;

use App\DataTables\Dwsubmissions\DwSubmissionvilDataTable;
use App\Http\Requests\Dwsubmissions;
use App\Http\Requests\Dwsubmissions\CreateDwSubmissionvilRequest;
use App\Http\Requests\Dwsubmissions\UpdateDwSubmissionvilRequest;
use App\Repositories\Dwsubmissions\DwSubmissionvilRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DwSubmissionvilController extends AppBaseController
{
    /** @var  DwSubmissionvilRepository */
    private $dwSubmissionvilRepository;

    public function __construct(DwSubmissionvilRepository $dwSubmissionvilRepo)
    {
        $this->dwSubmissionvilRepository = $dwSubmissionvilRepo;
    }

    /**
     * Display a listing of the DwSubmissionvil.
     *
     * @param DwSubmissionvilDataTable $dwSubmissionvilDataTable
     * @return Response
     */
    public function index(DwSubmissionvilDataTable $dwSubmissionvilDataTable)
    {
        return $dwSubmissionvilDataTable->render('dwsubmissions.dw_submissionvils.index');
    }

    /**
     * Show the form for creating a new DwSubmissionvil.
     *
     * @return Response
     */
    public function create()
    {
        return view('dwsubmissions.dw_submissionvils.create');
    }

    /**
     * Store a newly created DwSubmissionvil in storage.
     *
     * @param CreateDwSubmissionvilRequest $request
     *
     * @return Response
     */
    public function store(CreateDwSubmissionvilRequest $request)
    {
        $input = $request->all();

        $dwSubmissionvil = $this->dwSubmissionvilRepository->create($input);

        Flash::success('Dw Submissionvil saved successfully.');

        return redirect(route('dwsubmissions.dwSubmissionvils.index'));
    }

    /**
     * Display the specified DwSubmissionvil.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dwSubmissionvil = $this->dwSubmissionvilRepository->findWithoutFail($id);

        if (empty($dwSubmissionvil)) {
            Flash::error('Dw Submissionvil not found');

            return redirect(route('dwsubmissions.dwSubmissionvils.index'));
        }

        return view('dwsubmissions.dw_submissionvils.show')->with('dwSubmissionvil', $dwSubmissionvil);
    }

    /**
     * Show the form for editing the specified DwSubmissionvil.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dwSubmissionvil = $this->dwSubmissionvilRepository->findWithoutFail($id);

        if (empty($dwSubmissionvil)) {
            Flash::error('Dw Submissionvil not found');

            return redirect(route('dwsubmissions.dwSubmissionvils.index'));
        }

        return view('dwsubmissions.dw_submissionvils.edit')->with('dwSubmissionvil', $dwSubmissionvil);
    }

    /**
     * Update the specified DwSubmissionvil in storage.
     *
     * @param  int              $id
     * @param UpdateDwSubmissionvilRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDwSubmissionvilRequest $request)
    {
        $dwSubmissionvil = $this->dwSubmissionvilRepository->findWithoutFail($id);

        if (empty($dwSubmissionvil)) {
            Flash::error('Dw Submissionvil not found');

            return redirect(route('dwsubmissions.dwSubmissionvils.index'));
        }

        $dwSubmissionvil = $this->dwSubmissionvilRepository->update($request->all(), $id);

        Flash::success('Dw Submissionvil updated successfully.');

        return redirect(route('dwsubmissions.dwSubmissionvils.index'));
    }

    /**
     * Remove the specified DwSubmissionvil from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dwSubmissionvil = $this->dwSubmissionvilRepository->findWithoutFail($id);

        if (empty($dwSubmissionvil)) {
            Flash::error('Dw Submissionvil not found');

            return redirect(route('dwsubmissions.dwSubmissionvils.index'));
        }

        $this->dwSubmissionvilRepository->delete($id);

        Flash::success('Dw Submissionvil deleted successfully.');

        return redirect(route('dwsubmissions.dwSubmissionvils.index'));
    }
}
