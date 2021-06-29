<?php
namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilePageController extends Controller {
    protected $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function show() {
        $user = auth()->user();
        $this->authorize('update', $user);
        $user->loadCount(['solvedTasks' => function ($query) {
            $query->whereNotNull('correct_solution');
        }]);
        return view('frontend.profilePage.show', ['user' => $user]);
    }

    public function edit() {
        $user = auth()->user();
        $this->authorize('update', $user);
        return view('frontend.profilePage.edit', ['user' => $user]);
    }

    public function update(Request $request) {
        /**
         * @var $user User
         */
        $user = auth()->user();
        $this->authorize('update', $user);
        $this->userService->validateUser($request);
        $this->userService->updateUserInformation($request, $user);
        return redirect()->route('frontend.profile-page');
    }

    public function uploadPhoto(Request $request) {
        $user = auth()->user();
        $this->authorize('update', $user);
        try {
            $request->validate([
                'profile_photo' => 'image'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'the image is too big');
        }
        if (!$request->hasFile('profile_photo')) {
            return redirect()->back();
        }
        if ($user->getPhoto() && file_exists($user->getPhoto())) {
            unlink($user->getPhoto());
        }
        $name = time() . '.' . $request->file('profile_photo')->getClientOriginalExtension();
        $path = public_path(User::IMAGES_PATH);
        $image = Image::make($request->profile_photo);
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $image->save($path . $name);
        $user->setPhoto(User::IMAGES_PATH . $name);
        $user->save();
        return redirect()->back();
    }

}
