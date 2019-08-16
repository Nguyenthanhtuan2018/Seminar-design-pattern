<?php

namespace App\Http\Controllers;

use App\Criteria\ContactCriteria;
use App\Entities\Contact;
use App\Responses\ContactResponse;
use App\Services\Contact\ContactService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ContactCreateRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Repositories\ContactRepository;
use App\Validators\ContactValidator;

/**
 * Class ContactsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ContactsController extends CoresController
{
    /**
     * @var ContactRepository
     */
    protected $repository;

    /**
     * @var ContactValidator
     */
    protected $validator;

    /**
     * @var
     */

    private $service;

    /**
     * ContactsController constructor.
     *
     * @param ContactRepository $repository
     * @param ContactValidator $validator
     */
    public function __construct(ContactRepository $repository, ContactValidator $validator, ContactResponse $response, ContactCriteria $criteria, ContactService $service)
    {
        parent::__construct($repository, $validator, $response, $criteria);
        $this->service = $service;
    }

    public function testSingleton()
    {
        $result = $this->service->getInstance();
        print_r($result->name);
    }
}
