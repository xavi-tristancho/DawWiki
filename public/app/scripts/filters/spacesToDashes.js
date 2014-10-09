'use strict';

angular.module('app')
  .filter('spacesToDashes', function () {
    return function (text) {
		
		var str = text.replace(/\s+/g, '-');
		return str;
    };
  });
