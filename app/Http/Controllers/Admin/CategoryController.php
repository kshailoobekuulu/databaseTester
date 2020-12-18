<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\Admin\CategoryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    protected $categoryService;

    /**
     * CategoryController constructor.
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
        $this->middleware(['auth', 'admin']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $categories = $this->categoryService->getCategories();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->categoryService->storeOrUpdateCategory($request, new Category());
        return redirect(route('admin.categories.index'))
            ->with('success', __('messages.CategoryCreatedSuccessfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return View
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $this->categoryService->storeOrUpdateCategory($request, $category);
        return \redirect(route('admin.categories.index'))->with('success', __('messages.CategoryUpdatedSuccessfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category)
    {
        if ($this->categoryService->removeCategory($category)) {
            return back()->with('success', __('messages.CategoryDeletedSuccessfully'));
        }
    }
}
