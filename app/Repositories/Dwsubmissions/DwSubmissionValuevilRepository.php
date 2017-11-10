<?php

namespace App\Repositories\Dwsubmissions;

use App\Models\Dwsubmissions\DwSubmissionValuevil;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DwSubmissionValuevilRepository
 * @package App\Repositories\Dwsubmissions
 * @version October 16, 2017, 12:48 pm UTC
 *
 * @method DwSubmissionValuevil findWithoutFail($id, $columns = ['*'])
 * @method DwSubmissionValuevil find($id, $columns = ['*'])
 * @method DwSubmissionValuevil first($columns = ['*'])
*/
class DwSubmissionValuevilRepository extends BaseRepository
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
        return DwSubmissionValuevil::class;
    }
}
