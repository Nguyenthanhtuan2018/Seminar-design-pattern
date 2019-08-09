<?php

namespace App\Http\Controllers;

use App\Common\Messages;
use App\Repositories\UserRepository;
use App\Responses\UserResponse;
use App\Validators\UserValidator;
use Illuminate\Support\Facades\Auth;
use function request;

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

    /**
     * Login
     *
     * @return \Illuminate\Http\JsonResponse
     * @author thanh_tuan
     * @since  2019-08-09
     */
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {

            $data = [
                'id'    => Auth::id(),
                'token' => Auth::user()->createToken('Seminar')->accessToken,
                'name'  => Auth::user()->name
            ];

            $message = $this->responce::LOGIN_SUCCESS;

            return $this->responce->created($data, $message);

        } else {

            $message = $this->responce::LOGIN_FAIL;

            return $this->responce->error($message);
        }
    }
}
