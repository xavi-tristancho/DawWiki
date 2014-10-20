(function(){

	'use strict';

	angular.module('app')
    .factory('Activities', Activities);

    function Activities($http)
    {
    	return {

    		withAnswers : function(id)
    		{
    			return $http.get('api/activities/' + id + '?embed=answers,answers.user,topic,topic.subject')
    				.then(function(data)
    				{
    					return data.data;
    				}, function(error)
    				{
    					console.log(error);
    					return error;
    				});
    		},
            create : function(newActivityObject)
            {
                return $http.post('api/activities', newActivityObject)
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