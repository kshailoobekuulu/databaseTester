<?php


namespace App\Validators\Frontend;


use App\DatabaseModels\BaseDatabase;
use Illuminate\Http\Request;

class TaskValidator
{
    public function getFieldNames() {
        return [
            'solution' => __('messages.Code'),
            'syntax' => strtolower(__('messages.Syntax'))
        ];
    }

    public function getValidationRules() {
        return [
            'solution' => 'required',
            'syntax' => 'required|in:' . implode(',', BaseDatabase::AVAILABLE_SYNTAX)
        ];
    }

    public function validate(Request $request) {
        $request->validate($this->getValidationRules(), [], $this->getFieldNames());
    }
}
