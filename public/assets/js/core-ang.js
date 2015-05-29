angular.module('medium',[])
.config(function($interpolateProvider) {
	$interpolateProvider.startSymbol('[[').endSymbol(']]');
})
.controller('myComment',function($scope,$http){
	var story_id = $("#story_id").val();
	$http.get('/api/comments/' + story_id).success(function(data){
		$scope.datas = data;
	});
	$scope.showBtn = true;

	$scope.postComment = function(e){
		e.preventDefault();
		$scope.showBtn = false;
		var token = $("#token").val();
		var user_id = $("#user_id").val();
		$http.post('/comments',{user_id:user_id,csrf_token:token,story_id:story_id,content:$scope.content}).success(function(data){
			$scope.datas.push(data);
			$scope.content = "";
			$scope.showBtn = true;
		})
	}
})
.controller('notifController',function($scope,$http){
	$scope.clearNotif = function(id)
	{
		$http.put('/api/notifications/' + id).success(function(data){

		});
	}
});