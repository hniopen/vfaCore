<?php

namespace App\Repositories\Dwsubmissions;

use App\Models\Dwsubmissions\DwSubmissionValue172;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DwSubmissionValue172Repository
 * @package App\Repositories\Dwsubmissions
 * @version October 16, 2017, 1:01 pm UTC
 *
 * @method DwSubmissionValue172 findWithoutFail($id, $columns = ['*'])
 * @method DwSubmissionValue172 find($id, $columns = ['*'])
 * @method DwSubmissionValue172 first($columns = ['*'])
*/
class DwSubmissionValue172Repository extends BaseRepository
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
        return DwSubmissionValue172::class;
    }
}
