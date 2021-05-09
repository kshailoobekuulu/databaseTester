<?php

namespace App\Models;

use App\Auth\AuthMustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends AuthMustVerifyEmail
{
    const SUPER_ADMIN = 'superadmin';
    const ADMIN = 'admin';
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getId() {
        return $this->id;
    }

    public function getFullName() {
        return ucfirst($this->name) . ' ' . ucfirst($this->surname);
    }

    public function getRole() {
        return $this->role;
    }

    public function getRoleUpperCaseFirst() {
        return ucfirst($this->role);
    }

    public function roles(){
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id')->withTimestamps();
    }
    public function solvedTasks(){
        return $this->belongsToMany(Task::class, 'user_tasks', 'user_id', 'task_id')
            ->withPivot(['correct_solution', 'last_solution', 'solved_at']);
    }
}
