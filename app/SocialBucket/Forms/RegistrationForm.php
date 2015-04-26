<?php namespace SocialBucket\Forms;

use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator{

    /*
     * Validation Rules for the Registration Form
     *
     * @var array
     */
    protected $rules = [
        'username' => 'required|unique:users',
        'email'    => 'required|email|unique:users',
        'password' => 'required|confirmed'
    ];


}