(function(){

	'use strict';

	angular.module('app')
    .factory('Subjects', Subjects);

    function Subjects($http)
    {
    	return {

    		all : function()
    		{
    			return $http.get('api/subjects?embed=topics')
    				.then(function(data)
    				{
    					return data.data;
    				}, function(error)
    				{
    					console.log(error);
    					return error;
    				});
    		},
    		withTopics : function(name)
    		{
    			return $http.get('api/subjects/' + name + '?embed=topics,topics.activities')
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