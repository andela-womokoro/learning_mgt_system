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
                    <div id="my-videos" class="tab-pane fade in active">
                        <!-- display user's videos -->
                        <h4>My Videos</h4>
                        <div class="row videos-grid">
                            <?php
                            for($i = 0; $i < 4; $i++) {
                            ?>
                            <div class="col-sm-4">
                                <a href="/playback" class="thumbnail">
                                  <img src="http://i1.ytimg.com/vi/IsZxiIAYc9E/hqdefault.jpg" alt="...">
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div id="upload-video" class="tab-pane fade">
                         <!-- video upload form -->
                        <h4>Upload a Video</h4>
                        <div class="form-container">
                            <form method="post" action="/auth/register">
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
                                <div class="form-group">
                                    <label>Video Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" maxlength="45">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category" class="form-control">
                                        <option>{{ old('category') }}</option>
                                        <option>Programming</option>
                                        <option>Science</option>
                                        <option>Technology</option>
                                        <option>Languages</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>URL</label>
                                    <input type="text" class="form-control" name="url" value="{{ old('url') }}" placeholder="E.g. https://www.youtube.com/watch?v=tKmkB7OVO_M" maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" value="{{ old('description') }}" maxlength="60" rows="3"></textarea>
                                </div>

                              <button type="submit" class="btn btn-success">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
