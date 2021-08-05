<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\User;
use App\Messages;

use Carbon\Carbon;
class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userID = auth()->id();
        $user = User::find($userID);
        
        $unreadMessages = $this->handleUnreadMessage();
        return view('dashboard.home', ['user' => $user, 'unreadMessages' => $unreadMessages]);
    }

    public function apidetails()
    {
        return view('dashboard.apidetails');
    }

    public function handleUnreadMessage(){
        $userID = auth()->id();
        $user = User::find($userID);
        $current_timestamp = Carbon::now()->toDateTimeString();
        $finishTime = Carbon::parse($current_timestamp);
        $messages= [];
        
        $receivedMessages = $user->receivers;
        foreach($receivedMessages as $receivedMessage){
            
            $isRead = $receivedMessage->isread;
            if ( $isRead ==0){
                // echo($receivedMessage->id);
                $senderID = $receivedMessage->sender_id;
                $sender = User::find($senderID)['name'];
                $duration = $finishTime->diffInSeconds( Carbon::parse( $receivedMessage->created_at) );
                $duration = $this->convertTime($duration);
                
                $messageID = $receivedMessage->id;
                $message = ['content' => $receivedMessage['content'], 'sender'=>$sender, 'receiver'=>$user->name, 
                    'duration'=>$duration, 'isRead' => $isRead, 'messageID'=>$messageID, 'type'=>'receive' , 
                    'senderID' => $senderID, 'receiverID' => $userID];
                if($receivedMessage['removedReceiver'] ==0){
                    array_push($messages, $message);
                }
            }
        }
        return $messages;
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
