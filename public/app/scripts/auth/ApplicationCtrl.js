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

			$scope.iAmCreator = function(user_id)
			{
				return (user_id == Session.userId);
			}

			$scope.iAmAdminWhoWroteThis = function(user_id)
			{
				if(this.iAmCreator(user_id))
				{
					return (user_id == Session.userId)
				}

				return false;
			}

			$scope.writedByAMember = function (answer)
			{
				return (user.data.role == USER_ROLES.member);
			}
		}
})();