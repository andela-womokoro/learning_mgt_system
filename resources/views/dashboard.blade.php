@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid" style="background-color: #fff; font-family: arial;">
        <div class="row">
            <div class="col-sm-12">
                <h3 style="color: #555;">Dashboard</h3>
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a data-toggle="tab" href="#my-videos">My Videos</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#upload-video">Upload Video</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="tab-content" style="border: 0px solid #ccc; padding: 10px;">

                    <!-- display user's videos -->
                    <div id="my-videos" class="tab-pane fade in active">
                        <h4>My Videos</h4>
                        <div class="row videos-grid">
                           @foreach ($videos as $video)
                            <div class="col-sm-4">
                                <div style="border: 1px solid #ccc; margin: 10px; padding:5px; border-radius: 5px; height: 100%; overflow: hidden;">
                                    <?php
                                    $youtubeURL = $video->url;
                                    $extracted = strrchr($youtubeURL, '=');
                                    $youtubeVideoID = str_replace('=', '', $extracted);
                                    ?>
                                    <a href="/playback/{{ $video->id }}" class="thumbnail">
                                        <img src="http://i1.ytimg.com/vi/{{ $youtubeVideoID }}/hqdefault.jpg">
                                    </a>
                                    <h3>{{ $video->title }}</h3>
                                    <h4>{{ $video->category }}</h4>
                                    <p>{{ $video->description }}</p>
                                    <div style="float: right; font-size: 20px;">
                                        <a href="#" data-toggle="tooltip" title="Edit this video"><i class="fa fa-pencil-square-o"></i></a>
                                        &nbsp;&nbsp;
                                        <a href="#" data-toggle="tooltip" title="Delete this video"><i class="fa fa-times"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- video upload form -->
                    <div id="upload-video" class="tab-pane fade">
                        <h4>Upload a Video</h4>
                        <div class="form-container">
                            <form method="post" action="/dashboard/videos/add">
                               {{ csrf_field() }}
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{  $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(session('message'))
                                    <div class="alert alert-info" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label>Video Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" maxlength="45" minlength="3" required>
                                    @if ($errors->has('title'))
                                        <span class="help-block">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category" class="form-control" required>
                                        <option>{{ old('category') }}</option>
                                        <option>Programming</option>
                                        <option>Science</option>
                                        <option>Technology</option>
                                        <option>Languages</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>URL</label>
                                    <input type="url" class="form-control" name="url" value="{{ old('url') }}" placeholder="E.g. https://www.youtube.com/watch?v=tKmkB7OVO_M" maxlength="255" required>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" maxlength="255" minlength="10" rows="3" required>{{ old('description') }}</textarea>
                                </div>

                              <button type="submit" class="btn btn-success">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        {!! $videos->render() !!}
    </div>
@endsection
