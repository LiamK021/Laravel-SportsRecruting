@extends('layouts.master')

@section('title')
Dashboard | Application
@endsection

@section('content')

<div id="comment-tab" class="tab-pane">
    <!-- #section:pages/dashboard.comments -->
    <div class="comments">
        @foreach($messages as $message)
        <div class="itemdiv commentdiv">
            <div class="user">

            </div>

            <div class="body">
                <div class="name">
                    @if ( $message['type'] =="receive")
                    <a href="#">{{$message['receiver']}}</a>
                    @else
                    <a href="{{url('/message/tosend/'.$message['receiverID'])}}">{{$message['receiver']}}</a>
                    @endif
                    
                    <span class = "label label-info arrowed arrowed-in-left">
                        <i class="ace-icon fa fa-clock-o"></i>{{$message['duration']}}
                    </span>
                    @if ( $message['type'] =="send")
                    <a href="#">{{$message['sender']}}</a>
                    @else
                    <a href="{{url('/message/tosend/'.$message['senderID'])}}">{{$message['sender']}}</a>
                    @endif
                </div>

                <div class="time">
                    @if ($message['isRead']==1 && $message['type'] =="receive")
                    <span class="blue"><i class="ace-icon fa fa-check bigger-110"></i>I read it.</span>
                    @endif
                    @if ($message['isRead']==1 && $message['type'] =="send")
                    <span class="blue"><i class="ace-icon fa fa-check bigger-110"></i>Receiver reads it.</span>
                    @endif
                </div>

                <div class="text">
                    <i class="ace-icon fa fa-quote-left"></i>
                    {{$message['content']}}
                </div>
            </div>

            <div class="tools">
                <div class="action-buttons bigger-125">
                    @if ($message['isRead']==0 && $message['type'] =="receive")
                    <a href="{{url('/message/tickmessage/'.$message['messageID'])}}" class="tooltip-success" data-rel="tooltip" title="Read">
                        <span class="green">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                        </span>
                    </a>
                    @endif
                    @if ($message['type'] =="receive")
                    <a href="{{url('/message/tosend/'.$message['senderID'])}}" class="tooltip-success" data-rel="tooltip" title="Reply">
                        <i class="ace-icon fa fa-pencil blue"></i>
                    </a>
                    @endif
                    <a href="{{url('/message/removemessage/'.$message['messageID'])}}" class="tooltip-success" data-rel="tooltip" title="Remove">
                        <i class="ace-icon fa fa-trash-o red"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- /section:pages/dashboard.comments -->
</div>

@endsection