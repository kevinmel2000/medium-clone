<?php namespace App\Http\Controllers;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Notification;
use App\Story;
use App\User;
use Illuminate\Support\Facades\URL;
use Piss;
use Request;

class CommentController extends Controller {

	public function getComments($storyid)
	{
		$comments = Comment::where('story_id',$storyid)->with('user')->get();
		return $comments;
	}
	public function store()
	{
		
		$comment = new Comment;
		$comment->user_id = Request::input('user_id');
		$comment->story_id = Request::input('story_id');
		$comment->content = Request::input('content');
		$comment->save();

		$comments = Comment::where('story_id',$comment->story_id)->groupBy('user_id')->get();
		foreach($comments as $item){
			if($comment->user_id != $item->user_id){
				$user = User::where("id",$comment->user_id)->first();
				$story = Story::where('id',$item->story_id)->with('user')->first();
				$notif = new Notification;
				$notif->user_id = $item->user_id;
				$notif->message = $user->name . " Mengomentari " . $story->title;
				$notif->link = $story->slug;
				$notif->save();
			
				$channel = strval($item->user_id);
				$data['message'] = $notif->message;
				$data['link'] = $notif->link;
				Piss::trigger($channel,'my_event',$data);
			}
		}
		return Comment::where('id',$comment->id)->with('user')->first();
	}
}
