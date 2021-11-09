<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class SelectCategory extends Component
{
    public $categoriesOfTask;

    /**
     * Create a new component instance.
     *
     * @param $categoriesOfTask
     */
    public function __construct($categoriesOfTask)
    {
        $this->categoriesOfTask = $categoriesOfTask;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $categories = Category::all();
        foreach($this->categoriesOfTask as $taskCategory){
            foreach($categories as $category) {
                if($taskCategory->getId() == $category->getId()) {
                    $category->selected = true;
                }
            }
        }
        return view('components.select-category', compact('categories'));
    }
}
