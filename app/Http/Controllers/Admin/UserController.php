<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function index () {
        $this->authorize('viewAny', User::class);
        $users = User::with('role')->paginate(20);
        return view('admin.users.index', ['users' => $users]);
    }

    public function show(User $user) {
        $this->authorize('view', $user);
        $user->loadCount(['solvedTasks']);
        return view('admin.users.show', ['user' => $user]);
    }

    public function edit(User $user) {
        $this->authorize('update', $user);
        $roles = Role::all();
        return view('admin.users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, User $user) {
        $this->authorize('update', $user);
        $this->userService->validateUser($request);
        $this->userService->updateUserInformation($request, $user);
        return redirect()->route('admin.users.show', $user->getId());
    }

    public function destroy(Request $request, User $user) {
        $this->authorize('delete', $user);
        $currentUser = auth()->user();
        if ($currentUser->getId() == $user->getId()) {
            return redirect()->back()->with('error', __("messages.CanNotDeleteYourself"));
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', __('messages.UserSuccessfullyDeleted'));
    }


}
