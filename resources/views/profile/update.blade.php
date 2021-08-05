@extends('layouts.master')

@section('title')
Dashboard | Application
@endsection

@section('content')

@if(Session::has('flash_message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('flash_message') }}</p>
@endif
<div class="container main-container">
    <h2 class="page-header text-primary">My Profile</small></h2>
    <div class="container">
        <form class="form-horizontal" name="profile_update" role="form" method="POST" action="{{ url('/profile/update') }}">
            {!! csrf_field() !!}
            <!-- Three columns of text below the carousel -->
            <!-- <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <img class="img-circle" src="holder.js/140x140" alt="Generic placeholder image">
            </div>/.col-lg-4 -->
            <!-- <fieldset> -->
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="{{$user->name}}">
                            <i class="ace-icon fa fa-user"></i>
                        </span>
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </label>
                </div>
                <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="text" class="form-control" name="state" value="{{ old('state') }}" placeholder="{{$user->state}}">
                            <i class="ace-icon fa fa-envelope"></i>
                        </span>
                        @if ($errors->has('state'))
                        <span class="help-block">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                        @endif
                    </label>
                </div>
                <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="position" class="form-control" name="position" value="{{ old('position') }}" placeholder="{{$user->position}}">
                            <i class="ace-icon fa fa-envelope"></i>
                        </span>
                        @if ($errors->has('position'))
                        <span class="help-block">
                            <strong>{{ $errors->first('position') }}</strong>
                        </span>
                        @endif
                    </label>
                </div>
                <div class="form-group{{ $errors->has('grade') ? ' has-error' : '' }}">
                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="grade" class="form-control" name="grade" value="{{ old('grade') }}" placeholder="{{$user->grade}}">
                            <i class="ace-icon fa fa-envelope"></i>
                        </span>
                        @if ($errors->has('grade'))
                        <span class="help-block">
                            <strong>{{ $errors->first('grade') }}</strong>
                        </span>
                        @endif
                    </label>
                </div>
                <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="year" class="form-control" name="year" value="{{ old('year') }}" placeholder="{{$user->year}}">
                            <i class="ace-icon fa fa-envelope"></i>
                        </span>
                        @if ($errors->has('year'))
                        <span class="help-block">
                            <strong>{{ $errors->first('year') }}</strong>
                        </span>
                        @endif
                    </label>
                </div>
                <div class="form-group{{ $errors->has('sport') ? ' has-error' : '' }}">
                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="sport" class="form-control" name="sport" value="{{ old('sport') }}" placeholder="{{$user->sport}}">
                            <i class="ace-icon fa fa-envelope"></i>
                        </span>
                        @if ($errors->has('sport'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sport') }}</strong>
                        </span>
                        @endif
                    </label>
                </div>
                <div class="clearfix">
                    <button type="submit" class="width-65 pull-right btn btn-sm btn-success">
                        <span class="bigger-110">Update</span>
                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                    </button>
                </div>
            <!-- </fieldset> -->
        </form>
    </div>

</div>
@endsection