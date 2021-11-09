<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class Categories extends Component
{
    public $currentCategoryId;

    /**
     * Create a new component instance.
     *
     * @param $currentCategoryId
     */
    public function __construct($currentCategoryId = 0)
    {
        $this->currentCategoryId = $currentCategoryId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $categories = Category::all();
        return view('components.categories', compact('categories'));
    }
}
