<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller {


	public function getNotif($userid)
	{
		return $notif = Notification::where('user_id',$userid)->where('read',0)->get();
	}
	
	public function clearNotif($id){
		$notif = Notification::find($id);
		$notif->read = 1;
		$notif->save();
	}

}
