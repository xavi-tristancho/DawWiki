(function(){

	'use strict';

	angular.module('app')
    .factory('Answers', Answers);

    function Answers($http)
    {
    	return {

    		create : function(newAnswerObject)
    		{
    			return $http.post('api/answers', newAnswerObject)
    				.then(function(data)
    				{
    					return data.data;
    				}, function(error)
    				{
    					console.log(error);
    					return error;
    				});
    		},
            destroy : function(id)
            {
                return $http.delete('api/answers/' + id)
                    .then(function(data)
                    {
                        return data.data;
                    }, function(error)
                    {
                        console.log(error);
                        return error;
                    });
            }
    	}
    }
})();