<?php
    $currentRoute = Route::getCurrentRoute()->getPath();
?>

<!-- display videos -->
<div id="my-videos" class="tab-pane fade in active">
    @if (Auth::check() && $currentRoute == 'dashboard')
        @if (isset($message))
            <div class="alert alert-info" role="alert">
                {{ $message }}
            </div>
        @endif
        <h4>My Videos</h4>
    @endif
    <div class="row videos-grid">
       @foreach ($videos as $video)
            <div class="col-sm-4">
                <div style="border: 1px solid #ccc; position:relative; margin: 10px; padding:5px; border-radius: 5px; height: 500px; overflow: hidden;">
                    <a href="/playback/{{ $video->id }}" class="thumbnail">
                        <img src="http://i1.ytimg.com/vi/{{ VideoIDExtractor::getVideoID($video->url) }}/hqdefault.jpg">
                    </a>
                    <h3>{{ str_limit($video->title, $limit = 40, $end = '...') }}</h3>
                    <h4>{{ $video->category }}</h4>
                    <p>{{ str_limit($video->description, $limit = 200, $end = '...') }}</p>
                    @if (Auth::check() && $currentRoute == 'dashboard')
                        <div style="border: 0px solid gray; width:100%; position: absolute; bottom:0px; right:0px; float: right; font-size: 20px; text-align: right; margin: 3px;">
                            <a href="/video/edit/{{ $video->id }}" data-toggle="tooltip" title="Edit this video"><i class="fa fa-pencil-square-o"></i></a>
                            &nbsp;&nbsp;
                            <a href="#{{ $video->id }}" data-toggle="tooltip" title="Delete this video"><i class="fa fa-times"></i></a>
                        </div>

                         <!-- Deletion modal -->
                        <div id="{{ $video->id }}" class="modalDialog">
                            <div>
                                <a href="#close" title="Close" class="close">X</a>
                                <h3>Warning!</h3>
                                <p>You are about to delete the video <b>"{{ $video->title }}"</b>. Are you sure you really want to delete the video?</p>
                                <br />
                                <form method="post" action="/video/delete/{{ $video->id }}">
                                    <input type="hidden" name="id" value="{{ $video->id }}" />
                                    {{ csrf_field() }}
                                    <button type="button" class="btn btn-success" onclick="location.href='#close';">No</button>
                                    &nbsp;&nbsp;
                                    <button type="submit" class="btn btn-danger">Yes, delete</button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>