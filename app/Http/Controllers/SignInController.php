<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use View;
use App\Video;
use App\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class SignInController extends Controller {

    protected $user;
    protected $video;
    protected $redirectTo = "/dashboard";

    public function __construct() {
        $this->user = User::all();
        $this->video = Video::all();
        View::share('user', $this->user);
        View::share('video', $this->video);
    }

    function getUser() {
        return Auth::user();
    }
     
    public function getHome() {
        $users = User::all();
        $videos = Video::orderBy('created_at', 'desc')->paginate(6); // getting all videos in this case paginating
        return view('dashboard', ['users' => $users, 'videos' => $videos]);
    }
    
    public function getSignUp() {
        return view('signup');
    }

    public function getSignIn() {
        return view('signin');
    }

    public function getUpdated() {
        if(!Auth::check()) {
            return redirect()->back();
        }
        return view('signups.updateProfile', ['user' => Auth::user()]);
    }

    public function postSignUp(Request $request) {

        $this->validate($request, [
        'email' => 'required|email|unique:users',
        'first_name'=> 'required|max:64',
        'password' => 'required|min:4|confirmed',
        'password_confirmation'=>'required|min:4'
        ]);


        $email = $request['email'];
        $first_name = ucfirst($request['first_name']);
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->first_name = $first_name;
        $user->password = $password;
        $user->save();

        Auth::login($user);

        if(!Auth::check()) {
            return redirect()->back();
        }
        return redirect()->route('dashboard');
    }
    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);


        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('dashboard');
        }
        if (!Auth::check()) {
            return redirect()->back();
        }
    }   
    public function getLogout() {
            Auth::logout();
            return redirect()->route('dashboard');
        }

    public function CreatePicture(Request $request) {

        $user = Auth::user();
        $user->first_name = $request['first_name'];

        $user->update();

        $file = $request->file('image');
        $filename = '-' . $user->id . '.jpg';
        if($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        return redirect()->route('updateProfile');
    }
    public function getUserImage($filename) {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }

    public function UploadVideo() {
        if (!Auth::check()) {
            return redirect()->back();
        }

        return view ('UploadVideo.uploadvideo');
    }
    public function postVideo(Request $request) {
        $this->validate($request, [
            'video_name' => 'required|min:10|max:30',
            'video_url' => 'required|min:43|max:43',
            'description' => 'required|min:4|max:42'
        ]);
        $video = new Video();
        $video->video_name = ucfirst($request['video_name']);
        $video->video_url = $request['video_url'];
        $video->description = $request['description'];

        if (strlen($video->video_url) > 11) {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->video_url, $match)) {

                $video->video_url = $match[1];
            } else
                return false;
        }
        

        $request->user()->videos()->save($video);

        return redirect()->route('dashboard');

    }

    // Embedinti video is url <---------------
    function YoutubeID($url) {

        if (strlen($url) > 11) {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
                return $match[1];
            } else
        return false;
    }
        return $url;
    }
    
    public function ViewVideo(Video $video) {
        return view('layouts.viewvideo', ['video' => $video]);
    }
}