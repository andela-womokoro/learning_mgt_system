@extends('shared.master')
@section('title', 'Home')

@section('content')
    <div class="container-fluid content">
        <div class="row">
            <div class="col-sm-12">
                <h3>An error occured!</h3>
                @if (isset($error))
                    <div class="alert alert-info" role="alert">
                        <p>{{ $error }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection