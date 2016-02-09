@extends('shared.master')
@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid content" style="background-color: #fff; font-family: arial;">
        <div class="row">
            <div class="col-sm-12">
                <h3 style="color: #555;">Dashboard</h3>
                <ul class="nav nav-tabs">
                    @if (isset($upload_message))
                        <li role="presentation"><a data-toggle="tab" href="#my-videos">My Videos</a></li>
                        <li role="presentation" class="active"><a data-toggle="tab" href="#upload-video">Upload Video</a></li>
                    @else
                        <li role="presentation" class="active"><a data-toggle="tab" href="#my-videos">My Videos</a></li>
                        <li role="presentation"><a data-toggle="tab" href="#upload-video">Upload Video</a></li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="tab-content" style="border: 0px solid #ccc; padding: 10px;">
                     @include('shared.videos_grid')
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
                                @if (isset($upload_message))
                                    <div class="alert alert-info" role="alert">{{ $upload_message }}</div>
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
                                        <option>Computing</option>
                                        <option>Science</option>
                                        <option>Technology</option>
                                        <option>Engineering</option>
                                        <option>Arts and Humanities</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Youtube URL</label>
                                    <input type="url" class="form-control" name="url" value="{{ old('url') }}" required />
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



    <!-- new layout -->
    <!-- <div class="container" style="border: 1px solid #ccc; height: 100%; overflow: hidden;">
        <div style="border: 1px solid red; width: 210px; float:left;">
            <img src="" width="210" height="210" />
        </div>
        <div style="border: 1px solid blue;">
            content
        </div>
    </div> -->
@endsection
