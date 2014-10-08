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
      .otherwise({
        redirectTo: '/'
      });
  })
;
