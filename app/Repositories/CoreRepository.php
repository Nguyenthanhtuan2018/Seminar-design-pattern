<?php

namespace App\Repositories;

use App\Contracts\DataTransformer;
use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\CriteriaInterface;

/**
 * Interface CoreRepository.
 *
 * @package namespace App\Repositories;
 */
interface CoreRepository extends RepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAll();
}
