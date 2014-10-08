'use strict';

angular.module('app')
  .controller('NavbarCtrl', function ($location) {

  	this.isActive = function(route){
		return route === $location.path()
	}

  });
