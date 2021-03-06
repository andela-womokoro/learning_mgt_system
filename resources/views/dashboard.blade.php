@extends('shared.master')
@section('title', 'Dashboard')

@section('content')
<?php
    $pageIsDashboard = true;
?>
    <div class="container-fluid content">
        <div class="row">
            <div class="col-sm-12">
                <h3 style="color: #555;">Dashboard - <span style="color: #999;">My Videos</span></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="tab-content" style="border: 0px solid #ccc; padding: 10px;">
                     @include('shared.videos_grid')
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        {!! $videos->render() !!}
    </div>
@endsection
