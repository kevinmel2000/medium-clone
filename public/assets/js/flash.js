angular.module('flashMessage',[])
.controller('coreController',function($scope,$http){
	$scope.send = function(e){
		e.preventDefault();
		$http.post('/api/flashmessage',{message:$scope.message,name: $("#nameFlash").val()}).success(function(data){
			$scope.message = "";
		});
	}
});