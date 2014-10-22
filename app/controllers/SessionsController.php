<?php

use DawWiki\Users\AuthUserTransformer;
use DawWiki\Users\UserTransformer;
use League\Fractal\Manager;

class SessionsController extends ApiController
{
    public function __construct()
    {
        parent::__construct(new Manager);

        $this->beforeFilter('auth', ['on' => ['delete']]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $formData = Input::only('email', 'password');

        if( ! Auth::attempt($formData))
        {
            return $this->errorWrongArgs();
        }

        $user = Auth::user();

        return $this->respondWithItem($user, new AuthUserTransformer);
    }

    /**
     * Log a user out of DawWiki
     * @return mixed
     */
    public function destroy()
    {
        Auth::logout();

        return Redirect::to('/');
    }
}