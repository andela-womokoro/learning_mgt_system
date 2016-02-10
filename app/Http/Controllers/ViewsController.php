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

    public function dashboard()
    {
        $videos = Video::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(12);

        return view('dashboard', ['videos' => $videos]);
    }
}
