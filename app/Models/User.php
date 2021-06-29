<?php

namespace App\Models;

use App\Auth\AuthMustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends AuthMustVerifyEmail
{
    const SUPER_ADMIN = 'superadmin';
    const ADMIN = 'admin';
    const DEFAULT_PHOTO_PATH = 'img/default_photo.png';
    const IMAGES_PATH = 'app/public/uploads/profilePhotos';
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
        'role',
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

    public function getYear() {
        return $this->year;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMainPhoneNumber() {
        return $this->phone;
    }

    public function getAdditionalPhoneNumber() {
        return $this->phone2;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
    }

    public function getName() {
        return $this->name;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setSurname($surname) {
        $this->surname = $surname;
    }

    public function setRole($roleId) {
        $this->role_id = $roleId;
    }

    public function setUniversityYear($year) {
        $this->year = $year;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setMainPhoneNumber($phoneNumber) {
        $this->phone = $phoneNumber;
    }

    public function setAdditionalPhoneNumber($phoneNumber) {
        $this->phone2 = $phoneNumber;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function solvedTasks(){
        return $this->belongsToMany(Task::class, 'user_tasks', 'user_id', 'task_id')
            ->withPivot(['correct_solution', 'last_solution', 'solved_at']);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }
}
