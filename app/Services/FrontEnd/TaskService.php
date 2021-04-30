<?php
namespace App\Services\FrontEnd;

use App\DatabaseModels\BaseDatabase;
use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Validators\Frontend\TaskValidator;

class TaskService {
    protected $validator;
    public function __construct(TaskValidator $validator) {
        $this->validator = $validator;
    }

    public function getTasks(){
        $currentUser = request()->user();
        $categoryId = null;
        if(request()->has('category')) {
            $category = Category::where('slug', request()->category)->firstOrFail();
            $categoryId = $category->getId();
            $tasks = $category->tasks()
                ->withCount('solvedBy')
                ->orderByDesc('created_at')
                ->with(['solvedBy' => function($q) use ($currentUser){
                    $q->where('users.id', $currentUser->id);
                }])
                ->paginate(10);
        } else {
            $tasks = Task::withCount('solvedBy')
                ->orderByDesc('created_at')
                ->with(['solvedBy' => function($q) use ($currentUser){
                    $q->where('users.id', $currentUser->id);
                }])
                ->paginate(10);
        }
        return ['tasks' => $tasks, 'currentCategoryId' => $categoryId];
    }

    public function checkSolution(Request $request, $task){
        $this->validator->validate($request);
        /**
         * @var $user User
         */
        $user = $request->user();
        if ($user->solvedTasks()->where('task_id', $task->getId())->first()) {
            $user->solvedTasks()->updateExistingPivot($task->id, ['last_solution' => $request->solution]);
        } else {
            $user->solvedTasks()->attach($task->getId(), ['last_solution' => $request->solution]);
        }

        /**
         * @var $database BaseDatabase
         */
        $database = resolve($request->syntax);
        $syntax = $request->syntax;
        $correctSolution = $database->select($task->$syntax());
        $type = $task->getType();
        $userSolution = $database->$type($request->solution);
        if(count($correctSolution) != count($userSolution)) {
            return false;
        }
        $size = count($correctSolution);
        for($i = 0; $i < $size; $i++) {
            if($userSolution[$i] != $correctSolution[$i]) {
                return false;
            }
        }
        $user->solvedTasks()->updateExistingPivot($task->getId(), ['correct_solution' => $request->solution, 'solved_at' => now()]);
        return true;
    }
}
