<?php

namespace App\Repositories;

use App\Contracts\DataTransformer;
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
     * Boot up the repository, pushing criteria
     */
//    public function boot()
//    {
//        $this->pushCriteria(app(RequestCriteria::class));
//    }

}
