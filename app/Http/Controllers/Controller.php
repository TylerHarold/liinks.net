<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

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
}
