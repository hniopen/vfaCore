<?php

namespace App\Http\Controllers\Mappingproject;

use App\DataTables\Mappingproject\MappingProjectDataTable;
use App\Http\Requests\Mappingproject;
use App\Http\Requests\Mappingproject\CreateMappingProjectRequest;
use App\Http\Requests\Mappingproject\UpdateMappingProjectRequest;
use App\Repositories\Mappingproject\MappingProjectRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MappingProjectController extends AppBaseController
{
    /** @var  MappingProjectRepository */
    private $mappingProjectRepository;

    public function __construct(MappingProjectRepository $mappingProjectRepo)
    {
        $this->mappingProjectRepository = $mappingProjectRepo;
    }

    /**
     * Display a listing of the MappingProject.
     *
     * @param MappingProjectDataTable $mappingProjectDataTable
     * @return Response
     */
    public function index(MappingProjectDataTable $mappingProjectDataTable)
    {
        return $mappingProjectDataTable->render('mappingproject.mapping_projects.index');
    }

    /**
     * Show the form for creating a new MappingProject.
     *
     * @return Response
     */
    public function create()
    {
        return view('mappingproject.mapping_projects.create');
    }

    /**
     * Store a newly created MappingProject in storage.
     *
     * @param CreateMappingProjectRequest $request
     *
     * @return Response
     */
    public function store(CreateMappingProjectRequest $request)
    {
        $input = $request->all();

        $mappingProject = $this->mappingProjectRepository->create($input);

        Flash::success('Mapping Project saved successfully.');

        return redirect(route('mappingproject.mappingProjects.index'));
    }

    /**
     * Display the specified MappingProject.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mappingProject = $this->mappingProjectRepository->findWithoutFail($id);

        if (empty($mappingProject)) {
            Flash::error('Mapping Project not found');

            return redirect(route('mappingproject.mappingProjects.index'));
        }

        return view('mappingproject.mapping_projects.show')->with('mappingProject', $mappingProject);
    }

    /**
     * Show the form for editing the specified MappingProject.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mappingProject = $this->mappingProjectRepository->findWithoutFail($id);

        if (empty($mappingProject)) {
            Flash::error('Mapping Project not found');

            return redirect(route('mappingproject.mappingProjects.index'));
        }

        return view('mappingproject.mapping_projects.edit')->with('mappingProject', $mappingProject);
    }

    /**
     * Update the specified MappingProject in storage.
     *
     * @param  int              $id
     * @param UpdateMappingProjectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMappingProjectRequest $request)
    {
        $mappingProject = $this->mappingProjectRepository->findWithoutFail($id);

        if (empty($mappingProject)) {
            Flash::error('Mapping Project not found');

            return redirect(route('mappingproject.mappingProjects.index'));
        }

        $mappingProject = $this->mappingProjectRepository->update($request->all(), $id);

        Flash::success('Mapping Project updated successfully.');

        return redirect(route('mappingproject.mappingProjects.index'));
    }

    /**
     * Remove the specified MappingProject from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mappingProject = $this->mappingProjectRepository->findWithoutFail($id);

        if (empty($mappingProject)) {
            Flash::error('Mapping Project not found');

            return redirect(route('mappingproject.mappingProjects.index'));
        }

        $this->mappingProjectRepository->delete($id);

        Flash::success('Mapping Project deleted successfully.');

        return redirect(route('mappingproject.mappingProjects.index'));
    }
}
