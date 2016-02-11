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
    /**
     * Redirect users to the landing page and loads all videos on the landing page
     */
    public function home()
    {
        $videos = Video::orderBy('created_at', 'desc')->paginate(12);

        return view('landing', ['videos' => $videos]);
    }

    /**
     * Redirect authenticated users to their dashboard and loads the user's videos on the dashboard
     */
    public function dashboard()
    {
        return view('dashboard', ['videos' => $this->getLoggedInUserVideos()]);
    }

    /**
     * Get the curent logged in user's videos
     */
    public static function getLoggedInUserVideos()
    {
        $videos = Video::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(12);

        return $videos;
    }
}
