(function(){

	angular.module('app')
		.controller('ApplicationCtrl', ApplicationCtrl);

		function ApplicationCtrl($scope, USER_ROLES, AuthService, $location, Session)
		{
			$scope.currentUser = null;
			$scope.userRoles = USER_ROLES;
			$scope.isAuthorized = AuthService.isAuthorized;

			$scope.setCurrentUser = function (user) {
				$scope.currentUser = user;
			};

			$scope.isCreator = function(userId)
			{
				return (userId == Session.userId);
			}
		}
})();