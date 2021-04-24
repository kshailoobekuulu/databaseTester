<?php
namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Services\FrontEnd\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('frontend.tasks.show', ['task' => $task, 'solutions' => $solutions]);
    }

    public function checkSolution(Request $request, Task $task) {
        if($this->taskService->checkSolution($request, $task)){
            return back()->with('success', 'Accepted');
        }
        return back()->with('error', 'Wrong answer');
    }
}
