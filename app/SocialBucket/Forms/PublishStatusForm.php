<?php
/**
 * Created by PhpStorm.
 * User: jasoriyas
 * Date: 15-04-2015
 * Time: 17:58
 */

namespace SocialBucket\Forms;


use Laracasts\Validation\FormValidator;

class PublishStatusForm extends FormValidator{

    /*
    * Validation Rules for the publish Status Form
    *
    * @var array
    */
    protected $rules = [
        'body'    => 'required'
    ];

}