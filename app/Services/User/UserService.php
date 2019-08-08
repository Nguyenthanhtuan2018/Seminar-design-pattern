<?php
/**
 * @author ADMIN
 * @since  2019-08-08
 */

namespace App\Services\User;


use App\Repositories\UserRepository;
use App\Services\Contract\CoreService;

class UserService extends CoreService
{
    /**
     * @var UserRepository
     */
    private $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
}