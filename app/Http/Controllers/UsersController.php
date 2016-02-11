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

class UsersController extends Controller
{
    /**
     * Return user's profile info to the dashboard view
     */
    public function profile()
    {
        $user = User::find(Auth::user()->id);

        return view('profile', ['user' => $user]);
    }

    /**
     * Update a user's profile
     * @param  Request $request
     */
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

    /**
     * Update a user's avatar
     */
    public function updateAvatar()
    {
        $image = Input::file('avatar_file');

        Auth::user()->avatar_url = $this->getImageUrl($image);
        Auth::user()->save();

        $user = User::find(Auth::user()->id);

        return view('profile', ['user' => $user, 'message' => 'You have successfully updated your avatar.']);
    }

    /**
     * Store user's avatar in cloudinary and return the cloudinary image URL
     * @param  $image the avatar
     * @return URL
     */
    private function getImageUrl($image)
    {
        Cloudder::upload($image);

        return Cloudder::getResult()['url'];
    }
}
