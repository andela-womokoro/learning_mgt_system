@extends('shared.master')
@section('title', 'Edit Video')

@section('content')
    <div class="container-fluid content" style="font-family: arial;">
        <div class="row">
            <div class="col-sm-12">
                <br />
                <ol class="breadcrumb">
                    <li><a href="/dashboard">My Videos</a></li>
                    <li><a href="">Edit Video</a></li>
                    <li class="active">{{ $video->title }}</li>
                </ol>
                <h3>Edit Video</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <img class="img-responsive" src="http://i1.ytimg.com/vi/{{ VideoIDExtractor::getVideoID($video->url) }}/hqdefault.jpg">
                <br />
            </div>
            <div class="col-sm-8">
                <div class="form-container">
                    <form method="post" action="/video/edit/{{ $video->id }}">
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
                        @if(isset($message))
                            <div class="alert alert-info" role="alert">
                                {{ $message }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Video Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $video->title }}" maxlength="45" minlength="3" required>
                            @if ($errors->has('title'))
                                <span class="help-block">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control" required>
                                <option>{{ $video->category }}</option>
                                <option>Programming</option>
                                <option>Science</option>
                                <option>Technology</option>
                                <option>Languages</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Youtube URL</label>
                            <input type="url" class="form-control" name="url" value="{{ $video->url }}" placeholder="E.g. https://www.youtube.com/watch?v=tKmkB7OVO_M" maxlength="255" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" maxlength="255" minlength="10" rows="3" required>{{ $video->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection