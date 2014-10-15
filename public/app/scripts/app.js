'use strict';

angular.module('app', ['restangular', 'ngRoute'])
  .config(function ($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'app/partials/dashboard.html',
        controller: 'DashboardCtrl'
      })
      .when('/subjects', {
        templateUrl: 'app/views/subjects/index.html',
        controller: 'AllSubjectsCtrl',
        controllerAs: 'subjects'
      })
      .when('/subjects/:subject', {
        templateUrl: 'app/views/subjects/show.html',
        controller: 'ShowSubjectsCtrl',
        controllerAs: 'subjects'
      })
      .when('/subjects/:subject/topics/:topic', {
        templateUrl: 'app/views/topics/show.html',
        controller: 'ShowTopicsCtrl',
        controllerAs: 'topics'
      })
      .when('/subjects/:subject/topics/:topic/activities/:activity', {
        templateUrl: 'app/views/activities/show.html',
        controller: 'ShowActivitiesCtrl',
        controllerAs: 'activities'
      })
      .when('/subjects/:subject/topics/:topic/activities/:activity/answers/create', {
        templateUrl: 'app/views/answers/create.html',
        controller: 'CreateAnswersCtrl',
        controllerAs: 'answers'
      })
      .when('/shares', {
        templateUrl: 'app/views/shares/index.html',
        controller: 'SharesCtrl',
        controllerAs: 'shares'
      })
      .when('/shares/create', {
        templateUrl: 'app/views/shares/create.html',
        controller: 'NewSharesCtrl',
        controllerAs: 'shares'
      })
      .when('/shares/:id/edit', {
        templateUrl: 'app/views/shares/edit.html',
        controller: 'EditSharesCtrl',
        controllerAs: 'shares'
      })
      .otherwise({
        redirectTo: '/'
      });
  });

angular.module('app').run(function($rootScope, $http){

   $http.get('api/me').success(function(data)
    {
      $rootScope.role = data.data.role;
    });

   $rootScope.isAdmin = function(){

    return $rootScope.role == 'admin';
   }
})