'use strict';

angular.module('app', ['restangular', 'ngRoute'])
  .config(function ($routeProvider, USER_ROLES) {
    $routeProvider
      .when('/', {
        templateUrl: 'app/partials/dashboard.html',
        controller: 'DashboardCtrl',
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
      var authorizedRoles = next.authorizedRoles;
      
      if (!AuthService.isAuthorized(authorizedRoles)) {
        event.preventDefault();
        if (AuthService.isAuthenticated()) {
          // user is not allowed
          $rootScope.$broadcast(AUTH_EVENTS.notAuthorized);
          window.history.back();
        } else {
          // user is not logged in
          $location.url('/login');
          $rootScope.$broadcast(AUTH_EVENTS.notAuthenticated);
        }
      }
    });
  });