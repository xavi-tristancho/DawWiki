'use strict';

angular.module('app', [
  'restangular',
  'ui.bootstrap',
  'ngRoute',
  'ngSanitize',
  'angular.filter',
  'angularUtils.directives.dirPagination',
  'ngTagsInput',
  'angular-loading-bar'
  ])
  .config(function ($routeProvider, USER_ROLES) {
    $routeProvider
      .when('/', {
        templateUrl: 'app/partials/dashboard.html',
        controller: 'DashboardCtrl',
        controllerAs: 'dashboard',
        authorizedRoles : [USER_ROLES.member, USER_ROLES.admin]
      })
      .when('/login', {
        templateUrl: 'app/partials/login.html',
        controller: 'LoginCtrl',
        authorizedRoles : [USER_ROLES.member, USER_ROLES.admin]
      })
      .when('/users/create', {
        templateUrl: 'app/views/users/create.html',
        controller: 'CreateUsersCtrl',
        controllerAs: 'users',
        authorizedRoles : [USER_ROLES.admin]
      })
      .when('/subjects', {
        templateUrl: 'app/views/subjects/index.html',
        controller: 'AllSubjectsCtrl',
        controllerAs: 'subjects',
        authorizedRoles : [USER_ROLES.member, USER_ROLES.admin]
      })
      .when('/subjects/:subject', {
        templateUrl: 'app/views/subjects/show.html',
        controller: 'ShowSubjectsCtrl',
        controllerAs: 'subjects',
        authorizedRoles : [USER_ROLES.member, USER_ROLES.admin]
      })
      .when('/subjects/:subject/topics/create', {
        templateUrl: 'app/views/topics/create.html',
        controller: 'CreateTopicsCtrl',
        controllerAs: 'topics',
        authorizedRoles : [USER_ROLES.admin]
      })
      .when('/subjects/:subject/topics/:topic', {
        templateUrl: 'app/views/topics/show.html',
        controller: 'ShowTopicsCtrl',
        controllerAs: 'topics',
        authorizedRoles : [USER_ROLES.member, USER_ROLES.admin]
      })
      .when('/subjects/:subject/topics/:topic/activities/create', {
        templateUrl: 'app/views/activities/create.html',
        controller: 'CreateActivitiesCtrl',
        controllerAs: 'activities',
        authorizedRoles : [USER_ROLES.admin]
      })
      .when('/subjects/:subject/topics/:topic/activities/:activity', {
        templateUrl: 'app/views/activities/show.html',
        controller: 'ShowActivitiesCtrl',
        controllerAs: 'activities',
        authorizedRoles : [USER_ROLES.member, USER_ROLES.admin]
      })
      .when('/subjects/:subject/topics/:topic/activities/:activity/answers/create', {
        templateUrl: 'app/views/answers/create.html',
        controller: 'CreateAnswersCtrl',
        controllerAs: 'answers',
        authorizedRoles : [USER_ROLES.admin]
      })
      .when('/shares', {
        templateUrl: 'app/views/shares/index.html',
        controller: 'SharesCtrl',
        controllerAs: 'shares',
        authorizedRoles : [USER_ROLES.member, USER_ROLES.admin]
      })
      .when('/shares/create', {
        templateUrl: 'app/views/shares/create.html',
        controller: 'NewSharesCtrl',
        controllerAs: 'shares',
        authorizedRoles : [USER_ROLES.admin]
      })
      .when('/shares/:id/edit', {
        templateUrl: 'app/views/shares/edit.html',
        controller: 'EditSharesCtrl',
        controllerAs: 'shares',
        authorizedRoles : [USER_ROLES.admin]
      })
      .when('/famouses', {
        templateUrl: 'app/views/famouses/index.html',
        controller: 'FamousesCtrl',
        controllerAs: 'famouses',
        authorizedRoles : [USER_ROLES.member, USER_ROLES.admin]
      })
      .when('/famouses/create', {
        templateUrl: 'app/views/famouses/create.html',
        controller: 'NewFamousesCtrl',
        controllerAs: 'famouses',
        authorizedRoles : [USER_ROLES.admin]
      })
      .when('/famouses/:name', {
        templateUrl: 'app/views/famouses/show.html',
        controller: 'ShowFamousesCtrl',
        controllerAs: 'famouses',
        authorizedRoles : [USER_ROLES.member, USER_ROLES.admin]
      })
      .when('/famouses/:name/edit', {
        templateUrl: 'app/views/famouses/edit.html',
        controller: 'EditFamousesCtrl',
        controllerAs: 'famouses',
        authorizedRoles : [USER_ROLES.admin]
      })
      .when('/famouses/:name/articles/create', {
        templateUrl: 'app/views/famouses/articles/create.html',
        controller: 'NewArticlesCtrl',
        controllerAs: 'articles',
        authorizedRoles : [USER_ROLES.member, USER_ROLES.admin]
      })
      .when('/articles/:id/edit', {
        templateUrl: 'app/views/articles/edit.html',
        controller: 'EditArticlesCtrl',
        controllerAs: 'articles',
        authorizedRoles : [USER_ROLES.member, USER_ROLES.admin]
      })
      .when('/reddits', {
        templateUrl: 'app/views/reddits/index.html',
        controller: 'RedditsCtrl',
        controllerAs: 'reddits',
        authorizedRoles : [USER_ROLES.member, USER_ROLES.admin]
      })
      .when('/reddits/create', {
        templateUrl: 'app/views/reddits/create.html',
        controller: 'NewRedditsCtrl',
        controllerAs: 'reddits',
        authorizedRoles : [USER_ROLES.member, USER_ROLES.admin]
      })
      .when('/reddits/:name', {
        templateUrl: 'app/views/reddits/show.html',
        controller: 'ShowRedditsCtrl',
        controllerAs: 'reddits',
        authorizedRoles : [USER_ROLES.member, USER_ROLES.admin]
      })
      .otherwise({
        redirectTo: '/'
      });
  })
  .config(function ($httpProvider) {
    $httpProvider.interceptors.push([
      '$injector',
      function ($injector) {
        return $injector.get('AuthInterceptor');
      }
    ]);
  })
  .run(function ($rootScope, $location, AUTH_EVENTS, AuthService) {  
    $rootScope.$on('$routeChangeStart', function (event, next) {
      
      AuthService.isLoggedIn()
        .then(function(data)
        {
          var authorizedRoles = next.authorizedRoles;
      
          if (!AuthService.isAuthorized(authorizedRoles)) 
          {
            event.preventDefault();
            
            if (AuthService.isAuthenticated())
            {
              // user is not allowed
              $rootScope.$broadcast(AUTH_EVENTS.notAuthorized);
              $location.url('/login');
            }
          }

        }, function(error)
        {
          $location.url('/login');
          $rootScope.$broadcast(AUTH_EVENTS.notAuthenticated);
        });
    });
  });