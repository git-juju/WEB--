<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

// 黄经强房间政策
class UserPolicy
{
    use HandlesAuthorization;


    // 能放东西
    // $currentUser = 当前登陆用户
    // $user = 目标用户/房间
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }

    // 能拿东西
    public function destroy(User $currentUser, User $user)
    {
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }
    public function follow(User $currentUser, User $user)
    {
        return $currentUser->id !== $user->id;
    }
}
