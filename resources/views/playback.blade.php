@extends('shared.master')
@section('title', 'Playback')

@section('content')
    <div class="container-fluid content">
        <div class="row">
             <div class="col-sm-12">
                <br />
                <ol class="breadcrumb">
                    @if (Auth::check())
                        <li><a href="/dashboard">My Videos</a></li>
                    @else
                        <li><a href="/">Home</a></li>
                    @endif
                    <li><a href="">Playback</a></li>
                    <li class="active">{{ $video->title }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <h3>{{ $video->title }}</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/{{ VideoIDExtractor::getVideoID($video->url) }}" allowfullscreen></iframe>
                </div>
                <br />
                <p style="font-size:11px; color:#aaa;">Uploaded on: {{ date('F d, Y', strtotime($video->created_at)) }}</p>
                <p>{{ $video->description }}</p>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
@endsection