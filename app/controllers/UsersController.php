<?php

use DawWiki\Users\UserTransformer;

class UsersController extends ApiController
{

    public function me()
    {
        $me = Auth::user();

        return $this->respondWithItem($me, new UserTransformer);
    }
}