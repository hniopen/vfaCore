<?php

namespace App\Repositories\Dwsubmissions;

use App\Models\Dwsubmissions\DwSubmissionValuevil3;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DwSubmissionValuevil3Repository
 * @package App\Repositories\Dwsubmissions
 * @version November 27, 2017, 6:19 am UTC
 *
 * @method DwSubmissionValuevil3 findWithoutFail($id, $columns = ['*'])
 * @method DwSubmissionValuevil3 find($id, $columns = ['*'])
 * @method DwSubmissionValuevil3 first($columns = ['*'])
*/
class DwSubmissionValuevil3Repository extends BaseRepository
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
        return DwSubmissionValuevil3::class;
    }
}
