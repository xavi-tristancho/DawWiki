(function(){

	'use strict';

	angular.module('app')
	  .filter('spacesToDashes', function () {
	    return function (text) {
			
			if(text != undefined)
				return text.replace(/\s+/g, '-').toLowerCase();
	    };
	  });

})();
