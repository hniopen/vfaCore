<?php

namespace App\Repositories\Dwsubmissions;

use App\Models\Dwsubmissions\DwSubmission172;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DwSubmission172Repository
 * @package App\Repositories\Dwsubmissions
 * @version October 16, 2017, 1:01 pm UTC
 *
 * @method DwSubmission172 findWithoutFail($id, $columns = ['*'])
 * @method DwSubmission172 find($id, $columns = ['*'])
 * @method DwSubmission172 first($columns = ['*'])
*/
class DwSubmission172Repository extends BaseRepository
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
        return DwSubmission172::class;
    }
}
