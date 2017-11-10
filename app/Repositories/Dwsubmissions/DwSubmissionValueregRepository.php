<?php

namespace App\Repositories\Dwsubmissions;

use App\Models\Dwsubmissions\DwSubmissionValuereg;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DwSubmissionValueregRepository
 * @package App\Repositories\Dwsubmissions
 * @version October 16, 2017, 12:28 pm UTC
 *
 * @method DwSubmissionValuereg findWithoutFail($id, $columns = ['*'])
 * @method DwSubmissionValuereg find($id, $columns = ['*'])
 * @method DwSubmissionValuereg first($columns = ['*'])
*/
class DwSubmissionValueregRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'questionId',
        'submissionId',
        'xformQuestionId',
        'value'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DwSubmissionValuereg::class;
    }
}
