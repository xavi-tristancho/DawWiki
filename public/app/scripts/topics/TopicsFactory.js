(function(){

	'use strict';

	angular.module('app')
    .factory('Topics', Topics);

    function Topics($http)
    {
    	return {

    		withActivities : function(id)
    		{
    			return $http.get('api/topics/' + id + '?embed=activities,subject')
    				.then(function(data)
    				{
    					return data.data;
    				}, function(error)
    				{
    					console.log(error);
    					return error;
    				});
    		},
            create : function(newTopicObject)
            {
                return $http.post('api/topics', newTopicObject)
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