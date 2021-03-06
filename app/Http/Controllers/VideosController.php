<?php

namespace App\Http\Controllers;

use Auth;
use Input;
use Cloudder;
use App\User;
use App\Video;
use VideoCategories;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ViewsController;

class VideosController extends Controller
{
    /**
     * Fetch videos of a particular category from the database based on user's category selection. If an invalid
     *  category is specified in the route an erro message is returned
     * @param  $category
     */
    public function videoCategories($category)
    {
        $category = ucwords(strtolower(str_replace('_', ' ', $category)));
        $videoCategories = VideoCategories::getCategories();

        $videos = Video::where('category', '=', $category)->paginate(12);

        if (in_array($category, $videoCategories)) {
            return view('landing', ['videos' => $videos]);
        } else {
            return view('errors.error_page', ['error' => '"'.$category.'" is not a valid video category. Please select a valid category from the "Explore" menu above.']);
        }
    }

    /**
     * Redirects users to the video playback page and returns the selected video to the page
     * @param  $id  the video ID
     */
    public function playback($id)
    {
        $video = Video::find($id);

        if (is_null($video)) {
            return view('errors.error_page', ['error' => 'The video you tried to play was not found.']);
        } else {
            return view('playback', ['video' => $video]);
        }
    }

    /**
     * Redirects users to the video upload page
     */
    public function getAddVideo()
    {
        return view('video_add');
    }

    /**
     * Post videos uploaded by users to the database
     * @param  Request $request
     */
    public function postAddVideo(Request $request)
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

        $videos = ViewsController::getLoggedInUserVideos();

        return view('dashboard', ['videos' => $videos, 'message' => 'The video has been successfully uploaded.']);
    }

    /**
     * Redirect users to the video details editing page
     * @param  $id  the id oof the video
     */
    public function getEditVideo($id)
    {
        $video = Video::find($id);

        return view('video_edit', ['video' => $video]);
    }

    /**
     * Save the edited video details overwriting previous data.
     */
    public function postEditVideo(Request $request, $id)
    {
        $video = Video::find($id);
        $video->title = $request->input('title');
        $video->category = $request->input('category');
        $video->url = $request->input('url');
        $video->description = $request->input('description');
        $video->save();

        $videos = ViewsController::getLoggedInUserVideos();

        return view('dashboard', ['videos' => $videos, 'message' => 'Your changes have been saved.']);
    }

    /**
     * Delete a user's uploaded video resource from the database
     */
    public function deleteVideo(Request $request)
    {
        $video = Video::find($request->input('id'));
        $videoTitle = $video->title;
        $video->delete();

        $videos = ViewsController::getLoggedInUserVideos();

        return view('dashboard', ['videos' => $videos, 'message' => 'The video "'.$videoTitle.'" was deleted.']);
    }
}
