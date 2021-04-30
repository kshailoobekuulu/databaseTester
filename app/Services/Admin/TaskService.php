<?php
namespace App\Services\Admin;

use App\Models\Task;
use App\Validators\Admin\TaskValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskService{

    protected $taskValidator;

    /**
     * TaskService constructor.
     * @param TaskValidator $validator
     */
    public function __construct(TaskValidator $validator)
    {
        $this->taskValidator = $validator;
    }

    public function getTasks(Request $request){
        return Task::paginate(20);
    }

    public function getTask($task){
        $categories = $task->categories;
        return ['task' => $task, 'categories' => $categories];
    }

    public function updateTask(Request $request, Task $task){
        $this->taskValidator->validate($request);
        $this->storeOrUpdateTaskInRepository($request, $task);
    }

    public function storeTask(Request $request){
        $this->taskValidator->validate($request);
        $task = new Task();
        $this->storeOrUpdateTaskInRepository($request, $task);
    }

    public function storeOrUpdateTaskInRepository(Request $request, $task){
        $this->updateFields($request, $task);
        $this->updateCategoriesOfTask($request, $task);
    }

    public function updateFields(Request $request, $task){
        $task->setTitle($request->input('title'));
        $task->setDescription($request->input('description'));
        $task->setType($request->input('type'));
        $task->setMySqlSolution($request->input('mysql_solution'));
        $task->setPostgreSolution($request->input('postgre_solution'));
        $task->setMsSqlSolution($request->input('mssql_solution'));
        $task->setActive($request->has('status'));
        $task->save();
    }

    public function updateCategoriesOfTask(Request $request, $task){
        $task->categories()->detach();
        $task->categories()->attach($request->input('category'));
    }
}
