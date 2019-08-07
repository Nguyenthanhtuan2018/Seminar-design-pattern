<?php

namespace App\Repositories;

use App\Entities\User;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserRepository extends CoreRepositoryEloquent
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    public function getListUser()
    {
       return $this->model->all()->toArray();
    }

    /**
     * @return mixed|void
     */
    public function getAll()
    {
        return $this->model->all()->toArray();
        // TODO: Implement getAll() method.
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
//    public function validator()
//    {
//
//        return UserValidator::class;
//    }


    /**
     * Boot up the repository, pushing criteria
     */
//    public function boot()
//    {
//        $this->pushCriteria(app(RequestCriteria::class));
//    }

}
