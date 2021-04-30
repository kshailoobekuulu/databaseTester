<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $casts = [
        'active' => 'boolean',
    ];

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
    public function setTitle($title) : void{
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription(){
        return $this->description;
    }

    /**
     * @param $description
     */
    public function setDescription($description) : void {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getType(){
        return $this->type;
    }

    /**
     * @param $type
     */
    public function setType($type){
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function mysql(){
        return $this->mysql_solution;
    }

    /**
     * @param $mysqlSolution
     */
    public function setMySqlSolution($mysqlSolution) : void {
        $this->mysql_solution = $mysqlSolution;
    }

    /**
     * @return mixed
     */
    public function postgre(){
        return $this->postgre_solution;
    }

    /**
     * @param $postgreSolution
     */
    public function setPostgreSolution($postgreSolution) : void {
        $this->postgre_solution = $postgreSolution;
    }

    /**
     * @return mixed
     */
    public function mssql(){
        return $this->mssql_solution;
    }

    /**
     * @param $mssqlSolution
     */
    public function setMsSqlSolution($mssqlSolution) : void{
        $this->mssql_solution = $mssqlSolution;
    }

    /**
     * @return bool
     */
    public function isActive() : bool{
        return $this->active;
    }

    /**
     * @param $active
     */
    public function setActive($active) : void{
        $this->active = $active;
    }

    public function solvedBy(){
        return $this->belongsToMany(User::class, 'user_tasks', 'task_id', 'user_id')
            ->withPivot(['correct_solution', 'last_solution', 'solved_at']);
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'task_categories', 'task_id', 'category_id');
    }
}
