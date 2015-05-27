var app = angular.module('setting',[]);
app.config(function($interpolateProvider) {
	$interpolateProvider.startSymbol("[[").endSymbol("]]");
});
app.controller('myController',function($scope,$http){
	$scope.validate = function(){
		if($scope.username.indexOf(" ") >= 0){
			$scope.class = "alert alert-danger";
			$scope.status = "Username tidak dapat mengandung spasi";
		}else{
			$http.post('/api/checkusername', {username:$scope.username}).success(function(data){
				if(data.status){
					$scope.status = "Username tersedia";
					$scope.class = "alert alert-success";
				}else{
					$scope.class = "alert alert-danger";
					$scope.status = "Username tidak tersedia";
				};
			});	
		}
	}
});