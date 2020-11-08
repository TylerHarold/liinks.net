<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Models\User;

class UserController extends Controller
{
    public function setAvatar(Request $request) {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                "avatar" => "required"
            ]);

            if ($validator->fails()) {
                $this->viewParams['error'] = "One or more fields were missing information.";
                return Redirect::to('/settings')->with($this->viewParams);
            }

            $avatar_path = null;
            if ($request->hasFile("avatar"))
                $avatar_path = $request->file("avatar")->store("public/avatars");

            User::where('id', Auth::user()->id)->update(array('avatar_path' => Storage::disk('local')->url($avatar_path)));

            $this->viewParams['info'] = "Avatar has been updated successfully.";
            return Redirect::to('/settings')->with($this->viewParams);
        }

        $this->viewParams['error'] = "You need to be logged in to view this page.";
        return Redirect::to('/login')->with($this->viewParams);
    }
}
