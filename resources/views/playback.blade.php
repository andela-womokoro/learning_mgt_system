@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid" style="background-color: #fff; font-family: arial;">
        <div class="row">
            <div class="col-sm-6">
                <br />
                <ol class="breadcrumb">
                    <li><a href="/dashboard">My Videos</a></li>
                    <li><a href="">Playback</a></li>
                    <li class="active">{{ $video->title }}</li>
                </ol>
                <h3>{{ $video->title }}</h3>
                <?php
                $youtubeURL = $video->url;
                $extracted = strrchr($youtubeURL, '=');
                $youtubeVideoID = str_replace('=', '', $extracted);
                ?>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/{{ $youtubeVideoID }}" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection