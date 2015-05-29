@if (Auth::check() && Auth::user()->username == $story->user->username ||Auth::check() && Auth::user()->su == true)
	<br>
	{!! Form::open(['route'=>['story.destroy',$story->id],'method'=>'delete','style'=>'float:left;margin-right:5px;','id'=>'delete']) !!}
		<button class="btn btn-danger">Delete</button>
	{!! Form::close() !!}
	{!! Form::open(['route'=>['story.edit',$story->id],'method'=>'get','style'=>'float:left']) !!}
		<button class="btn btn-warning">Edit</button>
	{!! Form::close() !!}
@endif
<script>
	$("#delete").submit(function(e){
		if (!confirm("Are you sure broh ?")){
			e.preventDefault();
		}
	})
</script>