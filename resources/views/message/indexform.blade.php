@extends('layouts.master')

@section('title')
Dashboard | Application
@endsection

@section('content')
<div class="widget-box">
    <div class="widget-header">
        <h4 class="widget-title lighter smaller">
            <i class="ace-icon fa fa-comment blue"></i>
            Conversation
        </h4>
    </div>
    <div class="widget-body">
        <div class="widget-main no-padding">
            <div class="dialog">
                <!-- #section:pages/dashboard.comments -->
                <div class="comments">
                @foreach($messages as $message)
                <div class="itemdiv commentdiv">
            <div class="user">

            </div>

            <div class="body">
                <div class="name">
                    <a href="#">{{$message['receiver']}}</a>
                    <span class = "label label-info arrowed arrowed-in-left">{{$message['duration']}}</span>
                    <a href="#">{{$message['sender']}}</a>
                </div>

                <div class="time">
                @if ($message['isRead']==1 && $message['type'] =="receive")
                    <span class="blue"><i class="ace-icon fa fa-check bigger-110"></i>Receiver reads it.</span>
                    @endif
                    @if ($message['isRead']==1 && $message['type'] =="send")
                    <span class="blue"><i class="ace-icon fa fa-check bigger-110"></i>I read it.</span>
                    @endif
                </div>

                <div class="text">
                    <i class="ace-icon fa fa-quote-left"></i>
                    {{$message['content']}}
                </div>
            </div>

            <div class="tools">
                <div class="action-buttons bigger-125">
                    @if ($message['isRead']==0 && $message['type'] =="send")
                    <a href="{{url('/message/tickmessage/'.$message['messageID'])}}" class="tooltip-success" data-rel="tooltip" title="Read">
                        <span class="green">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                        </span>
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
                <form method = "post" action = "{{ url('/message/sendmessage') }}">
                {!! csrf_field() !!}
                    <div class="form-actions">
                        <div class="input-group">
                            <input type="hidden" value="{{$user['id']}}" name = "receiver"/>
                            <input placeholder="Type your message here ..." type="text" class="form-control" name="message" />
                            <span class="input-group-btn">
                                <button class="btn btn-sm btn-info no-radius" type="submit">
                                    <i class="ace-icon fa fa-share"></i>
                                    Send
                                </button>
                            </span>
                        </div>
                    </div>
                </form>
                <!-- /section:pages/dashboard.comments -->
            </div>
        </div>
    </div>

    @endsection