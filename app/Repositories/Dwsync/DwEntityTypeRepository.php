<?php

namespace App\Repositories\Dwsync;

use App\Models\Dwsync\DwEntityType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DwEntityTypeRepository
 * @package App\Repositories\Dwsync
 * @version September 21, 2017, 8:11 am UTC
 *
 * @method DwEntityType findWithoutFail($id, $columns = ['*'])
 * @method DwEntityType find($id, $columns = ['*'])
 * @method DwEntityType first($columns = ['*'])
*/
class DwEntityTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'comment',
        'apiUrl'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DwEntityType::class;
    }
}
