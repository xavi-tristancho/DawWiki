'use strict';

angular.module('app')
  .controller('SharesCtrl', function ($http) {

  	var vm = this;

  	console.log();

  	$http.get('api/shares').success(function(data){

  		vm.sharesList = data.data;
  	});

  });
