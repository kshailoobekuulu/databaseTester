<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;
    public static $tableName = 'categories';

    public function getId(){
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle(){
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title){
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getSlug(){
        return $this->slug;
    }

    /**
     * @param $slug
     */
    public function setSlug($slug) {
        $this->slug = $slug;
    }

    public function tasks(){
        return $this->belongsToMany(Task::class, 'task_categories', 'category_id', 'task_id');
    }
}
