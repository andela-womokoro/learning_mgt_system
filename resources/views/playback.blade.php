@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid" style="background-color: #fff; font-family: arial;">
        <div class="row">
            <div class="col-sm-12">
                <h4>Playback - {{ $video->title }}</h4>
                 <?php
                $youtubeURL = $video->url;
                $extracted = strrchr($youtubeURL, '=');
                $youtubeVideoID = str_replace('=', '', $extracted);
                ?>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/{{ $youtubeVideoID }}"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection