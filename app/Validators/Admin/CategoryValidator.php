<?php


namespace App\Validators\Admin;
use Illuminate\Http\Request;

class CategoryValidator{

    public function validate(Request $request, $category = null){
        $request->validate($this->getValidationRules($category), [], $this->getFieldNames());
    }

    public function getFieldNames(){
        return [
            'title' => __('messages.Category'),
            'slug' => __('messages.Slug')
        ];
    }
    public function getValidationRules($category){
        $id = $category ? ',' . $category->getId() : '';
        return [
            'title' => 'required|max:255|unique:categories,title' . $id,
            'slug' => [
                'required',
                'regex:/^[a-zA-Z0-9]+[A-Za-z0-9_-]*[a-zA-Z0-9]$/',
                'max:255',
                'unique:categories,slug' . $id,
            ]
        ];
    }
}
