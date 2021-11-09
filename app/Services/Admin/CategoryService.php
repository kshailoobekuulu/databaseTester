<?php


namespace App\Services\Admin;


use App\Models\Category;
use App\Validators\CategoryValidator;
use Illuminate\Http\Request;

class CategoryService
{
    protected $categoryValidator;

    /**
     * CategoryService constructor.
     * @param CategoryValidator $validator
     */
    public function __construct(CategoryValidator $validator){
        $this->categoryValidator = $validator;
    }

    public function getCategories(){
        return Category::paginate(20);
    }
    public function storeOrUpdateCategory(Request $request, $category){
        $this->categoryValidator->validate($request, $category);
        $category->setTitle($request->input('title'));
        $category->setSlug($request->input('slug'));
        $category->save();
    }

    public function removeCategory($category){
        return $category->delete();
    }

}
