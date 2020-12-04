<?php


namespace App\Validators;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryValidator
{
    public function getFieldNames(){
        return [
            'title' => __('messages.Category'),
            'slug' => __('messages.Slug')
        ];
    }
    public function getValidationRules($category){
        $id = $category ? ',' . $category->id : '';
        return [
            'title' => 'bail|required|max:255|unique:categories,slug' . $id,
            'slug' => 'bail|required|max:255|unique:categories,title' . $id,
        ];
    }

    public function validate(Request $request, $category = null){
        $request->validate($this->getValidationRules($category), [], $this->getFieldNames());
    }
}
