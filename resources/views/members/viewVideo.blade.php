
@extends('layouts.master')

@section('title')
Dashboard | Application
@endsection

@section('content')

@if(Session::has('flash_message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('flash_message') }}</p>
@endif

<div class="container">
  <h2 class="page-header text-primary">{{$user->name}}</small></h2>
  <div class="container marketing">
    @if(count($videos) == 0)
  
    <div class="jumbotron">
      <p class="text-danger">No Video you have uploaded up to now. If you want to upload video, you can do it right now! </p>
    </div>
    @else
    @foreach($videos as $video)
    <div class="jumbotron">
      <div class="row">
          <video width="540" height="240" controls>
            <source src="{{ $video->video_url}}" type="video/mp4" ></source>
            Your browser does not support the video tag.
          </video>
          <p>{{$video->description}}
      </div>
    </div>
    @endforeach
    @endif
    <a href = "{{url('/members/view/'.$user->id)}}" class = "btn btn-success pull-right" style = "margin-bottom: 30px">Back</a>
  </div>

  @endsection