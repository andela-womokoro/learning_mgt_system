@extends('shared.master')
@section('title', 'Profile')

@section('content')
    <div class="container-fluid content">
        <div class="row">
            <div class="col-sm-12">
                <h3>My Profile</h3>
                @if(isset($message))
                    <div class="alert alert-info" role="alert">
                        {{ $message }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                @if ($user->avatar_url)
                    <img class="img-responsive" src="{{ $user->avatar_url }}" width="200" height="200" />
                @else
                    <img class="img-responsive" src="/images/avatar.png" width="200" height="200" />
                @endif
                <br />
                <form method="post" action="/profile/update/avatar" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="avatar_file" />
                    <br />
                    <button type="submit" class="btn btn-success">Update Avatar</button>
                </form>
                <br />
            </div>
            <div class="col-sm-9">
                <div class="form-container">
                    <form method="post" action="/profile/update">
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
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" value="{{ $user->username }}" maxlength="45" minlength="3" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}"  maxlength="255" required>
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}"  maxlength="45" required>
                        </div>
                         <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}"  maxlength="45" required>
                        </div>
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection