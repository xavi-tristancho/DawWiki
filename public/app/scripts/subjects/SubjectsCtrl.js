'use strict';

angular.module('app')
  .controller('SubjectsCtrl', function ($http) {

  	var vm = this;

  	$http.get('api/subjects').success(function(data){

  		vm.subjectsList = data.data;
  	});

  })
  .controller('ShowSubjectsCtrl', function($http, $routeParams){

  	var vm = this;

  	$http.get('api/subjects/' + $routeParams.name).success(function(data){

  		vm.subject = data.data[0];
  	});

  });
