@extends('layouts.master')

@section('title')
Dashboard | Application
@endsection

@section('content')

<div class="container">
  <h2 class="page-header text-primary">{{$user->name}}</small></h2>
  <div class="container marketing">

    @if(count($images) == 0)
    <div class="jumbotron">
      <p class="text-danger">No image you have uploaded up to now. If you want to upload image, you can do it right now! </p>
    </div>
    @else
    @foreach($images as $image)
    <div class="jumbotron">
      <div class="row">
        <div class="col-sm-4">
          <img class="img-circle" src="{{$image->image_url }}" alt="Generic placeholder image" style="max-width: 100%">
        </div>
        <div class="col-sm-6 pull-right">
          <p>{{$image->description}}
        </div><!-- /.row -->
        
      </div>
    </div>
    @endforeach
    @endif
    <a href = "{{url('/members/view/'.$user->id)}}" class = "btn btn-success pull-right" style = "margin-bottom: 30px">Back</a>
  </div>

  @endsection