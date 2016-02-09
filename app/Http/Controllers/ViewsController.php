<?php

namespace App\Http\Controllers;

use Auth;
use Input;
use Cloudder;
use App\User;
use App\Video;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewsController extends Controller
{
    public function home()
    {
        $videos = Video::orderBy('created_at', 'desc')->paginate(12);

        return view('landing', ['videos' => $videos]);
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
        $videos = Video::where('user_id', Auth::user()->id)->paginate(12);

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

        $videos = Video::where('user_id', Auth::user()->id)->paginate(12);

        return view('dashboard', ['videos' => $videos, 'upload_message' => 'The video was successfully added.', 'action' => 'video upload']);
    }

    public function getEditVideo($id)
    {
        $video = Video::find($id);

        return view('video_edit', ['video' => $video]);
    }

    public function postEditVideo(Request $request, $id)
    {
        $video = Video::find($id);
        $video->title = $request->input('title');
        $video->category = $request->input('category');
        $video->url = $request->input('url');
        $video->description = $request->input('description');
        $video->save();

        return view('video_edit', ['video' => $video, 'message' => 'You changes have been saved.']);
    }

    public function deleteVideo(Request $request)
    {
        $video = Video::find($request->input('id'));
        $videoTitle = $video->title;
        $video->delete();

        $videos = Video::orderBy('created_at', 'desc')->paginate(12);

        return view('dashboard', ['videos' => $videos, 'message' => 'The video "'.$videoTitle.'" was deleted.']);
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);

        return view('profile', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->save();

        return view('profile', ['user' => $user, 'message' => 'You have successfully updated your profile.']);
    }

    public function updateAvatar()
    {
        $image = Input::file('avatar_file');

        Auth::user()->avatar_url = $this->getImageUrl($image);
        Auth::user()->save();

        $user = User::find(Auth::user()->id);

        return view('profile', ['user' => $user, 'message' => 'You have successfully updated your avatar.']);
    }

    private function getImageUrl($image)
    {
        Cloudder::upload($image);

        return Cloudder::getResult()['url'];
    }
}
