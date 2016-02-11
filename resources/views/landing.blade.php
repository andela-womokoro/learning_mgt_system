@extends('shared.master')
@section('title', 'Home')

@section('content')
<?php
    $pageIsDashboard = false;
?>

<!-- Carousel -->
<div id="my-carousel" class="carousel slide" data-ride="carousel" style="margin-top: -20px">
    <ol class="carousel-indicators">
        <li data-target="#my-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#my-carousel" data-slide-to="1"></li>
        <li data-target="#my-carousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img src="/images/pic1.jpg" class="img-responsive" width="100%" alt="...">
            <div class="carousel-caption">
                <h3>Bright minds. Bright ideas. Great educational video resources at your disposal.</h3>
            </div>
        </div>
        <div class="item">
            <img src="/images/pic2.jpg" class="img-responsive" width="100%" alt="...">
            <div class="carousel-caption">
                <h3>Learning is no longer restricted to classrooms and campuses.</h3>
            </div>
        </div>
        <div class="item">
            <img src="/images/pic3.jpg" class="img-responsive" width="100%" alt="...">
            <div class="carousel-caption">
                <h3>Deviate from tradition. Learn in a fun and intuitive way.</h3>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#my-carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#my-carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>

<!-- Videos grid -->
<div class="container-fluid content">
    <div class="row videos-grid">
        <div class="col-sm-12">
            @if (isset($error))
                <div class="alert alert-info" role="alert">
                    {{ $error }}
                </div>
            @else
                @include('shared.videos_grid')
            @endif
        </div>
    </div>
</div>

@endsection