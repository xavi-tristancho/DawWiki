'use strict';

angular.module('app')
  .controller('NavbarCtrl', function ($location) {

  	this.isActive = function(route){

  		var uri = $location.path().split('/');

		return route === uri[1];
	}

  });
