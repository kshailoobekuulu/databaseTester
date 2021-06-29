<?php


namespace App\Services;
use App\Models\User;
use Illuminate\Http\Request;



class UserService
{
    public function validateUser(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'surname' => 'nullable|string|max:255',
            'year' => 'integer|max:4|min:1',
            'email' => 'required|email|max:255',
            'phone_number' => 'nullable|regex:/^\+?996[0-9]{9}$/',
            'additional_phone_number' => 'nullable|regex:/^\+?996[0-9]{9}$/',
            'address' => 'nullable|string|max:255',
        ], [], [
            'name' => __('messages.Name'),
            'surname' => __('messages.Surname'),
            'year' => __('messages.YearInUniversity'),
            'email' => __('messages.E-MailAddress'),
            'phone_number' => __('messages.PhoneNumber'),
            'additional_phone_number' => __('messages.PhoneNumberTwo'),
            'address' => __('messages.Address'),
        ]);
    }

    public function updateUserInformation(Request $request, User $user) {
        $user->setName($request->name);
        $user->setSurname($request->surname);
        $user->setUniversityYear($request->year);
        $user->setEmail($request->email);
        $user->setMainPhoneNumber($request->phone_number);
        $user->setAdditionalPhoneNumber($request->additional_phone_number);
        $user->setAddress($request->address);
        $user->setRole($request->role);
        $user->save();
    }
}
