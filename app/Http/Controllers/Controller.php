<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use App\Models\User;

class Controller extends BaseController
{
    public $viewParams;

    public function index() {
        return view('index');
    }

    public function register() {
        return view('register');
    }

    public function login() {
        return view('login');
    }

    public function about() {
        return view('about');
    }

    public function profile() {
        if (Auth::check()) {
            $user = auth()->user();
            $this->viewParams['user'] = $user;
            $this->viewParams['links'] = json_decode($user->links);

            return view("user-layouts.{$user->layout}")->with($this->viewParams);
        } else {
            $this->viewParams['error'] = "You need to be signed in to view this page";
            return Redirect::to('/login')->with($this->viewParams);
        }
    }

    public function otherProfile($username) {
        $user = User::where('username', $username)->first();
        $this->viewParams['user'] = $user;
        $this->viewParams['links'] = json_decode($user->links);

        if (User::where('username', $username)->exists())
            return view("user-layouts.{$user->layout}")->with($this->viewParams);
        else
            return Redirect::to('/u');
    }

    public function connect() {
        $this->viewParams['users'] = User::all();
        return view('connect')->with($this->viewParams);
    }

    public function settings() {
        if (!Auth::check()) {
            $this->viewParams['error'] = "You need to be signed in to view this page";
            return Redirect::to('/login')->with($this->viewParams);
        }
        $this->viewParams['user'] = auth()->user();
        return view('settings')->with($this->viewParams);
    }
}
