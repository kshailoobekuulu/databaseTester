<?php
namespace App\Http\Controllers\FrontEnd;

use App\DatabaseModels\BaseDatabase;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Services\FrontEnd\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller {
    protected $taskService;
    protected $userId;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(){
        $data = $this->taskService->getTasks();
        return view('frontend.tasks.index', $data);
    }

    public function show(Task $task){
        $solutions = $task->solvedBy()->select(['correct_solution', 'last_solution'])->where('user_id', auth()->id())->first();
        return view('frontend.tasks.show', [
            'task' => $task,
            'solutions' => $solutions,
            'availableSyntax' => BaseDatabase::AVAILABLE_SYNTAX
        ]);
    }

    public function checkSolution(Request $request, Task $task) {
        if($this->taskService->checkSolution($request, $task)){
            return back()->with('success', 'Accepted');
        }
        return back()->with('error', 'Wrong answer');
    }
}
