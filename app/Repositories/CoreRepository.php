<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

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
