<?php

namespace App\Http\Controllers;

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
        // dd($request);

        $this->validate($request, [
           'title' => 'required|unique:users',
            'category' => 'required',
            'url' => 'required',
            'description' => 'required',
        ]);

        //return view('dashboard');
    }

    public function profile()
    {
        return view('profile');
    }
}
