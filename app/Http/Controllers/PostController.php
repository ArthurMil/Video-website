<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Video;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Mail;
use Session;

class PostController extends Controller {

    public function postCreatePost(Request $request, $video_id) {

        //$video = Video::find($video_id);
        $post = new Post();
        $post->body = $request['body'];
        $post->video()->associate($video_id);
        $request->user()->posts()->save($post);
        return redirect()->back();
    }

    public function DeletePost($post_id) {
        $post = Post::where('id', $post_id)->first();
        if(Auth::user() != $post->user) {
            return redirect()->back();
        }
        $post->delete();
        return redirect()->back();
    }

    public function DeleteVideo($video) {
        $video = Video::where('id', $video)->first();
        $video->delete();
        return redirect()->back();
    }
    
    public function EditPost(Request $request) {
        $this->validate($request, [
            'body'=>'required'
        ]);
        $post = Post::find($request['postId']);
        if(Auth::user() != $post->user) {
            return redirect()->back();
        }
        $post->body= $request['body'];
        $post->update();
        return response()->json(['new_body'=>$post->body], 200);
    }
    
    public function postLikePost(Request $request) {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }
    public function getLikeCounter($post_id) {
        $post = Post::find($post_id);
        $number = null;
        $like_counter = \DB::table('likes')->where('post_id', $post->id)->where('like',!$number)->count();
        return View::make('layouts.viewvideo')->with('like_counter', $like_counter);
    }

    public function ContactUs() {
        return view('contactus');
    }
    
    public function postContact(Request $request) {
        $this->validate($request, [
           'email' => 'required|email',
           'subject' => 'min:3',
           'message' => 'min:10'
        ]);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('hello@artm.io');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your Email was Sent!');

        return redirect('/contactus');
    }

}