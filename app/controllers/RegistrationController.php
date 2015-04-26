<?php

use SocialBucket\Forms\RegistrationForm;
use SocialBucket\Registration\RegisterUserCommand;
use Laracasts\Flash\FlashNotifier;


class RegistrationController extends BaseController
{



    private $registrationForm;

    function __construct(RegistrationForm $registrationForm)
    {
        $this->registrationForm = $registrationForm;

        $this->beforeFilter('guest');


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('registration.create');
	}

    /*
     * Create a new SocialBucket User
     *
     * @return string
     */
    public function store()
    {
        $this->registrationForm->validate(Input::all());

        $user = $this->execute(RegisterUserCommand::class);

        Auth::login($user);

        Flash::message('Glad to welcome you in the SocialBucket Family');


        return Redirect::home()->with('flash_message', 'Welcome aboard!');
    }

}
