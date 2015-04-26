<?php namespace SocialBucket\Forms;

use Laracasts\Validation\FormValidator;

class SignInForm extends FormValidator{

    /*
     * Validation Rules for the Registration Form
     *
     * @var array
     */
    protected $rules = [
        'email'    => 'required',
        'password' => 'required'
    ];


}