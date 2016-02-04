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

    public function playback($id)
    {
        // dd($id);
        $video = Video::find($id);

        return view('playback', ['video' => $video]);
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
        $videos = Video::orderBy('created_at', 'desc')->paginate(12);

        return view('dashboard', ['videos' => $videos]);
    }

    public function addVideo(Request $request)
    {
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
