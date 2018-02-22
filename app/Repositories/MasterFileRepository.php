<?php

namespace App\Repositories;

use App\Models\MasterFile;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MasterFileRepository
 * @package App\Repositories
 * @version November 22, 2017, 9:56 am UTC
 *
 * @method MasterFile findWithoutFail($id, $columns = ['*'])
 * @method MasterFile find($id, $columns = ['*'])
 * @method MasterFile first($columns = ['*'])
*/
class MasterFileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'surname',
        'firstname',
        'middlename',
        'gender',
        'national_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MasterFile::class;
    }
}
