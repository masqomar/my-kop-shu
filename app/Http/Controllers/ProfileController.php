<?php

namespace App\Http\Controllers;

use App\Helpers\MobileFormatter;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;
use Image;

class ProfileController extends Controller
{
    protected $avatarPath = '/uploads/images/avatars/';

    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }

        if ($request->file('avatar') && $request->file('avatar')->isValid()) {

            $filename = $request->file('avatar')->hashName();

            // if folder dont exist, then create folder
            if (!file_exists($folder = public_path($this->avatarPath))) {
                mkdir($folder, 0777, true);
            }

            // Intervention Image
            Image::make($request->file('avatar')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save(public_path($this->avatarPath) . $filename);

            // delete old avatar from storage
            if (auth()->user()->avatar != null && file_exists($oldAvatar = public_path($this->avatarPath .
                auth()->user()->avatar))) {
                unlink($oldAvatar);
            }

            auth()->user()->update(['avatar' => $filename]);
        }

        if ($request->noHp) {
            auth()->user()->update(['mobile' => $request->noHp]);
        } 
        if ($request->others) {
            auth()->user()->update(['others' => $request->others]);
        } 
        if ($request->extra_field) {
            auth()->user()->update(['extra_field' => $request->extra_field]);
        } 
        auth()->user()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Profile updated.');
    }
}
