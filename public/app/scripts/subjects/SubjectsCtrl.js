'use strict';

angular.module('app')
  .controller('SubjectsCtrl', function ($http) {

  	var vm = this;

  	$http.get('api/subjects').then(function(data){

  		vm.subjectsList = data.data;
  	});

  });
