<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Followers;

class MemberController extends Controller
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

    public function search(Request $request){
        $name = $request->input('name');
        $searchedMembers = User::where('name', 'like', "%$name%")->get();
        return view('members.searchedMember')->with(['members'=>$searchedMembers, 'user'=>$name]);
    }

    public function viewMember(Request $request, $id){
        $userID = auth()->id();
        $user = User::find($id);
        $video = $user->user_videos->count();
        $image = $user->user_images->count();
        $followers = $user->followers;
        $marked = 0;
        $count = 0;
        $type = $user->type;

        foreach($followers as $follower){
            $count ++;
            if ($follower['id'] === $userID)
                $marked = 1;
        }
        return view('members.viewMember')->with(['member'=>$user, 'video'=>$video, 'image'=>$image, 'count' => $count, 'marked'=>$marked, 'type' => $type->type]);
    }

    public function viewMemberImage(Request $request, $id){
        $user = User::find($id);
        $images = $user->user_images;
        return view('members.viewImage',['user'=>$user, 'images'=>$images]);
    }

    public function viewMemberVideo(Request $request, $id){
        $user = User::find($id);
        $videos = $user->user_videos;
        return view('members.viewVideo',['user'=>$user, 'videos'=>$videos]);
    }

    public function markMember(Request $request, $id){
        $userID = auth()->id();
        $followingUser = User::find($userID);
        $follower = new Followers();
        $follower['follower_id'] = $followingUser['id'];
        $follower['leader_id'] = $id;
        $follower->save();
        return back()
            ->with('success','You have successfully followed this user.');
    }

    public function unmarkMember(Request $request, $id){
        // $leadUser = User::find($id);
        $userID = auth()->id();
        $followingUser = User::find($userID);
        $matchThese = ['follower_id' => $followingUser['id'], 'leader_id' =>$id];
        // $follower = Followers::where(
        //     ['follower_id'],'=', $followingUser['id'],
        //     ['leader_id'], '=', $id
        // );
        $followers= Followers::where($matchThese)->get();
        foreach($followers as $follower)
            $follower->delete();
        return back()
            ->with('success','You have successfully followed this user.');
    }
}
