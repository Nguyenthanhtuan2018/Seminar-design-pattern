<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CoreRepository;
use App\Entities\Core;
use App\Validators\CoreValidator;

/**
 * Class CoreRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
abstract class CoreRepositoryEloquent extends BaseRepository implements CoreRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
//    public function model()
//    {
//        return Core::class;
//    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
//    public function validator()
//    {
//
//        return CoreValidator::class;
//    }


    /**
     * Boot up the repository, pushing criteria
     */
//    public function boot()
//    {
//        $this->pushCriteria(app(RequestCriteria::class));
//    }

}
