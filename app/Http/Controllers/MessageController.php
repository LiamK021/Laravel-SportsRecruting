<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\User;
use App\Messages;

use Carbon\Carbon;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $userID = auth()->id();
        $user = User::find($userID);
        $sentMessages = $user->senders;

        $current_timestamp = Carbon::now()->toDateTimeString();
        $finishTime = Carbon::parse($current_timestamp);
        $messages= [];
        foreach($sentMessages as $sentMessage){
            $receiverID = $sentMessage->receiver_id;
            $receiver = User::find($receiverID)['name'];
            $duration = $finishTime->diffInSeconds( Carbon::parse( $sentMessage->created_at) );
            $duration = $this->convertTime($duration);
            $isRead = $sentMessage['isread'];
            $messageID = $sentMessage['id'];
            $message = ['content' => $sentMessage['content'], 'sender'=>$user->name, 'receiver'=>$receiver, 
                'duration'=>$duration, 'isRead' => $isRead, 'messageID'=>$messageID, 'type' =>'send', 
                'receiverID' => $receiverID , 'senderID' => $userID];
            if ($sentMessage['removedSender'] ==0){
                 array_push($messages, $message);
            }
        }
        $receivedMessages = $user->receivers;
        foreach($receivedMessages as $receivedMessage){
            $senderID = $receivedMessage->sender_id;
            $sender = User::find($senderID)['name'];
            $duration = $finishTime->diffInSeconds( Carbon::parse( $receivedMessage->created_at) );
            $duration = $this->convertTime($duration);
            $isRead = $receivedMessage->isread;
            $messageID = $receivedMessage->id;
            $message = ['content' => $receivedMessage['content'], 'sender'=>$sender, 'receiver'=>$user->name, 
                'duration'=>$duration, 'isRead' => $isRead, 'messageID'=>$messageID, 'type'=>'receive' , 
                'senderID' => $senderID, 'receiverID' => $userID];
            if($receivedMessage['removedReceiver'] ==0){
                array_push($messages, $message);
            }
        }
        return view('message.index' , ['messages'=>$messages]);
    }

    public function sendform($id){
        $authID = auth()->id();
        $user = User::find($id);
        $sentMessages = $user->senders;

        $current_timestamp = Carbon::now()->toDateTimeString();
        $finishTime = Carbon::parse($current_timestamp);
        $messages= [];
        foreach($sentMessages as $sentMessage){
            $receiverID = $sentMessage->receiver_id;
            if ( $receiverID == $authID){
                $receiver = User::find($receiverID)['name'];
                $duration = $finishTime->diffInSeconds( Carbon::parse( $sentMessage->created_at) );
                $duration = $this->convertTime($duration);
                $isRead = $sentMessage['isread'];
                $messageID = $sentMessage['id'];
                $message = ['content' => $sentMessage['content'], 'sender'=>$user->name, 'receiver'=>$receiver, 
                    'duration'=>$duration, 'isRead' => $isRead, 'messageID'=>$messageID, 'type' =>'send'];
                if ($sentMessage['removedReceiver'] ==0){
                    array_push($messages, $message);
                }
            }
        }
        $receivedMessages = $user->receivers;
        foreach($receivedMessages as $receivedMessage){
            $senderID = $receivedMessage->sender_id;
            if ( $senderID == $authID){
                $sender = User::find($senderID)['name'];
                $duration = $finishTime->diffInSeconds( Carbon::parse( $receivedMessage->created_at) );
                $duration = $this->convertTime($duration);
                $isRead = $receivedMessage->isread;
                $messageID = $receivedMessage->id;
                $message = ['content' => $receivedMessage['content'], 'sender'=>$sender, 'receiver'=>$user->name, 
                    'duration'=>$duration, 'isRead' => $isRead, 'messageID'=>$messageID, 'type'=>'receive' , 'senderID' => $senderID];
                if($receivedMessage['removedSender'] ==0){
                    array_push($messages, $message);
                }
            }
        }    
        return view('message.indexform', ['messages'=>$messages,'user'=>$user]);
    }

    public function sendmessage(Request $request){
        $content = $request->input('message');
        $receiver = $request->input('receiver');
        $userID = auth()->id();
        $sender = User::find($userID);

        $messages = new Messages();
        $messages['sender_id'] = $userID;
        $messages['receiver_id'] = $receiver;
        $messages['content'] = $content;
        $messages->save();
        return back();
    }

    public function tickmessage($messageID){
        $message = Messages::find($messageID);
        $message['isread'] = 1;
        $message->save();
        return back();
    }

    public function removemessage($messageID){
        $message = Messages::find($messageID);
        $userID = auth()->id();
        if ($userID == $message['sender_id']){
            $message['removedSender'] = 1;
        }
        else if ($userID == $message['receiver_id']){
            $message['removedReceiver'] =1;
        }
        if( $message ['removedReceiver'] ==1 &&$message['removedSender'] == 1){
            $message->delete();
        }
        else{
            $message->save();
        }
        return back();
    }
    public function convertTime($duration){
        if ( $duration<3600){
            $min = $duration/60;
            return(ceil($min)." min ago");
        }
        else if($duration<3600*24){
            $hour = $duration/3600;
            return(ceil($hour)." hour ago");
        }
        else{
            $day = $duration/(3600*24);
            return(ceil($day)." day ago");
        }
    }
}