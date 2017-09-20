<?php

namespace App\Repositories\Dwsync;

use App\Models\Dwsync\DwProject;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DwProjectRepository
 * @package App\Repositories\Dwsync
 * @version September 20, 2017, 11:02 pm UTC
 *
 * @method DwProject findWithoutFail($id, $columns = ['*'])
 * @method DwProject find($id, $columns = ['*'])
 * @method DwProject first($columns = ['*'])
*/
class DwProjectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'questCode',
        'submissionTable',
        'comment',
        'xformUrl',
        'entityType'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DwProject::class;
    }
}
