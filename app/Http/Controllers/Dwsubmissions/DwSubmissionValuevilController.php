<?php

namespace App\Http\Controllers\Dwsubmissions;

use App\DataTables\Dwsubmissions\DwSubmissionValuevilDataTable;
use App\Http\Requests\Dwsubmissions;
use App\Http\Requests\Dwsubmissions\CreateDwSubmissionValuevilRequest;
use App\Http\Requests\Dwsubmissions\UpdateDwSubmissionValuevilRequest;
use App\Repositories\Dwsubmissions\DwSubmissionValuevilRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DwSubmissionValuevilController extends AppBaseController
{
    /** @var  DwSubmissionValuevilRepository */
    private $dwSubmissionValuevilRepository;

    public function __construct(DwSubmissionValuevilRepository $dwSubmissionValuevilRepo)
    {
        $this->dwSubmissionValuevilRepository = $dwSubmissionValuevilRepo;
    }

    /**
     * Display a listing of the DwSubmissionValuevil.
     *
     * @param DwSubmissionValuevilDataTable $dwSubmissionValuevilDataTable
     * @return Response
     */
    public function index(DwSubmissionValuevilDataTable $dwSubmissionValuevilDataTable)
    {
        return $dwSubmissionValuevilDataTable->render('dwsubmissions.dw_submission_valuevils.index');
    }

    /**
     * Show the form for creating a new DwSubmissionValuevil.
     *
     * @return Response
     */
    public function create()
    {
        return view('dwsubmissions.dw_submission_valuevils.create');
    }

    /**
     * Store a newly created DwSubmissionValuevil in storage.
     *
     * @param CreateDwSubmissionValuevilRequest $request
     *
     * @return Response
     */
    public function store(CreateDwSubmissionValuevilRequest $request)
    {
        $input = $request->all();

        $dwSubmissionValuevil = $this->dwSubmissionValuevilRepository->create($input);

        Flash::success('Dw Submission Valuevil saved successfully.');

        return redirect(route('dwsubmissions.dwSubmissionValuevils.index'));
    }

    /**
     * Display the specified DwSubmissionValuevil.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dwSubmissionValuevil = $this->dwSubmissionValuevilRepository->findWithoutFail($id);

        if (empty($dwSubmissionValuevil)) {
            Flash::error('Dw Submission Valuevil not found');

            return redirect(route('dwsubmissions.dwSubmissionValuevils.index'));
        }

        return view('dwsubmissions.dw_submission_valuevils.show')->with('dwSubmissionValuevil', $dwSubmissionValuevil);
    }

    /**
     * Show the form for editing the specified DwSubmissionValuevil.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dwSubmissionValuevil = $this->dwSubmissionValuevilRepository->findWithoutFail($id);

        if (empty($dwSubmissionValuevil)) {
            Flash::error('Dw Submission Valuevil not found');

            return redirect(route('dwsubmissions.dwSubmissionValuevils.index'));
        }

        return view('dwsubmissions.dw_submission_valuevils.edit')->with('dwSubmissionValuevil', $dwSubmissionValuevil);
    }

    /**
     * Update the specified DwSubmissionValuevil in storage.
     *
     * @param  int              $id
     * @param UpdateDwSubmissionValuevilRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDwSubmissionValuevilRequest $request)
    {
        $dwSubmissionValuevil = $this->dwSubmissionValuevilRepository->findWithoutFail($id);

        if (empty($dwSubmissionValuevil)) {
            Flash::error('Dw Submission Valuevil not found');

            return redirect(route('dwsubmissions.dwSubmissionValuevils.index'));
        }

        $dwSubmissionValuevil = $this->dwSubmissionValuevilRepository->update($request->all(), $id);

        Flash::success('Dw Submission Valuevil updated successfully.');

        return redirect(route('dwsubmissions.dwSubmissionValuevils.index'));
    }

    /**
     * Remove the specified DwSubmissionValuevil from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dwSubmissionValuevil = $this->dwSubmissionValuevilRepository->findWithoutFail($id);

        if (empty($dwSubmissionValuevil)) {
            Flash::error('Dw Submission Valuevil not found');

            return redirect(route('dwsubmissions.dwSubmissionValuevils.index'));
        }

        $this->dwSubmissionValuevilRepository->delete($id);

        Flash::success('Dw Submission Valuevil deleted successfully.');

        return redirect(route('dwsubmissions.dwSubmissionValuevils.index'));
    }
}
