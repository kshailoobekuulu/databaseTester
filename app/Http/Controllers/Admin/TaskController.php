<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Services\Admin\TaskService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;

    /**
     * TaskController constructor.
     * @param TaskService $service
     */
    public function __construct(TaskService $service){
        $this->taskService = $service;
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $tasks = $this->taskService->getTasks($request);
        return view('admin.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('admin.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->taskService->storeTask($request);
        return redirect()
            ->route('admin.tasks.index')
            ->with('success', __('messages.TaskCreatedSuccessfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Task  $task
     * @return View
     */
    public function show(Task $task) : View
    {
        $data = $this->taskService->getTask($task);
        return view('admin.tasks.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Task  $task
     * @return View
     */
    public function edit(Task $task)
    {
        $data = $this->taskService->getTask($task);
        return view('admin.tasks.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(Request $request, Task $task)
    {
        $this->taskService->updateTask($request, $task);
        return redirect()
            ->route('admin.tasks.show', $task->getId())
            ->with('success', __('messages.TaskUpdatedSuccessfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
