<?php

use DawWiki\Users\User;
use DawWiki\Users\UserTransformer;
use League\Fractal\Manager;
use Faker\Factory as Faker;

class UsersController extends ApiController
{
    public function __construct()
    {
        parent::__construct(new Manager);
        //Limit the users who can do more than read operations
        $this->beforeFilter('auth');
        $this->beforeFilter('role:admin', ['on' => ['post', 'put', 'patch', 'delete']]);
    }

    public function me()
    {
        $me = Auth::user();

        return $this->respondWithItem($me, new UserTransformer);
    }

    public function store()
    {
        $inputs = Input::all();

        $faker = Faker::create();

        $password = $faker->word() . $faker->randomNumber(4);

        Mail::send('emails.welcome', array('password' => $password), function($message) use ($inputs)
        {
            $message->to($inputs['email'], $inputs['username'])->subject('Benvingut a DawWiki!');
        });

        $create = User::create([

            'username' => $inputs['username'],
            'email'    => $inputs['email'],
            'role'     => $inputs['role'],
            'password' => $password
        ]);

        if($create)
        {
            return $this->respondWithArray(['message' => 'User Created']);
        }

        return $this->errorWrongArgs();
    }
}