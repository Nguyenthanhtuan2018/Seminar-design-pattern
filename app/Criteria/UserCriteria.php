<?php

namespace App\Criteria;

use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class UserCriteria.
 *
 * @package namespace App\Criteria;
 */
class UserCriteria extends CoreCriteria implements CriteriaInterface
{
    /**
     * This is custom sort, filter.
     */
//    protected function emailSort($value)
//    {
//        return $this->builder->orderBy('email', $value);
//    }
}
