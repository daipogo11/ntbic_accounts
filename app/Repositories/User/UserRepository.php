<?php

namespace App\Repositories\User;

use App\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserInterface
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
}
