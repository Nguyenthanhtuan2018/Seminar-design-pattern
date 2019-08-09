<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
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
class ContactsController extends Controller
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
     * ContactsController constructor.
     *
     * @param ContactRepository $repository
     * @param ContactValidator $validator
     */
    public function __construct(ContactRepository $repository, ContactValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }
}
