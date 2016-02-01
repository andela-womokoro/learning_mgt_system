@extends('layouts.master')
@section('title', 'Home')

@section('content')

<!-- Carousel -->
<div id="my-carousel" class="carousel slide" data-ride="carousel" style="margin-top: -20px">
    <ol class="carousel-indicators">
        <li data-target="#my-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#my-carousel" data-slide-to="1"></li>
        <li data-target="#my-carousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img src="http://placehold.it/1200x315" class="img-responsive" width="100%" alt="...">
            <div class="carousel-caption">
                <h3>Caption Text 1</h3>
            </div>
        </div>
        <div class="item">
            <img src="http://placehold.it/1200x315" class="img-responsive" width="100%" alt="...">
            <div class="carousel-caption">
                <h3>Caption Text 2</h3>
            </div>
        </div>
        <div class="item">
            <img src="http://placehold.it/1200x315" class="img-responsive" width="100%" alt="...">
            <div class="carousel-caption">
                <h3>Caption Text 3</h3>
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
<div class="container-fluid">
    <div class="row videos-grid">
        <?php
        for($i = 0; $i < 6; $i++) {
        ?>
        <div class="col-sm-4">
            <a href="#" class="thumbnail">
              <img src="/images/video.png" alt="...">
            </a>
        </div>
        <?php } ?>
    </div>
</div>

@endsection