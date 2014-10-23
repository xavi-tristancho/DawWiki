(function(){

	'use strict';

	angular.module('app')
	  .filter('limitString', function () {
	    return function (text) {
			
			if(text.length >= 70)
			{
			  	return text.substring(0,70) + "...";
			}

			return text;
	    };
	  });

})();
