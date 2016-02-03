@extends('layouts.master')
@section('title', 'Register')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">

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
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="{{ old('username') }}" maxlength="10" required>
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" maxlength="255" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" maxlength="10" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" maxlength="10" required>
                    </div>
                    <div class="form-group">
                        <label>First name</label>
                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}"  maxlength="45" required>
                    </div>
                    <div class="form-group">
                        <label>Last name</label>
                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}"  maxlength="45" required>
                    </div>
                    <div class="checkbox">
                        <label>
                          <input type="checkbox" name="agree" required> I agree to the terms and conditions
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success">Create account</button>
                </form>
                <br />
                <br /> <br />
                <P>Already have an account?</P>
                <form method="get" action="/auth/login">
                    <button type="" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection