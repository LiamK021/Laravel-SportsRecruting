@extends('layouts.master')

@section('title')
Dashboard | Application
@endsection

@section('content')
<!-- /section:custom/extra.hr -->
<div class="row">
    <div class="col-sm-12">
        <div class="widget-box transparent">
            <div class="widget-header widget-header-flat">
                <h4 class="widget-title lighter">
                    <i class="ace-icon fa fa-star orange"></i>
                    Members
                </h4>
            </div>
            @if(count($members) == 0)
            <div class="alert alert-danger">
                <strong>There is nobody with that name-"{{$user}}"</strong> 
                
            </div>
            @endif
            <div class="widget-body">
                <div class="widget-main no-padding">
                    <table class="table table-bordered table-striped">
                        <thead   thead class="thin-border-bottom">
                            <tr>
                                <th>
                                    <i class="ace-icon fa fa-caret-right blue">name</i>
                                </th>
                                <th>
                                    <i class="ace-icon fa fa-caret-right blue">address</i>
                                </th>
                                <th>
                                    <i class="ace-icon fa fa-caret-right blue">sport</i>
                                </th>
                                <th>
                                    <i class ="ace-icon fa fa-caret-right blue">view</i>
                                </th>
                            </tr>
                        </thead>
                    <tbody>
                        @foreach($members  as $member)
                        <tr>
                            <td>{{$member->name}}</td>
                            <td>
                                {{$member->address}}
                            </td>
                            <td>
                                {{$member->sport}}
                            </td>
                            <td>
                            <span class = "label label-info arrowed-right arrowed-in">
                                <a href={{url('/members/view/'.$member->id)}} style="color: white;" >View</a>
                            </span>
                            </td>
                        </tr>
                        @endforeach
 
                    </tbody>
                    </table>
                </div><!-- /.widget-main -->
            </div><!-- /.widget-body -->
        </div><!-- /.widget-box -->
    </div><!-- /.col -->

</div><!-- /.row -->

@endsection