@extends('shared.master')
@section('title', 'Sign in')

@section('content')
<div class="container-fluid content">
    <div class="row">
        <div class="col-sm-12">
            <div class="form-container">
                <form method="post" action="/auth/login">
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
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" maxlength="255" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" maxlength="10" required>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember me
                        </label>
                    </div>
                  <button type="submit" class="btn btn-primary">Sign me in</button>
                </form>
                <br />
                <div>
                    <p>or sign in with</p>
                    <p>@include('shared.social_auth_links')</p>
                </div>
                <br /> <br />
                <P>Don't yet have an account?</P>
                <form method="get" action="/auth/register">
                    <button type="" class="btn btn-success">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection