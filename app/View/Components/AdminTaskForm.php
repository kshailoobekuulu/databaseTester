<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Validators\Admin\TaskValidator;

class AdminTaskForm extends Component
{
    public $task;
    public $categoriesOfTask;

    /**
     * Create a new component instance.
     *
     * @param $categoriesOfTask
     */
    public function __construct($task, $categoriesOfTask)
    {
        $this->task=$task;
        $this->categoriesOfTask = $categoriesOfTask;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $taskType = !is_null($this->task)  ? $this->task->getType() : '';
        return view('components.admin-task-form', ['types' => TaskValidator::$types, 'taskType' => $taskType]);
    }
}
