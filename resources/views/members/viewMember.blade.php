@extends('layouts.master')

@section('title')
Dashboard | Application
@endsection

@section('content')

<div class = "container-fluid" style = "background-color:#00203FFF">
    <h1 style = "color:white">{{$member->name}}:{{$type}}</h1> 
    <table class="table table-hover table-bordered" >
        <tr style = "background-color: #ADEFD1FF " >
            <th class = "col-sm-4">Address</th>
            <th class = "col-sm-8">{{$member->address}}</th>
        </tr>
        <tr style = "background-color: #ADEFD1FF">
            <td class = "col-sm-4">State</td>
            <td class = "col-sm-8">{{$member->state}}</td>
        </tr>
        <tr style = "background-color: #ADEFD1FF">
            <td class = "col-sm-4">Position</td>
            <td class = "col-sm-8">{{$member->position}}</td>
        </tr>
        <tr style = "background-color: #ADEFD1FF">
            <td class = "col-sm-4">Grade</td>
            <td class = "col-sm-8">{{$member->grade}}</td>
        </tr>
        <tr style = "background-color:#ADEFD1FF">
            <td class = "col-sm-4">Year</td>
            <td class = "col-sm-8">{{$member->year}}</td>
        </tr>
        <tr style = "background-color: #ADEFD1FF">
            <td class = "col-sm-4">Sport</td>
            <td class = "col-sm-8">{{$member->sport}}</td>
        </tr>
        <tr style = "background-color: #ADEFD1FF">
            <td class = "col-sm-4">Uploaded video</td>
            <td class = "col-sm-8">{{$video}}</td>
        </tr>
        <tr style = "background-color: #ADEFD1FF">
            <td class = "col-sm-4">Uploaded image</td>
            <td class = "col-sm-8">{{$image}}</td>
        </tr>
        <tr style = "background-color: #ADEFD1FF">
            <td class = "col-sm-4">Leading Members</td>
            <td class = "col-sm-8">{{$count}}</td>
        </tr>
    </table>
    <div class = "row" style= "margin-bottom:5px">
        <div class = "col-sm-3">
            <a href = "{{url('/members/view/image/'.$member->id)}}" class = "btn btn-primary">View Image</a>
        </div>
        <div class = "col-sm-3">
            <a href = "{{url('/members/view/video/'.$member->id)}}" class = "btn btn-primary">View Video</a>
        </div>
        <div class = "col-sm-3">
            @if ($marked ==0)
            <a href = "{{url('/members/mark/'.$member->id)}}" class = "btn btn-primary">Follow!</a>
            @elseif ($marked ==1)
            <a href = "{{url('/members/unmark/'.$member->id)}}" class = "btn btn-primary">UnFollow!</a>
            @endif
        </div>
        <div class = "col-sm-3">
            <a href = "{{url('/message/tosend/'.$member->id)}}" class = "btn btn-primary">Send Message</a>
        </div>
    </div>
</div>
@endsection