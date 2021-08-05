<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
Use App\User;
use App\Images;
use App\Videos;
use App\Messages;

use Validator;
use Session;

class ProfileController extends Controller
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

    protected function validator(array $data){
        return Validator::make($data,[
            'name'=>'required|string|max:255',
            'state' => 'required|string|max:255',
            'position'=>'required|string|max:255',
            'grade'=>'numeric|required',
            'year'=>'numeric|required',
            'sport'=>'required|string|max:255',
        ]);
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
        return view('profile.update',['user'=>$user]);
    }
     /**
     * Show the application dashboard.
     * Called from profile.update
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        $userID = auth()->id();
        $name = $request->input('name');
        $state = $request->input('state');
        $position = $request->input('position');
        $grade = $request->input('grade');
        $year = $request->input('year');
        $sport = $request->input('sport');

        $data = [];
        $data['name'] = $name;
        $data['state'] = $state;
        $data['position'] = $position;
        $data['grade'] = $grade;
        $data['year'] = $year;
        $data['sport'] = $sport;
        $validator = $this->validator($data);
        if ($validator->fails())
            return redirect()->back()->withErrors($validator);
        $user = User::find($userID);
        $user->update($data);

        Session::flash('flash_message', 'User Data successfuly Updated!');
        return redirect()->back();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function picture(){
        $userID = auth()->id();
        $user = User::find($userID);
        $images = $user->user_images;
        return view('profile.picture',['user'=>$user, 'images'=>$images]);
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function video(){
        $userID = auth()->id();
        $user = User::find($userID);
        $videos = $user->user_videos;
        return view('profile.video',['user'=>$user, 'videos'=>$videos]);
    }

    public function imageUpload(Request $request){
        $userID = auth()->id();
        $user = User::find($userID);
        $data = [];
        $data['image'] = $request->image;
        $data['description'] = $request->input('description');
        $validator = Validator::make($data,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' =>'required',
        ]);
        if ( $validator->fails()){
            return back()->withErrors($validator);
        }
        $imageName = time().'.'.$request->image->extension();  
        $image = new Images();
        $image->image_url = '/assets/upload_image/' . $imageName;
        $image->description = $data['description'];
        $image->user_id = $userID;
        $image->save();
        $request->image->move(public_path('assets/upload_image'), $imageName);

        $followers = $user->followers;
        foreach($followers as $follower){
            $message = new Messages();
            $message['sender_id'] = $userID;
            $message['receiver_id'] = $follower['id'];
            $message['content'] = $user['name'].' has posted new image!.';
            $message->save();
        }
        return back()
            ->with('success','You have successfully upload image.');
    }

    public function videoUpload(Request $request){
        $userID = auth()->id();
        $user = User::find($userID);
        $data = [];
        $data['video'] = $request->file('video');
        $data['description'] = $request->input('description');
        $validator = Validator::make($data,[
            'video' => 'required|mimes:mp4|max:20480',
            'description' =>'required',
        ]);
        if ( $validator->fails()){
            return back()->withErrors($validator);
        }
        $videoName = time().'.'.$data['video']->getClientOriginalName();
        $video = new Videos();
        $video->video_url = '/assets/upload_video/'.$videoName;
        $video->description = $data['description'];
        $video->user_id = $userID; 
        $video->save();
        $data['video']->move(public_path('assets/upload_video'), $videoName);

        $followers = $user->followers;
        foreach($followers as $follower){
            $message = new Messages();
            $message['sender_id'] = $userID;
            $message['receiver_id'] = $follower['id'];
            $message['content'] = $user['name'].' has posted new video!.';
            $message->save();
        }
        return back()
            ->with('success','You have successfully upload video.');
         // return back()->withErrors('error','Something went wrong. Check your file, please.');
    }
}