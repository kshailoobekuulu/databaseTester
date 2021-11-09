<?php
namespace App\Services;
use App\Models\Role;
use App\Models\User;
class CheckRole{
   public static function isAdmin (User $user) {
        if ($user->roles->where('type', Role::ADMIN)->first() || $user->roles->where('type', Role::SUPER_ADMIN)->first()) {
            return true;
        }
        return false;
    }

    public static function isSuperAdmin (User $user) {
        if ($user->roles->where('type', Role::SUPER_ADMIN)->first()) {
            return true;
        }
        return false;
    }
}
