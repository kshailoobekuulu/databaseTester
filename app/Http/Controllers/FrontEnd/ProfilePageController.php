<?php
namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;

class ProfilePageController extends Controller {

    public function show() {
        $this->authorize('update', auth()->user());
        $user = auth()->user();
        return view('frontend.profilePage.show', ['user' => $user]);
    }

}
