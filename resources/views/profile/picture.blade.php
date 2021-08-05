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
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
    @endif
    @if(count($images) == 0)
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <div class="jumbotron">
      <p class="text-danger">No image you have uploaded up to now. If you want to upload image, you can do it right now! </p>
      <form action="{{ url('/profile/image_upload') }}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" class="form-control" />
        </div>
        <div class="form-group">
          <textarea type="textarea" name="description"  style = "width: 80%" rows="3" cols="50" placeholder="Description here!"></textarea>
          <button type="submit" class="btn  btn-primary pull-right btn-xs" role="button">Upload Image &raquo;</button>
        </div>
      </form>
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
    <div class="jumbotron">
      <p class="text-danger">If you want upload more images, please post here! </p>
      <form action="{{ url('/profile/image_upload') }}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" class="form-control" />
        </div>
        <div class="form-group">
          <textarea type="textarea" name="description"  style = "width: 80%" rows="3" cols="50" placeholder="Description here!"></textarea>
          <button type="submit" class="btn  btn-primary pull-right btn-xs" role="button">Upload Image &raquo;</button>
        </div>
      </form>
    </div>
    @endif
    
  </div>

  @endsection