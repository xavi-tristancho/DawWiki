(function(){

	angular.module('app')
		.controller('ApplicationCtrl', ApplicationCtrl);

		function ApplicationCtrl($rootScope, $scope, USER_ROLES, AuthService, $location, Session)
		{
			$rootScope.currentUser = null;
			$scope.userRoles = USER_ROLES;
			$scope.isAuthorized = AuthService.isAuthorized;

			$rootScope.setCurrentUser = function (user) {
				$rootScope.currentUser = user;
			};

			$scope.iAmCreator = function(userId)
			{
				return (userId == Session.userId);
			}

			$scope.iAmAdminWhoWroteThis = function(userId)
			{
				if(this.iAmCreator(userId))
				{
					return (userId == Session.userId)
				}

				return false;
			}

			$scope.writedByAMember = function (userRole)
			{
				return (userRole == USER_ROLES.member);
			}
		}
})();