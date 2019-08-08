<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;

/**
 * Class UserValidator.
 *
 * @package namespace App\Validators;
 */
class UserValidator extends CoreValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
