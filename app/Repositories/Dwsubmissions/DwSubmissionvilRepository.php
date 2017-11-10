<?php

namespace App\Repositories\Dwsubmissions;

use App\Models\Dwsubmissions\DwSubmissionvil;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DwSubmissionvilRepository
 * @package App\Repositories\Dwsubmissions
 * @version October 16, 2017, 12:48 pm UTC
 *
 * @method DwSubmissionvil findWithoutFail($id, $columns = ['*'])
 * @method DwSubmissionvil find($id, $columns = ['*'])
 * @method DwSubmissionvil first($columns = ['*'])
*/
class DwSubmissionvilRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'projectId',
        'submissionId',
        'dwSubmittedAt',
        'datasenderId',
        'cleanFlag'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DwSubmissionvil::class;
    }
}
