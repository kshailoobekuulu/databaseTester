<?php
namespace App\Services\FrontEnd;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskService {
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
        $repository = resolve($request->syntax);
        $syntax = $request->syntax;
        $correctSolution = $repository->select($task->$syntax);
        $userSolution = $repository->select($request->solution);
        if(count($correctSolution) != count($userSolution)) {
            return false;
        }
        $size = count($correctSolution);
        for($i = 0; $i < $size; $i++) {
            if($userSolution[$i] != $correctSolution[$i]) {
                return false;
            }
        }
        $request->user()->solvedTasks()->detach($task);
        $request->user()->solvedTasks()->attach($task, ['correct_solution' => $request->solution, 'solved_at' => now()]);
        return true;
    }
}
