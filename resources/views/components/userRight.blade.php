@if (Auth::check() && Auth::user()->username == $story->user->username)
	<br>
	<br>
	{!! Form::open(['route'=>['story.destroy',$story->id],'method'=>'delete','style'=>'float:left;margin-right:5px;']) !!}
		<button class="btn btn-danger">Delete</button>
	{!! Form::close() !!}
	{!! Form::open(['route'=>['story.edit',$story->id],'method'=>'get','style'=>'float:left']) !!}
		<button class="btn btn-warning">Edit</button>
	{!! Form::close() !!}
@endif