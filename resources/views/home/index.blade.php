@extends('layouts.app')

@section('title')
Home | Application
@endsection

@section('content')


<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="item active">
        <img src="{{url('/assets/images/index1.jpg')}}" alt="Second slide" width= "100%" >
        <div class="container">
          <div class="carousel-caption" style="display:none">
            <h1>Example headline.</h1>
            <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
          </div>
        </div>
      </div>
      <div class="item">
        <img src="{{url('/assets/images/index2.png')}}" alt="Second slide" width= "100%" >
        <div class="container">
          <div class="carousel-caption"  style="display:none">
            <h1>Another example headline.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          </div>
        </div>
      </div>
      <div class="item">
        <img src="{{url('/assets/images/index3.jpg')}}" alt="Third slide" width= "100%" >
        <div class="container">
          <div class="carousel-caption"  style="display:none">
            <h1>One more for good measure.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          </div>
        </div>
      </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
  </div>

<div class="container main-container">
  <h2 class="page-header text-primary">Welcome</small></h2>
  <div class="container marketing">

    <div class="row featurette">
      <div class="">
        <h2 class="featurette-heading">If you want to build friendship with sports.. <span class="text-muted">Come here and find your opportunity.</span></h2>
        <p class="lead">You can sign up as coach or athlete. And search the members and interchange with them.</p>
      </div>
      <div class="">
        <img class="featurette-image img-responsive" src="{{url('/assets/images/index4.jpg')}}" alt="Generic placeholder image">
      </div>
      <div>
       <h2 class="featurette-heading">For more friends! For more sports! <span class="text-muted">Find your team here.</span></h2>
        <p class="lead"> You can find people as you want!</p>
      </div>
      
    </div>

  
</div>


@endsection