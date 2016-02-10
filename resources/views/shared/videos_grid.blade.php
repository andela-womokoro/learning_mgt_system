<!-- display videos -->
    @if (Auth::check() && $pageIsDashboard)
        <h4>My Videos</h4>
        @if (isset($message))
            <div class="alert alert-info" role="alert">
                {{ $message }}
            </div>
        @endif
    @endif
    <div class="row videos-grid">
        @if ($videos->count() == 0)
            <div class="alert alert-info" role="alert">
                @if (Auth::check() && $pageIsDashboard)
                    {{ 'You currently have no videos. Click the "Upload Video" tab to upload a video from Youtube.' }}
                @else
                    {{ 'There are currently no videos in the selected category.' }}
                @endif
            </div>
        @else
            @if (! Auth::check())
                <h2 style="text-align: center; color: #fc6f43; font-family: Helvetica,sans-serif;">Join a growing global community of online publishers and learners</h2>
            @endif
        @endif

       @foreach ($videos as $video)
            <div class="col-sm-4">
                <div class="video-thumbnail">
                    <a href="/playback/{{ $video->id }}" class="thumbnail" style="border: 0px;">
                    <img src="http://i1.ytimg.com/vi/{{ VideoIDExtractor::getVideoID($video->url) }}/hqdefault.jpg">
                    </a>
                    <h3>{{ str_limit($video->title, $limit = 40, $end = '...') }}</h3>
                    <h4 style="color: #aaa;">{{ $video->category }}</h4>
                    <p style="font-size:11px; color:#aaa;">Uploaded on: {{ date('F d, Y', strtotime($video->created_at)) }}</p>
                    <p>{{ str_limit($video->description, $limit = 200, $end = '...') }}</p>
                    <hr style="visibility: hidden;" />
                    @if (Auth::check() && $pageIsDashboard)
                        <div class="video-options">
                            <a id="edit_icon" href="/video/edit/{{ $video->id }}" data-toggle="tooltip" title="Edit this video"><i class="fa fa-pencil-square-o"></i></a>
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