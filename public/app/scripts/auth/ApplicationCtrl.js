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

			$scope.iAmCreator = function(answer)
			{
				return (answer.user.data.id == Session.userId);
			}

			$scope.iAmAdminWhoWroteThis = function(answer)
			{
				if(this.iAmCreator(answer))
				{
					return (answer.user.data.id == Session.userId)
				}

				return false;
			}

			$scope.writedByAMember = function (answer)
			{
				return (answer.user.data.role == USER_ROLES.member);
			}
		}
})();