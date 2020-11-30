<?php
namespace App\Http\Controllers\FrontEnd;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class TaskController extends Controller {
    public function index(){
        return view('index');
    }
}
