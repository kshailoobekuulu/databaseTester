<?php


namespace App\Services\Admin;


use App\Models\Category;
use App\Validators\CategoryValidator;
use Illuminate\Http\Request;

class CategoryService
{
    protected $validator;

    /**
     * CategoryService constructor.
     */
    public function __construct(CategoryValidator $validator){
        $this->validator = $validator;
    }

    public function getCategories(){
        return Category::paginate(20);
    }
    public function storeOrUpdateCategory(Request $request, $category){
        $this->validator->validate($request, $category);
        $category->setTitle($request->title);
        $category->setSlug($request->slug);
        $category->save();
    }

}
