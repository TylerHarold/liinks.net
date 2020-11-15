<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

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

    public function setBio(Request $request) {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                "bio" => "required"
            ]);

            if ($validator->fails()) {
                $this->viewParams['error'] = "One or more fields were missing information.";
                return Redirect::to('/settings')->with($this->viewParams);
            }

            User::where('id', Auth::user()->id)->update(array('bio' => $request->input('bio')));

            $this->viewParams['info'] = "Bio set successfully.";
            $this->viewParams['user'] = auth()->user();

            return view('/settings')->with($this->viewParams);
        }
    }

    public function setLinks(Request $request) {
        if (Auth::check()) {
            $links = [];


//            Edit this to make a link, instead of checking for a link

            // Discord - check to see if not a link
            if ($request->input('discord') != null) {
                if (!strpos($request->input('discord'), "http") && !strpos($request->input('discord'), "https"))
                    $links += ["discord" => $request->input('discord')];
            }

            // Youtube - check to see if link
            if ($request->input('youtube') != null) {
                if (strpos($request->input('discord'), "http") && strpos($request->input('discord'), "https"))
                    $links += ["youtube" => $request->input('youtube')];
            }

            if ($request->input('steam') != null) {
                if (strpos($request->input('discord'), "http") && strpos($request->input('discord'), "https"))
                    $links += ["steam" => $request->input('steam')];

            }
            if ($request->input('twitter') != null) {
                if (strpos($request->input('discord'), "http") && strpos($request->input('discord'), "https"))
                    $links += ["twitter" => $request->input('twitter')];
            }

            User::where('id', Auth::user()->id)->update($links);

            $this->viewParams['info'] = "Links updated successfully.";
            $this->viewParams['user'] = auth()->user();

            return view('/settings')->with($this->viewParams);
        }
    }

}
