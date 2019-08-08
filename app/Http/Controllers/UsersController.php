<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Responses\UserResponse;
use App\Validators\UserValidator;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers;
 */
class UsersController extends CoresController
{
    /**
     * UsersController constructor.
     *
     * @param UserRepository $repository
     * @param UserValidator $validator
     */
    public function __construct(UserRepository $repository, UserValidator $validator, UserResponse $response)
    {
        parent::__construct($repository, $validator, $response);
    }

    public function getListUser()
    {
        $test = $this->repository->getAll();
        print_r($test);exit;
    }
}
