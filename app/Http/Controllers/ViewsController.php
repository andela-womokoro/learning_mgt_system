<?php

namespace App\Http\Controllers;

use Auth;
use App\Video;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewsController extends Controller
{
    public function test()
    {
        echo 'Testing...';
    }

    public function home()
    {
        return view('landing');
    }

    public function playback()
    {
        return view('playback');
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function addVideo(Request $request)
    {
       $youtubeURL = $request->input('url');
       $extracted = strrchr($youtubeURL, '=');
       $youtubeVideoID = str_replace('=', '', $extracted);

        $this->validate($request, [
           'title' => 'required|unique:videos',
            'category' => 'required',
            'url' => 'required',
            'description' => 'required',
        ]);

        $userID = Auth::user()->id;

        Video::create([
            'user_id' => $userID,
            'title' => $request->input('title'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'url' => $request->input('url')
        ]);

        return redirect()->route('dashboard')->with('message', 'Successfully added the video.');
    }

    public function profile()
    {
        return view('profile');
    }
}
