(function(){

	angular.module('app')
	  .controller('LoginCtrl', LoginCtrl);

	  function LoginCtrl($scope, $rootScope, $location, AUTH_EVENTS, AuthService) {

	    $scope.credentials = {
	      email: '',
	      password: ''
	    };

	    $scope.login = function (credentials) {

	    	AuthService.login(credentials).then(function (user) {
	        	$rootScope.$broadcast(AUTH_EVENTS.loginSuccess);
	        	$scope.setCurrentUser(user);
	        	$location.url('/');
	    	}, function () {
	    		$scope.loginFailed = true;
	        	$rootScope.$broadcast(AUTH_EVENTS.loginFailed);
	      	});
	    };
	  }
})();