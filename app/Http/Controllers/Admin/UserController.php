<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index () {
        $users = User::with('roles')->paginate(20);
        return view('admin.users.index', ['users' => $users]);
    }

    public function show($id) {
        return view('admin.users.show');
    }
}
