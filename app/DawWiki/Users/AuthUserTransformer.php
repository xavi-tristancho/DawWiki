<?php namespace DawWiki\Users;

use League\Fractal\TransformerAbstract;

class AuthUserTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @param User $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'session_id' => \Session::getId(),
            'id'         => $user->id,
            'username'   => $user->username,
            'email'      => $user->email,
            'role'       => $user->role
        ];
    }
}