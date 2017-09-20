<?php

namespace App\Repositories\Dwsync;

use App\Models\Dwsync\DwEntityType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DwEntityTypeRepository
 * @package App\Repositories\Dwsync
 * @version September 20, 2017, 10:32 pm UTC
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
