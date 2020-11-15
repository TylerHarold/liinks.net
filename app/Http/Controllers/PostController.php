<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function create(Request $request) {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                "body" => "required"
            ]);

            if ($validator->fails()) {
                $this->viewParams['error'] = "One or more fields were missing information.";
                return Redirect::to('/profile')->with($this->viewParams);
            }

            $post = [
                "author_id" => Auth::user()->id,
                "body" => $request->input("body")
            ];

            Post::create($post);

            $this->viewParams['info'] = "Post created successfully.";
            return Redirect::to('/profile')->with($this->viewParams);
        }

        $this->viewParams['error'] = "Please login to view this page.";
        return Redirect::to('/login')->with($this->viewParams);
    }
}
