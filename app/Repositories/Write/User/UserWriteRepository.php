<?php

namespace App\Repositories\Write\User;

use App\Models\User;

class UserWriteRepository implements UserWriteRepositoryInterface
{
    public function save(User $user): User
    {
        if (!$user->save()) {
            throw new SavingErrorException();
        }

        return $user;
    }
}
