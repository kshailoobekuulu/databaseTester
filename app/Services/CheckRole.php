<?php
namespace App\Services;
use App\Models\Role;
use App\Models\User;
class CheckRole{
   public static function isAdmin (User $user) {
        if ($user->role->getType() == Role::ADMIN || $user->role->type == Role::SUPER_ADMIN) {
            return true;
        }
        return false;
    }

    public static function isSuperAdmin (User $user) {
        if ($user->role->type == Role::SUPER_ADMIN) {
            return true;
        }
        return false;
    }
}
