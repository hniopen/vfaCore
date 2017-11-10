<?php

namespace App\Repositories\Dwsubmissions;

use App\Models\Dwsubmissions\DwSubmissionreg;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DwSubmissionregRepository
 * @package App\Repositories\Dwsubmissions
 * @version October 16, 2017, 12:28 pm UTC
 *
 * @method DwSubmissionreg findWithoutFail($id, $columns = ['*'])
 * @method DwSubmissionreg find($id, $columns = ['*'])
 * @method DwSubmissionreg first($columns = ['*'])
*/
class DwSubmissionregRepository extends BaseRepository
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
        return DwSubmissionreg::class;
    }
}
