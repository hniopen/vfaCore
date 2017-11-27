<?php

namespace App\Repositories\Dwsubmissions;

use App\Models\Dwsubmissions\DwSubmissionvil3;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DwSubmissionvil3Repository
 * @package App\Repositories\Dwsubmissions
 * @version November 27, 2017, 6:19 am UTC
 *
 * @method DwSubmissionvil3 findWithoutFail($id, $columns = ['*'])
 * @method DwSubmissionvil3 find($id, $columns = ['*'])
 * @method DwSubmissionvil3 first($columns = ['*'])
*/
class DwSubmissionvil3Repository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'projectId',
        'submissionId',
        'dwSubmittedAt',
        'datasenderId',
        'cleanFlag',
        'pushIdnrStatus'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DwSubmissionvil3::class;
    }
}
