<?php

namespace App\Repositories\Mappingquestion;

use App\Models\Mappingquestion\MappingQuestion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MappingQuestionRepository
 * @package App\Repositories\Mappingquestion
 * @version October 11, 2017, 5:51 am UTC
 *
 * @method MappingQuestion findWithoutFail($id, $columns = ['*'])
 * @method MappingQuestion find($id, $columns = ['*'])
 * @method MappingQuestion first($columns = ['*'])
*/
class MappingQuestionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'functions',
        'arg1',
        'arg2'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MappingQuestion::class;
    }
}
