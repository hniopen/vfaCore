<?php

namespace App\DataTables\Dwsubmissions;

use App\Models\Dwsubmissions\DwSubmissionvil;
use Form;
use Yajra\Datatables\Services\DataTable;

class DwSubmissionvilDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'dwsubmissions.dw_submissionvils.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $dwSubmissionvils = DwSubmissionvil::query();

        return $this->applyScopes($dwSubmissionvils);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'id' => ['name' => 'id', 'data' => 'id'],
            'projectId' => ['name' => 'projectId', 'data' => 'projectId'],
            'submissionId' => ['name' => 'submissionId', 'data' => 'submissionId'],
            'dwSubmittedAt' => ['name' => 'dwSubmittedAt', 'data' => 'dwSubmittedAt'],
            'datasenderId' => ['name' => 'datasenderId', 'data' => 'datasenderId'],
            'cleanFlag' => ['name' => 'cleanFlag', 'data' => 'cleanFlag']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'dwSubmissionvils';
    }
}
