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
        controller: 'SubjectsCtrl',
        controllerAs: 'subjects'
      })
      .when('/subjects/:name', {
        templateUrl: 'app/views/subjects/show.html',
        controller: 'ShowSubjectsCtrl',
        controllerAs: 'subjects'
      })
      .when('/shares', {
        templateUrl: 'app/views/shares/index.html',
        controller: 'SharesCtrl',
        controllerAs: 'shares'
      })
      .otherwise({
        redirectTo: '/'
      });
  })
;