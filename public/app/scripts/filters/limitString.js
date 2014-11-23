(function(){

	'use strict';

	angular.module('app')
	  .filter('limitString', function () {
	    return function (text, limit) {

			if(text.length >= limit)
			{
			  	return text.substring(0,limit) + '...';
			}

			return text;
	    };
	  });

})();
