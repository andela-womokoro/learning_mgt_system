@extends('layouts.master')
@section('title', 'Register')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            @include(‘errors.errors’)
            <div class="form-container">
                <form method="post" action="/auth/register">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password1" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password2" class="form-control" name="password_confirmation" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">First name</label>
                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="First name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Last name</label>
                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Last name">
                    </div>
                    <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the terms and conditions
                        </label>
                    </div>
                  <button type="submit" class="btn btn-success">Create account</button>
                </form>
                <br />
                <br /> <br />
                <P>Already have an account?</P>
                <button type="" class="btn btn-primary">Sign in</button>
            </div>
        </div>
    </div>
</div>
@endsection