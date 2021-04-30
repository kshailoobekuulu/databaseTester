<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const SUPER_ADMIN = 'superadmin';
    const ADMIN = 'admin';

    use HasFactory;

    public function getType() {
        return $this->type;
    }

    public function getTypeUpperCaseFirst() {
        return ucfirst($this->type);
    }

    public function users(){
        return $this->belongsToMany(User::class, 'user_roles', 'role_id', 'user_id')->withTimestamps();
    }
}
