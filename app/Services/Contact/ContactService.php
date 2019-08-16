<?php
/**
 * @author ADMIN
 * @since  2019-08-08
 */

namespace App\Services\Contact;


use App\Entities\Contact;
use App\Repositories\ContactRepository;
use App\Services\Contract\CoreService;

class ContactService extends CoreService
{
    /**
     * @var ContactRepository
     */
    private $repository;

    /**
     * @var
     */
    private $singletonObject;

    public function __construct(ContactRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getInstance()
    {
        if ($this->singletonObject === null) {
            $this->singletonObject = new Contact();
            return $this->singletonObject;
        }

        return $this->singletonObject;
    }
}