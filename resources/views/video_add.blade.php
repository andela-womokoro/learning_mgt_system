@extends('shared.master')
@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid content" style="font-family: arial;">
        <div class="row">
            <div class="col-sm-12">
                <br />
                <ol class="breadcrumb">
                    <li><a href="/dashboard">My Videos</a></li>
                    <li><a href="">Upload Video</a></li>
                </ol>
                <h3>Upload Video</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-container">
                    <form method="post" action="/videos/add/new">
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
                        @if (isset($message))
                            <div class="alert alert-info" role="alert">{{ $message }}</div>
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
                                <option>Arts And Humanities</option>
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
@endsection