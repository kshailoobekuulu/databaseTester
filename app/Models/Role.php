<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const SUPER_ADMIN = 'superadmin';
    const ADMIN = 'admin';
    const USER = 'user';

    use HasFactory;

    public function getType() {
        return $this->type;
    }

    public function getId() {
        return $this->id;
    }

    public function getTypeUpperCaseFirst() {
        return ucfirst($this->type);
    }

    public function getTranslation() {
        return __('messages.'.$this->getTypeUpperCaseFirst());
    }

    public function users(){
        return $this->hasMany(User::class, 'role', 'id');
    }
}
