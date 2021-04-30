<?php


namespace App\Validators\Admin;


use App\DatabaseModels\BaseDatabase;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class TaskValidator
{
    const SELECT = 'select';
    const UPDATE = 'update';
    const DELETE = 'delete';
    const CREATE = 'create';
    public static $types = [self::SELECT, self::UPDATE, self::DELETE, self::CREATE];
    public function validate(Request $request){
        $request->validate($this->getValidationRules(), [], $this->getFieldNames());
        $this->validateSolution($request->only(['mysql_solution', 'postgre_solution', 'mssql_solution']));
    }

    public function getFieldNames(){
        return [
            'title' => __('messages.TaskTitle'),
            'description' => __('messages.TaskDescription'),
            'category.*' => __('messages.Categories'),
            'status' => __('messages.ShowToUsers'),
            'type' => __('messages.TaskType'),
            'mysql_solution' => 'MySQL',
            'postgre_solution' => 'PostgreSQL',
            'mssql_solution' => 'MsSQL',
        ];
    }
    public function getValidationRules(){
        return [
            'title' => 'bail|required|max:255|',
            'description' => 'bail|required',
            'type' => Rule::in(TaskValidator::$types),
            'category.*' => 'exists:'. Category::$tableName . ',id',
            'mysql_solution' => 'required',
            'postgre_solution' => 'required',
            'mssql_solution' => 'required',
        ];
    }

    public function validateSolution(array $solutions){
        foreach($solutions as $key => $query) {
            try {
                $this->checkSyntax(app($key), $query);
            } catch(\Exception $exception) {
                throw ValidationException::withMessages([
                    $key => $exception->getMessage()
                ]);
            }
        }
    }

    public function checkSyntax(BaseDatabase $database, $query){
        $database->checkSyntax($query);
    }
}
