@extends('layouts.master')
@section('title', 'Sign in')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            @include(‘errors’)
            <div class="form-container">
                <form method="post" action="/auth/login">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="checkbox">
                        <label>
                          <input type="checkbox" name="remember"> Remember me
                        </label>
                    </div>
                  <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
                <br />
                <div class="form-container">
                    <p>or sign in with</p>
                    <p>
                        <a href=""><span class="github"><i class="fa fa-github-square"></i></span></a>
                        <a href=""><span class="twitter"><i class="fa fa-twitter-square"></i></span></a>
                        <a href=""><span class="facebook"><i class="fa fa-facebook-square"></i></span></a>
                    </p>
                </div>
                <br /> <br />
                <P>Don't yet have an account?</P>
                <button type="" class="btn btn-success">Register</button>
            </div>
        </div>
    </div>
</div>
@endsection