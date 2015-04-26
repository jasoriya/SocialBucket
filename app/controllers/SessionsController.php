<?php

use SocialBucket\Forms\SignInForm;

class SessionsController extends \BaseController {

    function __construct(SignInForm $signInForm)
    {
        $this->signInForm = $signInForm;

        $this->beforeFilter('guest', ['except' => 'destroy']);
    }


    /**
	 * Show the form for signing in.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//fetch the form input
        // validate the form
        // if invalid, then go back
        $formData = Input::only('email', 'password');
        $this->signInForm->validate($formData);

         //if it is valid, then try to sign in
        if ( ! Auth::attempt($formData)) {
            Flash::message('We are unable to sign you in. Please check your credentials and try again.');

            return Redirect::back()->withInput();
        }

            Flash::message('Welcome back!');
            //redirect to statuses
            return Redirect::intended('statuses');

    }

    public function destroy()
    {
        Auth::logout();

        Flash::message('You have been logged out');

        return Redirect::home();
    }




}
