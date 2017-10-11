<?php

namespace App\Repositories\Mappingproject;

use App\Models\Mappingproject\MappingProject;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MappingProjectRepository
 * @package App\Repositories\Mappingproject
 * @version October 6, 2017, 11:35 am UTC
 *
 * @method MappingProject findWithoutFail($id, $columns = ['*'])
 * @method MappingProject find($id, $columns = ['*'])
 * @method MappingProject first($columns = ['*'])
*/
class MappingProjectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MappingProject::class;
    }
}
