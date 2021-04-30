<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index () {
        $users = User::with('roles')->paginate(20);
        return view('admin.users.index', ['users' => $users]);
    }

    public function show($id) {
        if (Gate::denies('update-user-information')) {
            abort(403, 'Only super user has access to this action');
        }
        return view('admin.users.show');
    }
}
