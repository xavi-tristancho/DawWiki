<?php namespace DawWiki\Users;

use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
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
            'username'   => $user->username,
            'email'      => $user->email,
            'role'       => $user->role
        ];
    }
}